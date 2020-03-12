<?php

namespace App\Http\Controllers;

use App\overDueFine;
use App\libraryUser;
use Illuminate\Http\Request;
use App\Notifications\PaymentVerify;
use Notification;
use App\paymentList;

class OverDueFineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overdueList = overDueFine::all();
        return view('pages.overdue.overdueFineList', compact('overdueList'));
    }

    /*
    * over due fine payment submit
    */
    public function paymentTokenSend(){
        $libraryUser = libraryUser::where('person', 'staff')->orderBy('pims_no', 'asc')->get('pims_no');
        $overDueFine = overDueFine::get('payment');
        if (count($overDueFine) > 0) {
            return view('pages.overdue.paymentTokenSend', compact('libraryUser', 'overDueFine'));
        } else {
            $notification = [
                'message' => 'No payment!',
                'alert-type' => 'warning'
            ];
            return redirect()->to('/overude_fine/list')->with($notification);
        }
    }

    /*
    * payment token send
    */
    public function sendToken(Request $request){
        $validatedData = $request->validate([
            'pims_no' => 'required|min:1',
            'email' => 'required|email|max:225',
            'payment' => 'required|min:1',
        ]);

        $libraryUser = libraryUser::where('pims_no', $request->pims_no)->first();
        $overdue = overDueFine::all();
        if (count($overdue) > 0) {
            //summation of payment
            $payments = 0;
            foreach ($overdue as $value) {
                $payments += $value['payment'];
            }

            //check valid user and payment
            if (!is_null($libraryUser) > 0 AND $payments == $request->payment) {
                //if true user and payment, sent a email this email address
                $verifyCode = uniqid();
                Notification::route('mail', $request->email)->notify(new PaymentVerify($libraryUser, $request->email, $payments, $verifyCode));
                //store information in database who's sent a verification code
                $paymentList = paymentList::where('status', 0)->first();
                if (!is_null($paymentList)) {
                    $paymentList->name = $libraryUser->name;
                    $paymentList->pims_no = $libraryUser->pims_no;
                    $paymentList->email = $request->email;
                    $paymentList->payment = $payments;
                    $paymentList->verify_token = $verifyCode;
                    $paymentList->save();
                } else {
                    $paymentList = new paymentList();
                    $paymentList->name = $libraryUser->name;
                    $paymentList->pims_no = $libraryUser->pims_no;
                    $paymentList->email = $request->email;
                    $paymentList->payment = $payments;
                    $paymentList->verify_token = $verifyCode;
                    $paymentList->save();
                }

                    $notification = [
                        'message' => 'Verification code sent your email address. Please, check your email!',
                        'alert-type' => 'success'
                    ];
                return redirect()->to('/overude_fine/payment-verify')->with($notification);
            } else {
                // or false use and payment
                $notification = [
                    'message' => 'Something went wrong! Please try again.',
                    'alert-type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = [
                'message' => 'Something went wrong! No payment.',
                'alert-type' => 'error'
            ];
                return redirect()->to('/overude_fine/list')->with($notification);
        }
        

    }

    //payment verify form
    public function paymentVerify(){
        $paymentUser = paymentList::where('status', 0)->first();
        if (!is_null($paymentUser) == true) {
            return view('pages.overdue.paymentVerify', compact('paymentUser'));
        } else {
            $notification = [
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ];
            return redirect()->to('/overude_fine/list')->with($notification);
        }
    }

    //payment verification confirmation
    public function paymentVerifyConfirm(Request $request){
        $validatedData = $request->validate([
            'verification' => 'required',
        ]);

        $verify = paymentList::where('verify_token', $request->verification)->first();
        if (!is_null($verify) == true) {
           //if true, update some column in paymentLists table
           $verify->submit_date = date('Y-m-d');
           $verify->verify_token = NULL;
           $verify->status = 1;
           $verify->save();
           //delete all data from over_due_fines table
           $overdue = overDueFine::all();
           foreach ($overdue as $del) {
               $del->delete();
           }
           $notification = [
                'message' => 'Verification successfully! Payment confirmed.',
                'alert-type' => 'success'
            ];
            return redirect()->to('/payment-list/all')->with($notification);
        } else {
            $notification = [
                'message' => 'Invalid code!',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
