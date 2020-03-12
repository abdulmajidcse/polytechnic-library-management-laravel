@extends('layouts.app')

@section('title')
  {{ "All Borrow Book" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">All borrowed book</div>

                    <div class="form-group m-2">
                        <input type="text" name="search" placeholder="Type here to search..." class="form-control mt-2" id="liveSearch">
                    </div>

                    <div class="card-body">
                        <!--all borrow book table-->
                        <table id="liveTable" class="table table-hover table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Book name</th>
                                    <th>Roll / PIMS no</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Borrow date</th>
                                    <th>Return date</th>
                                    <th>Overdue fine</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @if(count($borrow) < 1)
                                <tr>
                                    <td colspan="9"><p class="text-center text-danger"><em>No borrow</em></p></td>
                                </tr>
                                @else
                                @foreach($borrow as $row)
                                <tr class="tr">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->book->name }}</td>
                                    <td>{{ $row->libraryUser->roll_no }} 
                                        {{ $row->libraryUser->pims_no }}</td>
                                    <td>{{ $row->libraryUser->name }}</td>
                                    <td>
                                        @if($row->libraryUser->image != "")
                                            <img src="{{ URL::to($row->libraryUser->image) }}" title="{{ $row->libraryUser->name }}" id="imgmodal"
  onclick="document.getElementById('modal01').style.display='block'" style="height:50px;cursor:zoom-in">
                                        @else
                                            <i class="fas fa-user h1 text-muted"></i>
                                        @endif
                                    </td>
                                    <td>{{ $row->borrow_date }}</td>
                                    <td>{{ $row->return_date }}</td>
                                    <td>
                                        @php
                                            $fine = 0;
                                            $todaytime = strtotime(date('Y-m-d'));
                                            $returndaytime = strtotime($row->return_date);
                                        @endphp
                                        @if($todaytime > $returndaytime)
                                        @php
                                          $time = $todaytime - $returndaytime;
                                          $timediv = $time / 86400;
                                          $timeint = (int)$timediv;
                                          $fine += 10 * $timeint;
                                          @endphp
                                          {{ $fine }} <span> tk</span>
                                        @else
                                        {{ $row->over_due_fine }} <span> tk</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('/borrow/book/details/'.$row->id) }}" class="btn btn-sm btn-success">Details</a>
                                        <form action="{{ URL::to('return/book/'.$row->id) }}" method="post" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="fine" value="{{ $fine }}">
                                            <button onclick="return confirm('Are you want to return? Overdue fine = {{ $fine }} tk.')" type="submit" class="btn btn-sm btn-danger" id="returnConfirm">Return</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table><!--end of all borrow book table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
