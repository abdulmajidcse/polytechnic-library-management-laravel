<?php

namespace App\Http\Controllers;

use App\borrow;
use App\libraryUser;
use App\category;
use App\book;
use Illuminate\Http\Request;
use DB;

class BorrowController extends Controller
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
        $borrow = borrow::all()->where('status', 0);
        return view('pages.borrow_book.allBorrowBook', compact('borrow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('pages.borrow_book.addBorrowBook', compact('category'));
    }

    /**
     * Show library user by person
     */
    public function select_user($person)
    { 
        if ($person == "student" || $person == "staff") {
            $user = libraryUser::all()->where('person', $person);
            $count = count($user);
            if ($person == "student" && $count > 0) {
                echo "<div class='form-group row'>
                <label for='library_user_id' class='col-md-4 col-form-label text-md-right text-info'>Roll number</label>
                <div class='col-md-6'><select id='library_user_id' name='library_user_id' class='form-control'>
                <option value='' selected=''>Select a roll number</option>";
                foreach ($user as $value) {
                    echo "<option value='".$value['id']."'>".$value['roll_no']."</option>";
                }
                echo "</select></div></div>";
            } else if ($person == "staff" && $count > 0) {
                echo "<div class='form-group row'>
                <label for='library_user_id' class='col-md-4 col-form-label text-md-right text-info'>PIMS number</label>
                <div class='col-md-6'><select id='library_user_id' name='library_user_id' class='form-control'>
                <option value='' selected=''>Select a PIMS number</option>";
                foreach ($user as $value) {
                    echo "<option value='".$value['id']."'>".$value['pims_no']."</option>";
                }
                echo "</select></div></div>";
            } else {
                echo "<script type='text/javascript'>swal('No user!', 'Please, select another user.', 'warning');</script>";
            }
        } else {
            echo "";
        }
    }

    /**
     * Show all book by category
     */
    public function select_book($category_id)
    { 
        if ($category_id != 'Select a category') {
            $book = book::all()->where('category_id', $category_id)->where('copy', '>', 0);
            $count = count($book);
            if ($count > 0) {
                echo "<div class='form-group row'>
                <label for='book_id' class='col-md-4 col-form-label text-md-right text-info'>Book name</label>
                <div class='col-md-6'><select id='book_id' name='book_id' class='form-control'>
                <option value='' selected=''>Select a book</option>";
                foreach ($book as $value) {
                    echo "<option value='".$value['id']."'>".$value['name']."</option>";
                }
                echo "</select></div></div>";
            }  else {
                echo "<script type='text/javascript'>swal('No book!', 'Please, select another category.', 'warning');</script>";
            }
        } else {
            echo "";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'library_user_id' => 'required|min:1',
            'category_id' => 'required|min:1',
            'book_id' => 'required|min:1',
            'return_date' => 'required|min:1'
        ]);
        $borrowed = DB::select('select * from borrows where status = :status && library_user_id = :library_user_id', ['status' => 0,  'library_user_id' => $request->library_user_id]);
        if ($borrowed) {
           $notification = [
                'message' => 'This user already borrowed a book!',
                'alert-type' => 'error'
            ];
        } else {
            $borrow = new borrow();
            $borrow->library_user_id = $request->library_user_id;
            $borrow->category_id = $request->category_id;
            $borrow->book_id = $request->book_id;
            $borrow->borrow_date = date('Y-m-d');
            $borrow->return_date = $request->return_date;
            $borrow->save();

            $book = book::find($request->book_id);
            $copy = $book->copy;
            $copy -= 1;
            $book->copy = $copy;
            $book->save();

            $notification = [
                    'message' => 'Successfully book borrowed!',
                    'alert-type' => 'success'
                ];
        }
        
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checkBorrow = DB::select('select * from borrows where id = :id && status = :status', ['id' => $id, 'status' => 0]);
        if ($checkBorrow) {
            $borrow = borrow::find($id);
            return view('pages.borrow_book.detailsBorrowBook', compact('borrow'));
        } else {
            $notification = [
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ];
            return redirect()->to('/borrow/book/all')->with($notification);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(borrow $borrow)
    {
        //
    }
}
