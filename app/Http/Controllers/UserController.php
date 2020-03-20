<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

class UserController extends Controller
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
        return view('admin.profile');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.editProfile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'max:11',
            'image' => 'mimes:jpg,jpeg,png|max:4000'
        ]);

        $user = User::find(Auth::user()->id);

        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $image = $request->file('image');

        if ($image) {
            $image_name = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "images/";
            $image_url = $upload_path.$image_full_name;
            
            if (!empty(Auth::user()->image)) {
                unlink(Auth::user()->image);
            }

            $user->name = $name;
            $user->email = $email;
            $user->mobile = $mobile;
            $user->image = $image_url;
            $user->save();

            $image->move($upload_path, $image_full_name);

            $notification = [
                'message' => 'Successfully profile saved!',
                'alert-type' => 'success'
            ];

        } else {
            $user->name = $name;
            $user->email = $email;
            $user->mobile = $mobile;
            $user->save();

            $notification = [
                'message' => 'Successfully profile saved!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->to('/profile')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
