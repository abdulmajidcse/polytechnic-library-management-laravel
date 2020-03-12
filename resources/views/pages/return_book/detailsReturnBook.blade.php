@extends('layouts.app')

@section('title')
  {{ "Return Book Details" }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="contentWrapper">
                <div class="card">
                    <div class="card-header text-info">Return book details ({{ $returned->libraryUser->name }})<span class="btn btn-sm btn-primary ml-1" style="cursor: pointer;" onclick="printContent('printDoc')">Print</span></div>

                    <div class="card-body">
                        <!--return book details table-->
                        <table class="table table-hover table-striped table-bordered table-responsive-lg">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        @if($returned->libraryUser->image != "")
                                            <img src="{{ URL::to($returned->libraryUser->image) }}" title="{{ $returned->libraryUser->name }}" id="imgmodal" onclick="document.getElementById('modal01').style.display='block'" style="height:80px;cursor:zoom-in" class="rounded">
                                        @else
                                            <i class="fas fa-user h1 text-muted"></i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $returned->libraryUser->name }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile number</th>
                                    <td>{{ $returned->libraryUser->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Technology</th>
                                    <td>{{ $returned->libraryUser->technology }}</td>
                                </tr>
                                @if($returned->libraryUser->person == 'student')
                                <tr>
                                    <th>Session</th>
                                    <td>{{ $returned->libraryUser->session }}</td>
                                </tr>
                                <tr>
                                    <th>Shift</th>
                                    <td>{{ $returned->libraryUser->shift }}</td>
                                </tr>
                                <tr>
                                    <th>Roll number</th>
                                    <td>{{ $returned->libraryUser->roll_no }}</td>
                                </tr>
                                <tr>
                                    <th>Registration number</th>
                                    <td>{{ $returned->libraryUser->reg_no }}</td>
                                </tr>
                                <tr>
                                    <th>Library card number</th>
                                    <td>{{ $returned->libraryUser->library_card_no }}</td>
                                </tr>
                                @else
                                <tr>
                                    <th>PIMS number</th>
                                    <td>{{ $returned->libraryUser->pims_no }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Book category</th>
                                    <td>{{ $returned->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Book name</th>
                                    <td>{{ $returned->book->name }}</td>
                                </tr>
                                <tr>
                                    <th>Borrow date</th>
                                    <td>{{ $returned->borrow_date }}</td>
                                </tr>
                                <tr>
                                    <th>Return date</th>
                                    <td>{{ $returned->return_date }}</td>
                                </tr>
                                <tr>
                                    <th>Returned date</th>
                                    <td>{{ $returned->returned_date }}</td>
                                </tr>
                                <tr>
                                    <th>Overdue fine</th>
                                    <td>{{ $returned->over_due_fine }} tk</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><span class="text-success font-weight-bold"><em>Returned</em></span></td>
                                </tr>
                            </tbody>
                        </table><!--end of return book details table-->
                    </div>
                </div>
                <!--print document section-->
                <div id="printDoc" class="card d-none">
                    <div class="card-header">
                        <p class="h4 text-center font-weight-bold">Kurigram Polytechnic Institute, Kurigram</p>
                        <p class="text-center">Library Management-{{ date('Y') }}</p>
                        <span class="text-info">Return book details ({{ $returned->libraryUser->name }})</span>
                        </div>

                    <div class="card-body">
                        <!--return book details table-->
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        @if($returned->libraryUser->image != "")
                                            <img src="{{ URL::to($returned->libraryUser->image) }}" alt="{{ $returned->libraryUser->name }}" class="rounded" style="height: 70px">
                                        @else
                                            <i class="fas fa-user h1 text-muted"></i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $returned->libraryUser->name }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile number</th>
                                    <td>{{ $returned->libraryUser->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Technology</th>
                                    <td>{{ $returned->libraryUser->technology }}</td>
                                </tr>
                                @if($returned->libraryUser->person == 'student')
                                <tr>
                                    <th>Session</th>
                                    <td>{{ $returned->libraryUser->session }}</td>
                                </tr>
                                <tr>
                                    <th>Shift</th>
                                    <td>{{ $returned->libraryUser->shift }}</td>
                                </tr>
                                <tr>
                                    <th>Roll number</th>
                                    <td>{{ $returned->libraryUser->roll_no }}</td>
                                </tr>
                                <tr>
                                    <th>Registration number</th>
                                    <td>{{ $returned->libraryUser->reg_no }}</td>
                                </tr>
                                <tr>
                                    <th>Library card number</th>
                                    <td>{{ $returned->libraryUser->library_card_no }}</td>
                                </tr>
                                @else
                                <tr>
                                    <th>PIMS number</th>
                                    <td>{{ $returned->libraryUser->pims_no }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Book category</th>
                                    <td>{{ $returned->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Book name</th>
                                    <td>{{ $returned->book->name }}</td>
                                </tr>
                                <tr>
                                    <th>Borrow date</th>
                                    <td>{{ $returned->borrow_date }}</td>
                                </tr>
                                <tr>
                                    <th>Return date</th>
                                    <td>{{ $returned->return_date }}</td>
                                </tr>
                                <tr>
                                    <th>Returned date</th>
                                    <td>{{ $returned->returned_date }}</td>
                                </tr>
                                <tr>
                                    <th>Overdue fine</th>
                                    <td>{{ $returned->over_due_fine }} tk</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><span class="text-success font-weight-bold"><em>Returned</em></span></td>
                                </tr>
                            </tbody>
                        </table><!--end of return book details table-->
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
