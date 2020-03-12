@extends('layouts.app')

@section('title')
  {{ "Overdue Fine List" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Overdue fine list <a href="{{ url('/overude_fine/payment-submit') }}" class="btn btn-info btn-sm ml-1">Submit</a>
                        <span class="btn btn-sm btn-primary ml-1" style="cursor: pointer;" onclick="printContent('printDoc')">Print</span>
                    </div>

                    <div class="form-group m-2">
                        <input type="text" name="search" placeholder="Type here to search..." class="form-control mt-2" id="liveSearch">
                    </div>

                    <div class="card-body">
                        <!--overdue fine list table-->
                        <table id="liveTable" class="table table-hover table-striped table-bordered table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Roll / PIMS no</th>
                                    <th>Submit date</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                    $totalPayment = 0;
                                @endphp
                                @if(count($overdueList) < 1)
                                <tr>
                                    <td colspan="4"><p class="text-center text-danger"><em>No payment</em></p></td>
                                </tr>
                                @else
                                @foreach($overdueList as $row)
                                @php $totalPayment += $row->payment; @endphp
                                <tr class="tr">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->roll_pims_no }}</td>
                                    <td>{{ $row->submit_date }}</td>
                                    <td>{{ $row->payment }} tk</td>
                                </tr>
                                @endforeach
                                <tfoot>
                                    <tr class="tr">
                                        <td colspan="3" class="text-center font-weight-bold">Total payment</td>
                                        <td class="font-weight-bold">{{ $totalPayment }} tk</td>
                                    </tr>
                                </tfoot>
                                @endif
                            </tbody>
                        </table><!--end of overdue fine list table-->
                    </div>
                </div>

                <!--print document section-->
                <div id="printDoc" class="card d-none">
                    <div class="card-header">
                        <p class="h4 text-center font-weight-bold">Kurigram Polytechnic Institute, Kurigram</p>
                        <p class="text-center">Library Management-{{ date('Y') }}</p>
                        <span class="text-info">Total overdue fine list</span>
                        </div>

                    <div class="card-body">
                        <!--overdue fine list table-->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Roll / PIMS no</th>
                                    <th>Submit date</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                    $totalPayment = 0;
                                @endphp
                                @if(count($overdueList) < 1)
                                <tr>
                                    <td colspan="4"><p class="text-center text-danger"><em>No payment</em></p></td>
                                </tr>
                                @else
                                @foreach($overdueList as $row)
                                @php $totalPayment += $row->payment; @endphp
                                <tr class="tr">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->roll_pims_no }}</td>
                                    <td>{{ $row->submit_date }}</td>
                                    <td>{{ $row->payment }} tk</td>
                                </tr>
                                @endforeach
                                <tfoot>
                                    <tr class="tr">
                                        <td colspan="3" class="text-center font-weight-bold">Total payment</td>
                                        <td class="font-weight-bold">{{ $totalPayment }} tk</td>
                                    </tr>
                                </tfoot>
                                @endif
                            </tbody>
                        </table><!--end of overdue fine list table-->
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