@extends('layouts.app')

@section('title')
  {{ "Payment Details" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Payment details<span class="btn btn-sm btn-primary ml-1" style="cursor: pointer;" onclick="printContent('printDoc')">Print</span></div>

                    <div class="card-body">
                        <!--payment details table-->
                        <table class="table table-hover table-striped table-bordered table-responsive-lg">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $paymentList->name }}</td>
                                </tr>
                                <tr>
                                    <th>PIMS number</th>
                                    <td>{{ $paymentList->pims_no }}</td>
                                </tr>
                                <tr>
                                    <th>E-mail</th>
                                    <td>{{ $paymentList->email }}</td>
                                </tr>
                                <tr>
                                    <th>Submit date</th>
                                    <td>{{ $paymentList->submit_date }}</td>
                                </tr>
                                <tr>
                                    <th>Payment</th>
                                    <td>{{ $paymentList->payment }} tk</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><span class="text-success font-weight-bold"><em>Success</em></span></td>
                                </tr>
                            </tbody>
                        </table><!--end of payment details table-->
                    </div>
                </div>
                <!--print document section-->
                <div id="printDoc" class="card d-none">
                    <div class="card-header">
                        <p class="h4 text-center font-weight-bold">Kurigram Polytechnic Institute, Kurigram</p>
                        <p class="text-center">Library Management-{{ date('Y') }}</p>
                        <span class="text-info">Payment details</span>
                        </div>

                    <div class="card-body">
                        <!--payment details table-->
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $paymentList->name }}</td>
                                </tr>
                                <tr>
                                    <th>PIMS number</th>
                                    <td>{{ $paymentList->pims_no }}</td>
                                </tr>
                                <tr>
                                    <th>E-mail</th>
                                    <td>{{ $paymentList->email }}</td>
                                </tr>
                                <tr>
                                    <th>Submit date</th>
                                    <td>{{ $paymentList->submit_date }}</td>
                                </tr>
                                <tr>
                                    <th>Payment</th>
                                    <td>{{ $paymentList->payment }} tk</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><span class="text-success font-weight-bold"><em>Success</em></span></td>
                                </tr>
                            </tbody>
                        </table><!--end of payment details table-->
                    </div>
                    <div class="row mt-5">
                        <div class="col-6">
                            <p class="ml-2 p-4 font-weight-bold"><u>Receiver's signature</u></p>
                        </div>
                        <div class="col-6 text-right">
                            <p class="mr-2 p-4 font-weight-bold"><u>Librarian's signature</u></p>
                        </div>
                    </div>
                </div><!--end of print document section-->
            </div>
        </div>
    </div>
</div>
@endsection
