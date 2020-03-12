@extends('layouts.app')

@section('title')
  {{ "Add Student" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Add new user(Student)</div>

                        <div class="mt-2 ml-3">
                          <a href="{{ URL::to('user/student/add') }}" class="btn btn-info m-1">For student</a>
                          <a href="{{ URL::to('user/staff/add') }}" class="btn btn-outline-info m-1">For staff</a>
                        </div>

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
                        <form method="POST" action="{{ URL::to('/user/student/store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Student name</label>

                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Student name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile number</label>

                                <div class="col-md-6">
                                    <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="technology" class="col-md-4 col-form-label text-md-right">Technology</label>

                                <div class="col-md-6">
                                    <input type="text" id="technology" class="form-control" name="technology" placeholder="Technology" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="session" class="col-md-4 col-form-label text-md-right">Session</label>

                                <div class="col-md-6">
                                    <input type="text" id="session" class="form-control" name="session" placeholder="Session" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shift" class="col-md-4 col-form-label text-md-right">Shift</label>

                                <div class="col-md-6">
                                    <input type="text" id="shift" class="form-control" name="shift" placeholder="Shift" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roll_no" class="col-md-4 col-form-label text-md-right">Roll number</label>

                                <div class="col-md-6">
                                    <input type="number" id="roll_no" class="form-control" name="roll_no" placeholder="Roll number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reg_no" class="col-md-4 col-form-label text-md-right">Registration number</label>

                                <div class="col-md-6">
                                    <input type="number" id="reg_no" class="form-control" name="reg_no" placeholder="Registration number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="library_card_no" class="col-md-4 col-form-label text-md-right">Library card number</label>

                                <div class="col-md-6">
                                    <input type="text" id="library_card_no" class="form-control" name="library_card_no" placeholder="Library card number" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Student image</label>

                                <div class="col-md-6">
                                    <input type="file" id="image" class="form-control" name="image">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-info">Add new</button>
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
