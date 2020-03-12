@extends('layouts.app')

@section('title')
  {{ "All payment list" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">All payment list</div>

                    <div class="form-group m-2">
                        <input type="text" name="search" placeholder="Type here to search..." class="form-control mt-2" id="liveSearch">
                    </div>

                    <div class="card-body">
                        <!--overdue fine list table-->
                        <table id="liveTable" class="table table-hover table-striped table-bordered table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>PIMS no</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Submit date</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @if(count($paymentList) < 1)
                                <tr>
                                    <td colspan="7"><p class="text-center text-danger"><em>No payment</em></p></td>
                                </tr>
                                @else
                                    @foreach($paymentList as $row)
                                    <tr class="tr">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->pims_no }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->submit_date }}</td>
                                        <td>{{ $row->payment }} tk</td>
                                        <td>
                                            <a href="{{ url('/payment-list/details/'.$row->id) }}" class="btn btn-info btn-sm">Print</a>
                                            <a id="delete" href="{{ url('/payment-list/delete/'.$row->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table><!--end of overdue fine list table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection