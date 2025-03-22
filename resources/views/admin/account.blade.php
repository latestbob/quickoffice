<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Admin - Account</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
  

    
    <style>
a:link{
    text-decoration:none;
}



.expensepara{
    color:black;
    font-size:14px;
}

.itemsss{
    color:black;
    font-size:14px;
    font-style:italic;
}
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.nav')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                               <!-- Nav Item - Alerts -->
                               <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">{{Auth::user()->unreadnotifications->count()}}</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    
                                </h6>

                                @foreach(auth::user()->unreadnotifications as $notify)
                                        
                                @if($notify->type=="App\Notifications\MeetingNotification")
                                        <a class="dropdown-item d-flex align-items-center" href="{{route('admin.schedule')}}">
                                    @elseif($notify->type=="App\Notifications\EventNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('admin.events')}}">

                                    @elseif($notify->type=="App\Notifications\DeclinedMeetingNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('admin.schedule')}}">

                                    @elseif($notify->type=="App\Notifications\SupervisedDeleted")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('admin.tasks')}}">
                                @endif   
                                    <div class="mr-3">
                                    @if($notify->type=="App\Notifications\MeetingNotification")
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>

                                        @elseif($notify->type=="App\Notifications\EventNotification")
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>

                                        @elseif($notify->type=="App\Notifications\DeclinedMeetingNotification")
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>

                                        @elseif($notify->type=="App\Notifications\SupervisedDeleted")
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                        @endif
                                    </div>
                                  
                                    <div>
                                        <div class="small text-gray-500">{{$notify->created_at->diffForHumans()}}</div>
                                        @if($notify->type=="App\Notifications\MeetingNotification")
                                        <span class="font-weight-bold">{{$notify['data']['data']}} by {{$notify['data']['createdby']}}, <br> starting: {{$notify['data']['start']}} </span>
                                        @elseif($notify->type=="App\Notifications\EventNotification")
                                        <span class="font-weight-bold">{{$notify['data']['data']}} by {{$notify['data']['createdby']}}, <br> starting: {{$notify['data']['start']}}, <br> till :{{$notify['data']['end']}} </span>    

                                        @elseif($notify->type=="App\Notifications\DeclinedMeetingNotification")
                                        <span class="font-weight-bold">{{$notify['data']['data']}}  {{$notify['data']['participant']}}, {{$notify['data']['was']}}</span> 


                                        @elseif($notify->type=="App\Notifications\SupervisedDeleted")
                                        <span class="font-weight-bold">{{$notify['data']['data']}}  {{$notify['data']['deletedby']}}, title : {{$notify['data']['title']}}</span> 
                                        @endif
                                    </div>
                                </a>

                                    
                                  @endforeach
                               
                                
                                <a class="dropdown-item text-center small text-gray-500" href="{{route('markasread')}}">Mark All as Read</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">{{\DB::table('messages')->where('to_id',Auth::user()->id)->where('seen','0')->count()}}</span>
                            </a>
                            <!-- Dropdown - Messages -->
                           
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('admin.profile.page')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{route('admin.setting.page')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item bg-danger text-light" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-light"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Accounts & Expenses</h1>
                        
                    </div>

     
                            @if(session('msg'))
                                <div class="alert alert-success text-center">
                                    <p>{{session('msg')}}</p>
                                </div>
                            @endif
                      
                            <!--Total expense and total payments received-->

                            <!-- Content Row -->
                     <div class="row">

<!-- Earnings (Monthly) Card Example -->
<!-- <div class="col-xl-6  text-light col-md-6 mb-4">
    <div class="card bg-danger  shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                      TOTAL EXPENSES MADE</div>
                    <div class="h5 mb-0 font-weight-bold text-ligh">


               

                    ₦ {{\App\Expense::where('office',Auth::user()->office)->sum('amount')}}
                    </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-money-bill-alt fa-lg"style=""></i>
                </div>
            </div>
        </div>
    </div>
</div> -->


<!-- Earnings (Monthly) Card Example -->
<!-- <div class="col-xl-6 col-md-6 mb-4">
    <div class="card bg-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">TOTAL PAYMENTS RECEIVED
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-light">
                            ₦ {{\App\Receivedpay::where('office',Auth::user()->office)->sum('amount')}}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-receipt fa-lg text-light"></i>
                </div>

                
            </div>
        </div>
    </div>
</div> -->


</div>




                        <hr class="text-dark">


                        <div class="card shadow expenses mb-4"id="expenses">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Expenses made</h6>
                        </div>
                       
                        <div class="card-body">
                            <!-- <div><a href="#received"class="btn-sm btn-secondary text-light font-weight-bold">Go to Received Payments</a></div>
                            <div class="text-right">
                                <button class="btn-sm btn-primary">Export to Excel</button>
                            </div> -->
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead style="color:white;font-size:14px;z-index:100;" class="bg-primary text-light">

                                    <tr>
                                   
                                        <th>Expense Type</th>
                                        <th>Business</th>
                                        <th>Date</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        <th>Request By</th>

                                        <!-- <th>Description</th> -->
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>

                                    </thead>

                                    
                                    <tbody style="color:black;font-size:13px;z-index:100;">
                                        @foreach($expense as $expenses)
                                                <tr>
                                                   
                                                    <td>{{$expenses->title}}</td>
                                                    <td>{{$expenses->category}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($expenses->date)->format('d/m/Y') }}</td>
                                                    <td>{{$expenses->currency}}</td>
                                                    <td>{{$expenses->total}}</td>
                                                    <td>{{$expenses->accountant}}</td>
                                                    <!-- <td>{{$expenses->description}}</td> -->
                                                    <td>
                                                    @if($expenses->status =='pending')

                                                            <p class="badge badge-warning badge-sm text-dark">pending</p>

                                                            @elseif($expenses->status =='approved')

                                                            <p class="badge badge-success badge-sm text-light">approved</p>

                                                            @else
                                                            <p class="badge badge-danger badge-sm text-light">rejected</p>
                                                            @endif
                                                    </td>

                                                    <td>

                                                    <form action="{{route('admin.remove.expenses')}}"method="POST">
                                                        @csrf
                                                        {{method_field('DELETE')}}

                                                        <input type="hidden"name="id"value="{{$expenses->id}}">
                                                    <a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{$expenses->id}}">
  View
</a>| <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModaltwo{{$expenses->id}}">Action</a>
                                                <!-- <button type="submit" class="btn btn-sm btn-danger">Delete</button>        -->

</td>

                                                    </form>

                                                </tr>

                                                <!-- status modal -->

                                                <div class="modal fade" id="exampleModaltwo{{$expenses->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-size:17px; font-weight:600;color:black;" class="modal-title" id="exampleModalLabel">Update status  of {{$expenses->title}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            <form action="{{route('admin.account.expenses')}}"method="POST">
                                                                @csrf

                                                                {{method_field('PUT')}}


                                                                <div class="form-group">
                                                                    <label for="">Status Type</label>

                                                                    <select name="status"class="form-control" id=""required>
                                                                        <option value="approved">Approve</option>
                                                                        <option value="disapproved">Reject</option>
                                                                    </select>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="">Comments (optional)</label>

                                                                    <textarea name="comments" id=""class="form-control" cols="30" rows="5">

                                                                    </textarea>
                                                                </div>

                                                                <input type="hidden"name="id"value="{{$expenses->id}}">


                                                                <button type="submit"class="btn btn-success text-light">Update Status</button>
                                                            </form>

                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                                    </div>


                                                <!-- end of status modal -->


                                                <div class="modal fade" id="exampleModal{{$expenses->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-size:17px; font-weight:600;color:black;" class="modal-title" id="exampleModalLabel">{{$expenses->title}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p class="expensepara">Title : {{$expenses->title}}</p>
                                                        <p class="expensepara">Category : {{$expenses->category}}</p>
                                                        <p  class="expensepara">Date : {{$expenses->date}}</p>

                                                        <p  class="expensepara">Total Amount : {{$expenses->total}}</p>
                                                        <p  class="expensepara">Description  <br> {{$expenses->description}}</p>

                                                        <hr>
                                                        <p  class="expensepara">Items </p> 

                                                        
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p class="font-weight-bold itemsss">Items name/title</p>
                                                            </div>

                                                            <div class="col">
                                                            <p class="font-weight-bold itemsss">Quantity</p>
                                                            </div>

                                                            <div class="col">
                                                                 <p class="font-weight-bold itemsss">Unit Price</p>
                                                            </div>

                                                            <div class="col">
                                                            <p class="font-weight-bold itemsss">Total</p>
                                                            </div>
                                                        </div>

                                                        @foreach(json_decode($expenses->items) as $items)
                                                        <div class="row">
                                                            <div class="col-md-3 itemsss">
                                                                {{$items->inputed_item_name}}
                                                            </div>

                                                            <div class="col itemsss">
                                                            {{$items->inputed_unit_price}}
                                                            </div>

                                                            <div class="col itemsss">
                                                            {{$items->inputed_item_quantity}}
                                                            </div>


                                                            <div class="col itemsss">
                                                            {{$items->inputed_total_price}}
                                                            </div>
                                                            </div>

                                                        @endforeach



                                                        <hr>

                                                        <p class="expensepara">Status : {{$expenses->status}}</p>


                                                        <p class="expensepara">Action By : {{$expenses->approved_by}}</p>


                                                        <p class="expensepara">Comments <br>

                                                        {{$expenses->comments == null ? 'none' : $expenses->comments}}
                                                    </p>



                                                     


                                                        
                                                           
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>

                                                
                                        @endforeach
                                       
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>

                
                  
                


                    





                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                    <form action="{{route('logout')}}"method="POST">
                        @csrf 
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

















  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>





</body>

</html>