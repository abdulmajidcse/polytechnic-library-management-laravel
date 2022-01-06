<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use App\Models\LibraryUser;
use App\Models\Borrow;
use App\Models\OverDueFine;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //library overview from database
        $category = Category::all();
        $typeOfBooks = Book::all();
        $numberOfBooks = 0;
        foreach ($typeOfBooks as $value) {
            $numberOfBooks += $value['copy'];
        }
        $userStaff = LibraryUser::all()->where('person', 'staff');
        $userStudent = LibraryUser::all()->where('person', 'student');
        $borrow = Borrow::all()->where('status', 0);
        //return date over
        $today = strtotime(date('Y-m-d'));
        $returnDateOver = 0;
        foreach ($borrow as $value) {
            $returnDate = strtotime($value['return_date']);
            if ($today > $returnDate) {
                $returnDateOver += 1;
            }
        }
        $returned = Borrow::all()->where('status', 1);
        $overDue = OverDueFine::all();
        $overDueFine = 0;
        foreach ($overDue as $value) {
            $overDueFine += $value['payment'];
        }

        //total library overview array
        $total = array();
        $total['category'] = count($category);
        $total['typeOfBooks'] = count($typeOfBooks);
        $total['numberOfBooks'] = $numberOfBooks;
        $total['userStaff'] = count($userStaff);
        $total['userStudent'] = count($userStudent);
        $total['borrow'] = count($borrow);
        $total['returnDateOver'] = $returnDateOver;
        $total['returned'] = count($returned);
        $total['overDueFine'] = $overDueFine;

        return view('home', compact('total'));
    }


}
