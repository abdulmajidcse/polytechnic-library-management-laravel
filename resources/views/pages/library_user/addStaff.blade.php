@extends('layouts.app')

@section('title')
  {{ "Add Staff" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Add new user(Staff)</div>

                        <div class="mt-2 ml-3">
                          <a href="{{ URL::to('user/student/add') }}" class="btn btn-outline-info m-1">For student</a>
                          <a href="{{ URL::to('user/staff/add') }}" class="btn btn-info m-1">For staff</a>
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
                        <form method="POST" action="{{ URL::to('user/staff/store') }}" enctype="multipart/form-data" class="was-validated">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Staff name</label>

                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Staff name" required>
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
                                <label for="pims_no" class="col-md-4 col-form-label text-md-right">PIMS number</label>

                                <div class="col-md-6">
                                    <input type="text" id="pims_no" class="form-control" name="pims_no" placeholder="PIMS number" required>
                                </div>
                            </div>                           

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Staff image</label>

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
