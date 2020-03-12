@extends('layouts.app')

@section('title')
  {{ "All Return Book" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">All returned book</div>

                    <div class="form-group m-2">
                        <input type="text" name="search" placeholder="Type here to search..." class="form-control mt-2" id="liveSearch">
                    </div>

                    <div class="card-body">
                        <!--all return book table-->
                        <table id="liveTable" class="table table-hover table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Book name</th>
                                    <th>Roll / PIMS no</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Returned date</th>
                                    <th>Overdue fine</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @if(count($returned) < 1)
                                <tr>
                                    <td colspan="9"><p class="text-center text-danger"><em>No return</em></p></td>
                                </tr>
                                @else
                                @foreach($returned as $row)
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
                                    <td>{{ $row->returned_date }}</td>
                                    <td>{{ $row->over_due_fine }}</td>
                                    <td><span class="text-success font-weight-bold"><em>Returned</em></span></td>
                                    <td>
                                        <a href="{{ URL::to('/return/book/details/'.$row->id) }}" class="btn btn-sm btn-success">Details</a>
                                        <a id="delete" href="{{ URL::to('/return/book/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table><!--end of all return book table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
