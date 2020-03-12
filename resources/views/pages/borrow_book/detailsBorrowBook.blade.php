@extends('layouts.app')

@section('title')
  {{ "Borrow Book Details" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Borrow book details ({{ $borrow->libraryUser->name }})<span class="btn btn-sm btn-primary ml-1" style="cursor: pointer;" onclick="printContent('printDoc')">Print</span></div>

                    <div class="card-body">
                        <!--borrow book details table-->
                        <table class="table table-hover table-striped table-bordered table-responsive-lg">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        @if($borrow->libraryUser->image != "")
                                            <img src="{{ URL::to($borrow->libraryUser->image) }}" title="{{ $borrow->libraryUser->name }}" id="imgmodal" onclick="document.getElementById('modal01').style.display='block'" style="height:80px;cursor:zoom-in" class="rounded">
                                        @else
                                            <i class="fas fa-user h1 text-muted"></i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $borrow->libraryUser->name }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile number</th>
                                    <td>{{ $borrow->libraryUser->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Technology</th>
                                    <td>{{ $borrow->libraryUser->technology }}</td>
                                </tr>
                                @if($borrow->libraryUser->person == 'student')
                                <tr>
                                    <th>Session</th>
                                    <td>{{ $borrow->libraryUser->session }}</td>
                                </tr>
                                <tr>
                                    <th>Shift</th>
                                    <td>{{ $borrow->libraryUser->shift }}</td>
                                </tr>
                                <tr>
                                    <th>Roll number</th>
                                    <td>{{ $borrow->libraryUser->roll_no }}</td>
                                </tr>
                                <tr>
                                    <th>Registration number</th>
                                    <td>{{ $borrow->libraryUser->reg_no }}</td>
                                </tr>
                                <tr>
                                    <th>Library card number</th>
                                    <td>{{ $borrow->libraryUser->library_card_no }}</td>
                                </tr>
                                @else
                                <tr>
                                    <th>PIMS number</th>
                                    <td>{{ $borrow->libraryUser->pims_no }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Book category</th>
                                    <td>{{ $borrow->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Book name</th>
                                    <td>{{ $borrow->book->name }}</td>
                                </tr>
                                <tr>
                                    <th>Borrow date</th>
                                    <td>{{ $borrow->borrow_date }}</td>
                                </tr>
                                <tr>
                                    <th>Return date</th>
                                    <td>{{ $borrow->return_date }}</td>
                                </tr>
                                <tr>
                                    <th>Overdue fine</th>
                                    <td>
                                        @php
                                            $todaytime = strtotime(date('Y-m-d'));
                                            $returndaytime = strtotime($borrow->return_date);
                                        @endphp
                                        @if($todaytime > $returndaytime)
                                        @php
                                          $time = $todaytime - $returndaytime;
                                          $timediv = $time / 86400;
                                          $timeint = (int)$timediv;
                                          $fine = 10 * $timeint;
                                          @endphp
                                          {{ $fine }} <span> tk</span>
                                        @else
                                        {{ $borrow->over_due_fine }} <span> tk</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><span class="text-danger font-weight-bold"><em>Not return</em></span></td>
                                </tr>
                            </tbody>
                        </table><!--end of borrow book details table-->
                    </div>
                </div>
                <!--print document section-->
                <div id="printDoc" class="card d-none">
                    <div class="card-header">
                        <p class="h4 text-center font-weight-bold">Kurigram Polytechnic Institute, Kurigram</p>
                        <p class="text-center">Library Management-{{ date('Y') }}</p>
                        <span class="text-info">Borrow book details ({{ $borrow->libraryUser->name }})</span>
                        </div>

                    <div class="card-body">
                        <!--borrow book details table-->
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        @if($borrow->libraryUser->image != "")
                                            <img src="{{ URL::to($borrow->libraryUser->image) }}" alt="{{ $borrow->libraryUser->name }}" class="rounded" style="height: 70px">
                                        @else
                                            <i class="fas fa-user h1 text-muted"></i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $borrow->libraryUser->name }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile number</th>
                                    <td>{{ $borrow->libraryUser->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Technology</th>
                                    <td>{{ $borrow->libraryUser->technology }}</td>
                                </tr>
                                @if($borrow->libraryUser->person == 'student')
                                <tr>
                                    <th>Session</th>
                                    <td>{{ $borrow->libraryUser->session }}</td>
                                </tr>
                                <tr>
                                    <th>Shift</th>
                                    <td>{{ $borrow->libraryUser->shift }}</td>
                                </tr>
                                <tr>
                                    <th>Roll number</th>
                                    <td>{{ $borrow->libraryUser->roll_no }}</td>
                                </tr>
                                <tr>
                                    <th>Registration number</th>
                                    <td>{{ $borrow->libraryUser->reg_no }}</td>
                                </tr>
                                <tr>
                                    <th>Library card number</th>
                                    <td>{{ $borrow->libraryUser->library_card_no }}</td>
                                </tr>
                                @else
                                <tr>
                                    <th>PIMS number</th>
                                    <td>{{ $borrow->libraryUser->pims_no }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Book category</th>
                                    <td>{{ $borrow->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Book name</th>
                                    <td>{{ $borrow->book->name }}</td>
                                </tr>
                                <tr>
                                    <th>Borrow date</th>
                                    <td>{{ $borrow->borrow_date }}</td>
                                </tr>
                                <tr>
                                    <th>Return date</th>
                                    <td>{{ $borrow->return_date }}</td>
                                </tr>
                                <tr>
                                    <th>Overdue fine</th>
                                    <td>
                                        @php
                                            $todaytime = strtotime(date('Y-m-d'));
                                            $returndaytime = strtotime($borrow->return_date);
                                        @endphp
                                        @if($todaytime > $returndaytime)
                                        @php
                                          $time = $todaytime - $returndaytime;
                                          $timediv = $time / 86400;
                                          $timeint = (int)$timediv;
                                          $fine = 10 * $timeint;
                                          @endphp
                                          {{ $fine }} <span> tk</span>
                                        @else
                                        {{ $borrow->over_due_fine }} <span> tk</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><span class="text-danger font-weight-bold"><em>Not return</em></span></td>
                                </tr>
                            </tbody>
                        </table><!--end of borrow book details table-->
                    </div>
                    <div class="row mt-5">
                        <div class="col-6">
                            <p class="ml-2 p-4 font-weight-bold"><u>Borrower's signature</u></p>
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
