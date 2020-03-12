@extends('layouts.app')

@section('title')
  {{ "All Book" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">All book</div>

                    <div class="form-group m-2">
                        <input type="text" name="search" placeholder="Type here to search..." class="form-control mt-2" id="liveSearch">
                    </div>

                    <div class="card-body">
                        <!--all book table-->
                        <table id="liveTable" class="table table-hover table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Category name</th>
                                    <th>Book name</th>
                                    <th>Number of copy</th>
                                    <th>Author name</th>
                                    <th>Publisher name</th>
                                    <th>Book image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @if(count($book) < 1)
                                <tr>
                                    <td colspan="8"><p class="text-center text-danger"><em>No book</em></p></td>
                                </tr>
                                @else
                                @foreach($book as $row)
                                <tr class="tr">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->category->name }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->copy }}</td>
                                    <td>{{ $row->author }}</td>
                                    <td>{{ $row->publisher }}</td>
                                    <td>
                                        @if($row->image != "")
                                            <img src="{{ URL::to($row->image) }}" title="{{ $row->name }}" id="imgmodal"
  onclick="document.getElementById('modal01').style.display='block'" style="height:50px;cursor:zoom-in">
                                        @else
                                            <i class="fas fa-book-reader display-4 text-muted"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('/book/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a id="delete" href="{{ URL::to('/book/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table><!--end of all book table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
