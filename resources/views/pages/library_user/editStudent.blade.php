@extends('layouts.app')

@section('title')
  {{ "Edit Student" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Edit user(Student)</div>

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
                                <strong>Wrong! </strong>{{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ URL::to('/user/student/update/'.$student->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Student name</label>

                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Student name" required value="{{ $student->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile number</label>

                                <div class="col-md-6">
                                    <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile number" required value="{{ $student->mobile }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="technology" class="col-md-4 col-form-label text-md-right">Technology</label>

                                <div class="col-md-6">
                                    <input type="text" id="technology" class="form-control" name="technology" placeholder="Technology" required value="{{ $student->technology }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="session" class="col-md-4 col-form-label text-md-right">Session</label>

                                <div class="col-md-6">
                                    <input type="text" id="session" class="form-control" name="session" placeholder="Session" required value="{{ $student->session }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shift" class="col-md-4 col-form-label text-md-right">Shift</label>

                                <div class="col-md-6">
                                    <input type="text" id="shift" class="form-control" name="shift" placeholder="Shift" required value="{{ $student->shift }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roll_no" class="col-md-4 col-form-label text-md-right">Roll number</label>

                                <div class="col-md-6">
                                    <input type="number" id="roll_no" class="form-control" name="roll_no" placeholder="Roll number" required value="{{ $student->roll_no }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reg_no" class="col-md-4 col-form-label text-md-right">Registration number</label>

                                <div class="col-md-6">
                                    <input type="number" id="reg_no" class="form-control" name="reg_no" placeholder="Registration number" required value="{{ $student->reg_no }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="library_card_no" class="col-md-4 col-form-label text-md-right">Library card number</label>

                                <div class="col-md-6">
                                    <input type="text" id="library_card_no" class="form-control" name="library_card_no" placeholder="Library card number" required value="{{ $student->library_card_no }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Student image</label>

                                <div class="col-md-6">
                                    <input type="file" id="image" class="form-control" name="image">
                                    <input type="hidden" name="old_image" value="{{ $student->image }}">

                                    @if($student->image != "")
                                            <img src="{{ URL::to($student->image) }}" class="mt-2" title="{{ $student->name }}" id="imgmodal"
  onclick="document.getElementById('modal01').style.display='block'" style="height:50px;cursor:zoom-in">
                                        @else
                                            <i class="fas fa-user display-4 text-muted mt-2"></i>
                                        @endif

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
