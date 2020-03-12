@extends('layouts.app')

@section('title')
  {{ "Edit Staff" }}
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
                        <form method="POST" action="{{ URL::to('user/staff/update/'.$staff->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Staff name</label>

                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Staff name" required value="{{ $staff->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile number</label>

                                <div class="col-md-6">
                                    <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile number" required value="{{ $staff->mobile }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="technology" class="col-md-4 col-form-label text-md-right">Technology</label>

                                <div class="col-md-6">
                                    <input type="text" id="technology" class="form-control" name="technology" placeholder="Technology" required value="{{ $staff->technology }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pims_no" class="col-md-4 col-form-label text-md-right">PIMS number</label>

                                <div class="col-md-6">
                                    <input type="text" id="pims_no" class="form-control" name="pims_no" placeholder="PIMS number" required value="{{ $staff->pims_no }}">
                                </div>
                            </div>                           

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Staff image</label>

                                <div class="col-md-6">
                                    <input type="file" id="image" class="form-control" name="image">
                                    <input type="hidden" name="old_image" value="{{ $staff->image }}">

                                    @if($staff->image != "")
                                            <img src="{{ URL::to($staff->image) }}" class="mt-2" title="{{ $staff->name }}" id="imgmodal"
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
