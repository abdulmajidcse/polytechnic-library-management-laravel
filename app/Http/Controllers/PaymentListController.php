<?php

namespace App\Http\Controllers;

use App\Models\PaymentList;

class PaymentListController extends Controller
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
        $paymentList = PaymentList::where('status', 1)->get();
        return view('pages.payment_list.allPaymentList', compact('paymentList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymentList = PaymentList::find($id);
        if (!is_null($paymentList) == true) {
            return view('pages.payment_list.detailsPayment', compact('paymentList'));
        } else {
            $notification = [
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ];
            return redirect()->to('/payment-list/all')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentList = PaymentList::find($id);
        if (!is_null($paymentList) == true) {
            $paymentList->delete();
            $notification = [
                'message' => 'Payment list deleted successfully!',
                'alert-type' => 'success'
            ];
            return redirect()->to('/payment-list/all')->with($notification);
        } else {
            $notification = [
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ];
            return redirect()->to('/payment-list/all')->with($notification);
        }
    }
}
