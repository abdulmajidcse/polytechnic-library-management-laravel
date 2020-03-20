@extends('layouts.app')

@section('title')
  {{ "Add Book" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Add new book</div>

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
                        <form method="POST" action="{{ URL::to('/book/store') }}" enctype="multipart/form-data" class="was-validated">
                            @csrf

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">Category name</label>

                                <div class="col-md-6">
                                    <select id="category_id" name="category_id" class="form-control">
                                        @foreach($category as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Book name</label>

                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Book name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="copy" class="col-md-4 col-form-label text-md-right">Number of copy</label>

                                <div class="col-md-6">
                                    <input type="number" id="copy" class="form-control" name="copy" placeholder="Number of copy" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="author" class="col-md-4 col-form-label text-md-right">Author name</label>

                                <div class="col-md-6">
                                    <input type="text" id="author" class="form-control" name="author" placeholder="Author name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="publisher" class="col-md-4 col-form-label text-md-right">Publisher name</label>

                                <div class="col-md-6">
                                    <input type="text" id="publisher" class="form-control" name="publisher" placeholder="Publisher name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Book image</label>

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
