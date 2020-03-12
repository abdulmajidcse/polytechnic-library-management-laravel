@extends('layouts.app')

@section('title')
  {{ "Payment verify" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Payment verify</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/overude_fine/payment-verification') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email address</label>

                                <div class="col-md-6">
                                    <input readonly="" id="email" name="email" class="form-control"  value="{{ $paymentUser->email }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="verification" class="col-md-4 col-form-label text-md-right">Verification code</label>
                                <div class="col-md-6">
                                    <input type="text" id="verification" name="verification" placeholder="***********" class="form-control @error('verification') is-invalid @enderror" required="">
                                    @error('verification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
