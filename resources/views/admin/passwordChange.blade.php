@extends('layouts.app')

@section('title')
  {{ "Change Password" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">{{ __('Change Password') }}</div>
                    @if(session('errorMsg'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Wrong! </strong>{{ session('errorMsg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ url('/password/update') }}" class="was-validated">
                            @csrf

                            <div class="form-group row">
                                <label for="oldPassword" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                <div class="col-md-6">
                                    <input id="oldPassword" type="password" class="form-control" name="oldPassword" required placeholder="Old password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="newPassword" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="newPassword" type="password" class="form-control" name="newPassword" required placeholder="New password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confirmPassword" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" required placeholder="Confirm password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Change Password') }}
                                    </button>
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
