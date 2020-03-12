@extends('layouts.app')

@section('title')
  {{ "All Student" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">All user(Student)</div>

                    <div class="mt-3 ml-3">
                      <a href="{{ URL::to('user/student/all') }}" class="btn btn-info m-1">All student</a>
                      <a href="{{ URL::to('user/staff/all') }}" class="btn btn-outline-info m-1">All staff</a>
                      <input type="text" name="search" placeholder="Type here to search..." class="form-control" id="liveSearch" style="display: inline-block;width: 80%;">
                    </div>

                    <div class="card-body">
                        <!--all student table-->
                        <table id="liveTable" class="table table-hover table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Student name</th>
                                    <th>Mobile number</th>
                                    <th>Technology</th>
                                    <th>Session</th>
                                    <th>Shift</th>
                                    <th>Roll no</th>
                                    <th>Reg no</th>
                                    <th>library card no</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @if(count($student) < 1)
                                <tr>
                                    <td colspan="11"><p class="text-center text-danger"><em>No student</em></p></td>
                                </tr>
                                @else
                                @foreach($student as $row)
                                <tr class="tr">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->mobile }}</td>
                                    <td>{{ $row->technology }}</td>
                                    <td>{{ $row->session }}</td>
                                    <td>{{ $row->shift }}</td>
                                    <td>{{ $row->roll_no }}</td>
                                    <td>{{ $row->reg_no }}</td>
                                    <td>{{ $row->library_card_no }}</td>
                                    <td>
                                        @if($row->image != "")
                                            <img src="{{ URL::to($row->image) }}" title="{{ $row->name }}" id="imgmodal"
  onclick="document.getElementById('modal01').style.display='block'" style="height:50px;cursor:zoom-in">
                                        @else
                                            <i class="fas fa-user display-4 text-muted"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('/user/student/edit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a id="delete" href="{{ URL::to('/user/delete/'.$row->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table><!--end of all student table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
