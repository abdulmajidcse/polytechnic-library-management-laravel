@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Library Overview</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                       
                        <!-- library overview content -->
                        <div class="mt-3">
                          <div class="row">



                            <!-- total Categories -->
                            <div class="col-xl-4 col-md-6 mb-4">
                              <div class="card shadow h-100 py-2 card1">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs text-primary mb-1">Categories</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total['category'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-th fa-2x text-primary"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of total Categories -->


                            <!-- type of books -->
                            <div class="col-xl-4 col-md-6 mb-4">
                              <div class="card shadow h-100 py-2 card2">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs text-success mb-1">Type of Books</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total['typeOfBooks'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-book fa-2x text-success"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of type of books -->

                            <!-- number of books -->
                            <div class="col-xl-4 col-md-6 mb-4">
                              <div class="card shadow h-100 py-2 card2">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs text-success mb-1">Number of Books</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total['numberOfBooks'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-book fa-2x text-success"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of number of books -->


                            <!-- total users staff -->
                            <div class="col-xl-4 col-md-6 mb-4">
                              <div class="card shadow h-100 py-2 card3">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs text-info mb-1">Users (Staff)</div>
                                      <div class="h5 mb-0 font-weight-bold text-info">{{ $total['userStaff'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-users fa-2x text-info"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of total users staff-->


                            
                            <!-- total users student-->
                            <div class="col-xl-4 col-md-6 mb-4">
                              <div class="card shadow h-100 py-2 card4">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs text-success mb-1">Users (Student)</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total['userStudent'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-users fa-2x text-success"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of total users student-->


                            
                            
                            <!-- total borrow books -->
                            <div class="col-xl-4 col-md-6 mb-4">
                              <div class="card shadow h-100 py-2 card5">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs text-danger  mb-1">Borrow Books</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total['borrow'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-shopping-cart fa-2x text-danger"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of total borrow books -->


                            <!-- return date over -->
                            <div class="col-xl-4 col-md-6 mb-4">
                              <div class="card shadow h-100 py-2 card5">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs text-danger mb-1">Return date over</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total['returnDateOver'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-shopping-cart fa-2x text-danger"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of return date over -->


                            
                            
                            
                            <!-- total return books -->
                            <div class="col-xl-4 col-md-6 mb-4">
                              <div class="card shadow h-100 py-2 card6">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs text-warning mb-1">Return books</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total['returned'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-exchange-alt fa-2x text-warning"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of total return books -->


                            <!-- payment (Overdue Fine) -->
                            <div class="col-xl-4 col-md-6 mb-4">
                              <div class="card shadow h-100 py-2 card6">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs text-info mb-1">Payment (Overdue fine)</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total['overDueFine'] }}</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-hand-holding-usd fa-2x text-info"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><!-- end of payment (Overdue Fine) -->


                          </div>
                      </div><!-- end of library overview content -->
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
