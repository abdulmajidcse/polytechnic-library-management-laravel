<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      @yield('title', 'KPI Library')
    </title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--bootstrap css link-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
     <!--fontawesome css link-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.css ')}}">
    <!--w3 css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/w3.css') }}">
    <!--toaster alert css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
    <!--sweet alert css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
    <!--custom css link-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">

    <!--brand icon-->
    <link rel="shortcut icon" type="image/ico" href="{{ asset('images/brand.ico')}}">
 
</head>
<body>
    <div id="app">
        
        <!-- Authentication Links -->
        @guest

            <!--header-->
            <header>
                <div class="container-fluid login text-center p-3">
                    <a class="navbar-brand text-light font-weight-bold" href="{{ url('/') }}">
                    <i class="fas fa-book-reader h4"></i>
                    <span>{{ __('KPI Library') }}</span>
                  </a>
                </div>
            </header><!--end of header-->

        @else

            <!--main navbar-->
            <nav class="navbar navbar-expand-lg p-lg-0 p-2 sticky-top mainnavbar">
              <div class="container-fluid p-2">
                  <a class="navbar-brand text-light font-weight-bold" href="{{ url('/') }}">
                    <i class="fas fa-book-reader h4"></i>
                    <span>{{ __('KPI Library') }}</span>
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-light"><i class="fas fa-bars"></i> Menu</span>
                  </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mainnavul">
                      <!--dropdown link-->
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-plus-square"></i> Add New
                        </a>
                        <!--dropdown menu-->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ URL::to('/user/student/add') }}"><i class="fas fa-users"></i> User</a>
                          <a class="dropdown-item" href="{{ URL::to('/book/add') }}"><i class="fas fa-book-open"></i> Book</a>
                          <a class="dropdown-item" href="{{ URL::to('/category/add') }}"><i class="fas fa-th"></i> Category</a>
                        </div><!--end of dropdown menu-->
                       </li>
                       <!--dropdown link-->
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-tasks"></i> Manage
                        </a>
                        <!--dropdown menu-->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ URL::to('/borrow/book') }}"><i class="fas fa-shopping-cart"></i> Borrow a Book</a>
                          <a class="dropdown-item" href="{{ url('/borrow/book/all') }}"><i class="fas fa-exchange-alt"></i> Return a Book</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ URL::to('/overude_fine/list') }}"><i class="fas fa-hand-holding-usd"></i> Overdue Fine</a>
                          <a class="dropdown-item" href="{{ url('/payment-list/all') }}"><i class="fas fa-gift"></i> Payment List</a>
                        </div><!--end of dropdown menu-->
                       </li>
                       <!--dropdown link-->
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-info-circle"></i> Report
                        </a>
                        <!--dropdown menu-->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ URL::to('/user/student/all') }}"><i class="fas fa-users"></i> Users</a>
                          <a class="dropdown-item" href="{{ URL::to('/book/all') }}"><i class="fas fa-book-open"></i> Books</a>
                          <a class="dropdown-item" href="{{ URL::to('/category/all') }}"><i class="fas fa-th"></i> Categories</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ url('/borrow/book/all') }}"><i class="fas fa-shopping-cart"></i> Borrowed Books</a>
                          <a class="dropdown-item" href="{{ URL::to('/return/book/all') }}"><i class="fas fa-exchange-alt"></i> Returned Books</a>
                        </div><!--end of dropdown menu-->
                       </li>
                      <!--dropdown link-->
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <!-- <i class="fas fa-user"></i> --> 
                         @if(Auth::user()->image != "")
                                            <img src="{{ URL::to(Auth::user()->image) }}" class="rounded-circle" height="25px">
                                        @else
                                            <i class="fas fa-user"></i>
                                        @endif
                          {{ Auth::user()->name }}
                        </a>
                        <!--dropdown menu-->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ url('/password/change') }}">
                            <i class="fas fa-unlock-alt"></i> 
                            {{ __('Password Change') }}
                          </a>
                          <a class="dropdown-item" href="{{ url('/profile') }}"><i class="far fa-address-card"></i> Profile</a>
                          <a class="dropdown-item" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                          </form>
                        </div><!--end of dropdown menu-->
                       </li>
                    </ul>
                </div>
              </div>
            </nav><!--end of main navbar-->

        @endguest
        <!-- end of Authentication Links -->