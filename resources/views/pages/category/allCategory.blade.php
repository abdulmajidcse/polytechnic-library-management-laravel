@extends('layouts.app')

@section('title')
  {{ "All Category" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">All category</div>

                    <div class="form-group m-2">
                        <input type="text" name="search" placeholder="Type here to search..." class="form-control mt-2" id="liveSearch">
                    </div>

                    <div class="card-body">
                        <!--all category table-->
                        <table id="liveTable" class="table table-hover table-striped table-bordered table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Category name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @if(count($category) < 1)
                                <tr>
                                    <td colspan="3"><p class="text-center text-danger"><em>No category</em></p></td>
                                </tr>
                                @else
                                @foreach($category as $row)
                                <tr class="tr">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <a href="{{ URL::to('/category/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a id="delete" href="{{ URL::to('/category/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table><!--end of all category table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
