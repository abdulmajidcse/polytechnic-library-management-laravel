@extends('layouts.app')

@section('title')
  {{ "Payment submit (Over due fine)" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Payment submit</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/send-token') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="pims_no" class="col-md-4 col-form-label text-md-right">Staff PIMS No</label>

                                <div class="col-md-6">
                                    <select id="pims_no" name="pims_no" class="form-control @error('pims_no') is-invalid @enderror" required="">
                                        <option selected="" value="">Selct a PIMS No</option>
                                        @foreach ($libraryUser as $pims)
                                            <option value="{{ $pims->pims_no }}">{{ $pims->pims_no }}</option>
                                        @endforeach
                                    </select>
                                    @error('pims_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email address</label>

                                <div class="col-md-6">
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="username@exaple.com"  value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="payment" class="col-md-4 col-form-label text-md-right">Payment</label>
                                @php
                                    $payments = 0;
                                @endphp
                                @foreach ($overDueFine as $pay)
                                    @php
                                        $payments += $pay->payment;
                                    @endphp
                                @endforeach
                                <div class="col-md-6">
                                    <input readonly="" id="payment" value="{{ $payments . ' tk' }}" class="form-control" >
                                    <input type="hidden" name="payment" value="{{ $payments }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-info">Verify</button>
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
