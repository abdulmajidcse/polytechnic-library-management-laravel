<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\book;
use App\libraryUser;
use App\borrow;
use App\overDueFine;

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
        $category = category::all();
        $typeOfBooks = book::all();
        $numberOfBooks = 0;
        foreach ($typeOfBooks as $value) {
            $numberOfBooks += $value['copy'];
        }
        $userStaff = libraryUser::all()->where('person', 'staff');
        $userStudent = libraryUser::all()->where('person', 'student');
        $borrow = borrow::all()->where('status', 0);
        //return date over
        $today = strtotime(date('Y-m-d'));
        $returnDateOver = 0;
        foreach ($borrow as $value) {
            $returnDate = strtotime($value['return_date']);
            if ($today > $returnDate) {
                $returnDateOver += 1;
            }
        }
        $returned = borrow::all()->where('status', 1);
        $overDue = overDueFine::all();
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
