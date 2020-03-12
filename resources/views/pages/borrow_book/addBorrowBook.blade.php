@extends('layouts.app')

@section('title')
  {{ "New Borrow Book" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Borrow a book</div>

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
                        <form method="POST" action="{{ URL::to('/borrow/book/store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="person" class="col-md-4 col-form-label text-md-right">User</label>

                                <div class="col-md-6">
                                    <select id="person" name="person" class="form-control" required="">
                                        <option selected="">Select an user</option>
                                        <option value="student">Student</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>
                            </div>

                            <div id="library_user">
                                <!--library user -->
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">Book category</label>

                                <div class="col-md-6">
                                    <select id="category_id" name="category_id" class="form-control" required="">
                                        <option selected="">Select a category</option>
                                        @foreach($category as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="bookByCategory">
                                <!--select all book by category-->
                            </div>

                            <div class="form-group row">
                                <label for="borrow_date" class="col-md-4 col-form-label text-md-right">Borrow date</label>

                                <div class="col-md-6">
                                    <input readonly="readonly" id="borrow_date" name="borrow_date" value="{{ date('Y-m-d') }}" class="form-control" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="return_date" class="col-md-4 col-form-label text-md-right">Return date</label>

                                <div class="col-md-6">
                                    <input type="date" id="return_date" name="return_date" min="{{ date('Y-m-d') }}" class="form-control" placeholder="Return date" required="">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-info">Confirm</button>
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
