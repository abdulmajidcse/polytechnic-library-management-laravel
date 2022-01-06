<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\LibraryUser;
use App\Models\OverDueFine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
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
        $returned = Borrow::all()->where('status', 1);
        return view('pages.return_book.allReturnBook', compact('returned'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    //
    public function returnBook(Request $request, $id)
    {
        $returned = Borrow::find($id);
        $returned->returned_date = date('Y-m-d');
        $returned->over_due_fine = $request->fine;
        $returned->status = 1;
        $returned->save();

        $book = Book::find($returned->book_id);
        $copy = $book->copy;
        $copy += 1;
        $book->copy = $copy;
        $book->save();

        //overdue fine added in overdue fine list
        if ($request->fine > 0) {
            $user = LibraryUser::find($returned->library_user_id);
            if ($user->person == 'student') {
                $roll_pims_no = $user->roll_no;
                $overdue = new overDueFine();
                $overdue->roll_pims_no = $roll_pims_no;
                $overdue->submit_date = date('Y-m-d');
                $overdue->payment = $request->fine;
                $overdue->save();
            } else {
                $roll_pims_no = $user->pims_no;
                $overdue = new overDueFine();
                $overdue->roll_pims_no = $roll_pims_no;
                $overdue->submit_date = date('Y-m-d');
                $overdue->payment = $request->fine;
                $overdue->save();
                
            }
        }
        

        $notification = [
            'message' => 'Successfully returned book!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checkReturn = DB::select('select * from borrows where id = :id && status = :status', ['id' => $id, 'status' => 1]);
        if ($checkReturn) {
            $returned = Borrow::find($id);
            return view('pages.return_book.detailsReturnBook', compact('returned'));
        } else {
            $notification = [
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ];
            return redirect()->to('/return/book/all')->with($notification);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkReturn = DB::select('select * from borrows where id = :id && status = :status', ['id' => $id, 'status' => 1]);
        if ($checkReturn) {
            $returned = Borrow::find($id);
            $returned->delete();
            $notification = [
                'message' => 'Successfully return book deleted!',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ];
            return redirect()->to('/return/book/all')->with($notification);
        }
    }
}
