@extends('layouts.app')

@section('title')
  {{ "Profile" }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Profile</div>
                    <div class="card-body">
                        <!--profile table-->
                        <table class="table table-hover table-striped table-bordered table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ Auth::user()->email }}</td>
                                    <td>
                                        @if(Auth::user()->mobile != "")
                                            {{ Auth::user()->mobile }}
                                        @else
                                            <strong class="text-danger">{{ __('Empty!') }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->image != "")
                                            <img src="{{ URL::to(Auth::user()->image) }}" title="{{ Auth::user()->name }}" id="imgmodal"
  onclick="document.getElementById('modal01').style.display='block'" style="height:50px;cursor:zoom-in">
                                        @else
                                            <i class="fas fa-user display-4 text-muted"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('/profile/edit') }}" class="btn btn-sm btn-info">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table><!--end of profile table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
