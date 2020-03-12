<?php

namespace App\Http\Controllers;

use App\libraryUser;
use App\borrow;
use Illuminate\Http\Request;

class LibraryUserController extends Controller
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
    public function index_student()
    {
        $student = libraryUser::all()->where('person', 'student');
        return view('pages.library_user.allStudent', compact('student'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_staff()
    {
        $staff = libraryUser::all()->where('person', 'staff');
        return view('pages.library_user.allStaff', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_student()
    {
        return view('pages.library_user.addStudent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_staff()
    {
        return view('pages.library_user.addStaff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_student(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|min:3',
            'mobile' => 'required|unique:library_users|max:11|min:11',
            'technology' => 'required|min:2',
            'session' => 'required|max:10|min:4',
            'shift' => 'required|max:10|min:1',
            'roll_no' => 'required|unique:library_users|min:1',
            'reg_no' => 'required|unique:library_users|min:1',
            'library_card_no' => 'required|unique:library_users|min:1',
            'image' => 'mimes:jpg,jpeg,png|max:4000'
        ]);

        $student = new libraryUser();

        $data = array();
        $data['name'] = $request->name;
        $data['mobile'] = $request->mobile;
        $data['technology'] = $request->technology;
        $data['session'] = $request->session;
        $data['shift'] = $request->shift;
        $data['roll_no'] = $request->roll_no;
        $data['reg_no'] = $request->reg_no;
        $data['library_card_no'] = $request->library_card_no;
        $data['image'] = $request->file('image');

        if ($data['image']) {
            $image_name = uniqid();
            $ext = strtolower($data['image']->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "public/images/";
            $image_url = $upload_path.$image_full_name;

            $student->name = $data['name'];
            $student->mobile = $data['mobile'];
            $student->technology = $data['technology'];
            $student->session = $data['session'];
            $student->shift = $data['shift'];
            $student->roll_no = $data['roll_no'];
            $student->reg_no = $data['reg_no'];
            $student->library_card_no = $data['library_card_no'];
            $student->image = $image_url;
            $student->person = 'student';
            $student->save();

            $data['image']->move($upload_path, $image_full_name);

            $notification = [
                'message' => 'Successfully student added!',
                'alert-type' => 'success'
            ];

        } else {
            $student->name = $data['name'];
            $student->mobile = $data['mobile'];
            $student->technology = $data['technology'];
            $student->session = $data['session'];
            $student->shift = $data['shift'];
            $student->roll_no = $data['roll_no'];
            $student->reg_no = $data['reg_no'];
            $student->library_card_no = $data['library_card_no'];
            $student->person = 'student';
            $student->save();

            $notification = [
                'message' => 'Successfully student added!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->back()->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_staff(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|min:3',
            'mobile' => 'required|unique:library_users|max:11|min:11',
            'technology' => 'required|min:2',
            'pims_no' => 'required|unique:library_users|min:1',
            'image' => 'mimes:jpg,jpeg,png|max:4000'
        ]);

        $staff = new libraryUser();

        $data = array();
        $data['name'] = $request->name;
        $data['mobile'] = $request->mobile;
        $data['technology'] = $request->technology;
        $data['pims_no'] = $request->pims_no;
        $data['image'] = $request->file('image');

        if ($data['image']) {
            $image_name = uniqid();
            $ext = strtolower($data['image']->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "public/images/";
            $image_url = $upload_path.$image_full_name;

            $staff->name = $data['name'];
            $staff->mobile = $data['mobile'];
            $staff->technology = $data['technology'];
            $staff->pims_no = $data['pims_no'];
            $staff->image = $image_url;
            $staff->person = 'staff';
            $staff->save();

            $data['image']->move($upload_path, $image_full_name);

            $notification = [
                'message' => 'Successfully staff added!',
                'alert-type' => 'success'
            ];

        } else {
            $staff->name = $data['name'];
            $staff->mobile = $data['mobile'];
            $staff->technology = $data['technology'];
            $staff->pims_no = $data['pims_no'];
            $staff->person = 'staff';
            $staff->save();

            $notification = [
                'message' => 'Successfully staff added!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\libraryUser  $libraryUser
     * @return \Illuminate\Http\Response
     */
    public function show(libraryUser $libraryUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\libraryUser  $libraryUser
     * @return \Illuminate\Http\Response
     */
    public function edit_student($id)
    {
        $student = libraryUser::find($id);

        return view('pages.library_user.editStudent', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\libraryUser  $libraryUser
     * @return \Illuminate\Http\Response
     */
    public function edit_staff($id)
    {
        $staff = libraryUser::find($id);

        return view('pages.library_user.editStaff', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\libraryUser  $libraryUser
     * @return \Illuminate\Http\Response
     */
    public function update_student(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|min:3',
            'mobile' => 'required|max:11|min:11',
            'technology' => 'required|min:2',
            'session' => 'required|max:10|min:4',
            'shift' => 'required|max:10|min:1',
            'roll_no' => 'required|min:1',
            'reg_no' => 'required|min:1',
            'library_card_no' => 'required|min:1',
            'image' => 'mimes:jpg,jpeg,png|max:4000'
        ]);

        $student = libraryUser::find($id);

        $data = array();
        $data['name'] = $request->name;
        $data['mobile'] = $request->mobile;
        $data['technology'] = $request->technology;
        $data['session'] = $request->session;
        $data['shift'] = $request->shift;
        $data['roll_no'] = $request->roll_no;
        $data['reg_no'] = $request->reg_no;
        $data['library_card_no'] = $request->library_card_no;
        $data['image'] = $request->file('image');

        if ($data['image']) {
            $image_name = uniqid();
            $ext = strtolower($data['image']->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "public/images/";
            $image_url = $upload_path.$image_full_name;            

            $student->name = $data['name'];
            $student->mobile = $data['mobile'];
            $student->technology = $data['technology'];
            $student->session = $data['session'];
            $student->shift = $data['shift'];
            $student->roll_no = $data['roll_no'];
            $student->reg_no = $data['reg_no'];
            $student->library_card_no = $data['library_card_no'];
            $student->image = $image_url;
            $student->person = 'student';
            $student->save();

            $data['image']->move($upload_path, $image_full_name);

            $old_image = $request->old_image;

            if (!empty($old_image)) {
                unlink($old_image);
            }

            $notification = [
                'message' => 'Successfully student saved!',
                'alert-type' => 'success'
            ];

        } else {
            $student->name = $data['name'];
            $student->mobile = $data['mobile'];
            $student->technology = $data['technology'];
            $student->session = $data['session'];
            $student->shift = $data['shift'];
            $student->roll_no = $data['roll_no'];
            $student->reg_no = $data['reg_no'];
            $student->library_card_no = $data['library_card_no'];
            $student->person = 'student';
            $student->save();

            $notification = [
                'message' => 'Successfully student saved!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->to('/user/student/all')->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\libraryUser  $libraryUser
     * @return \Illuminate\Http\Response
     */
    public function update_staff(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50|min:3',
            'mobile' => 'required|max:11|min:11',
            'technology' => 'required|min:2',
            'pims_no' => 'required|min:1',
            'image' => 'mimes:jpg,jpeg,png|max:4000'
        ]);

        $staff = libraryUser::find($id);

        $data = array();
        $data['name'] = $request->name;
        $data['mobile'] = $request->mobile;
        $data['technology'] = $request->technology;
        $data['pims_no'] = $request->pims_no;
        $data['image'] = $request->file('image');

        if ($data['image']) {
            $image_name = uniqid();
            $ext = strtolower($data['image']->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "public/images/";
            $image_url = $upload_path.$image_full_name;

            $staff->name = $data['name'];
            $staff->mobile = $data['mobile'];
            $staff->technology = $data['technology'];
            $staff->pims_no = $data['pims_no'];
            $staff->image = $image_url;
            $staff->person = 'staff';
            $staff->save();

            $data['image']->move($upload_path, $image_full_name);

            $old_image = $request->old_image;

            if (!empty($old_image)) {
                unlink($old_image);
            }

            $notification = [
                'message' => 'Successfully staff saved!',
                'alert-type' => 'success'
            ];

        } else {
            $staff->name = $data['name'];
            $staff->mobile = $data['mobile'];
            $staff->technology = $data['technology'];
            $staff->pims_no = $data['pims_no'];
            $staff->person = 'staff';
            $staff->save();

            $notification = [
                'message' => 'Successfully staff saved!',
                'alert-type' => 'success'
            ];
        }

        return redirect()->to('/user/staff/all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\libraryUser  $libraryUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libraryUser = libraryUser::find($id);
        if ($libraryUser) {
            $borrow = borrow::all()->where('library_user_id', $id);
            if (count($borrow) > 0) {
                $notification = [
                    'message' => 'Can\'t delete this user! Because this user has in the borrow list or return list.',
                    'alert-type' => 'warning'
                ];
            } else {
                $image = $libraryUser->image;
                $libraryUser->delete();

                if (!empty($image)) {
                    unlink($image);
                }

                $notification = [
                    'message' => 'Successfully user deleted!',
                    'alert-type' => 'success'
                ];
            }
        } else {
            $notification = [
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            ];
        }
        return redirect()->back()->with($notification);
    }
}
