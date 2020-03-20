<?php

namespace App\Http\Controllers;

use App\book;
use App\category;
use Illuminate\Http\Request;
use App\borrow;

class BookController extends Controller
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
        $book = book::all();
        return view('pages.book.allBook', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('pages.book.addBook', compact('category'));
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
            'category_id' => 'required|min:1',
            'name' => 'required|unique:books|max:50|min:3',
            'copy' => 'required|min:1',
            'author' => 'required|max:50|min:3',
            'publisher' => 'required|max:50|min:3',
            'image' => 'mimes:jpg,jpeg,png|max:4000'
        ]);

        $book = new book();

        $category_id = $request->category_id;
        $name = $request->name;
        $copy = $request->copy;
        $author = $request->author;
        $publisher = $request->publisher;
        $image = $request->file('image');

        if ($image) {
            $image_name = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "images/";
            $image_url = $upload_path.$image_full_name;

            $book->category_id = $category_id;
            $book->name = $name;
            $book->copy = $copy;
            $book->author = $author;
            $book->publisher = $publisher;
            $book->image = $image_url;
            $book->save();

            $image->move($upload_path, $image_full_name);

            $notification = [
                'message' => 'Successfully book added!',
                'alert-type' => 'success'
            ];

        } else {
            $book->category_id = $category_id;
            $book->name = $name;
            $book->copy = $copy;
            $book->author = $author;
            $book->publisher = $publisher;
            $book->save();

            $notification = [
                'message' => 'Successfully book added!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = book::find($id);
        $category = category::all();

        return view('pages.book.editBook', compact('book', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|min:1',
            'name' => 'required|max:50|min:3',
            'copy' => 'required|min:1',
            'author' => 'required|max:50|min:3',
            'publisher' => 'required|max:50|min:3',
            'image' => 'mimes:jpg,jpeg,png|max:4000'
        ]);

        $book = book::find($id);

        $category_id = $request->category_id;
        $name = $request->name;
        $copy = $request->copy;
        $author = $request->author;
        $publisher = $request->publisher;
        $image = $request->file('image');
        $old_image = $request->old_image;

        if ($image) {
            $image_name = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "images/";
            $image_url = $upload_path.$image_full_name;

            $book->category_id = $category_id;
            $book->name = $name;
            $book->copy = $copy;
            $book->author = $author;
            $book->publisher = $publisher;
            $book->image = $image_url;
            $book->save();

            $image->move($upload_path, $image_full_name);

            if (!empty($old_image)) {
                unlink($old_image);
            }

            $notification = [
                'message' => 'Successfully book saved!',
                'alert-type' => 'success'
            ];

        } else {
            $book->category_id = $category_id;
            $book->name = $name;
            $book->copy = $copy;
            $book->author = $author;
            $book->publisher = $publisher;
            $book->save();

            $notification = [
                'message' => 'Successfully book saved!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->to('/book/all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = book::find($id);
        if ($book) {
            $borrow = borrow::all()->where('book_id', $id);
            if (count($borrow) > 0) {
                $notification = [
                    'message' => 'Can\'t delete this book! Because this book has in the borrow list or return list.',
                    'alert-type' => 'warning'
                ];
            } else {
                $image = $book->image;
                $book->delete();

                if (!empty($image)) {
                    unlink($image);
                }

                $notification = [
                    'message' => 'Successfully book deleted!',
                    'alert-type' => 'success'
                ];
            }
        } else {
            $notification = [
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ];
        }
        return redirect()->to('/book/all')->with($notification);
    }
}
