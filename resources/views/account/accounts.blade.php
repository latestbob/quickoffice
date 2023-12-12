<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Account - Account</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" />
  
  <style>
        a:link{
            text-decoration:none;
        }
  </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               
                <div class="sidebar-brand-text mx-3 font-weight-bolder">{{Auth::user()->office}} 
                    <br>
                    <h6 class="text-center">Accountant</h6>
                </div>
            </a>

                <!-- Divider -->
            <hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item ">
 <a class="nav-link" href="{{route('account.home')}}">
     <i class="fas fa-fw fa-tachometer-alt"></i>
     <span>Dashboard</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Schedule -->

<li class="nav-item">
 <a class="nav-link" href="{{route('account.schedule')}}">
     <i class="fas fa-fw  fa-clock"></i>
     <span>Schedule</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Task -->

<li class="nav-item">
 <a class="nav-link" href="{{route('account.tasks')}}">
     <i class="fas fa-fw  fa-tasks"></i>
     <span>Tasks+</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Account -->

<li class="nav-item active">
<a class="nav-link" href="{{route('account.accounts')}}">
<i class="fas fa-money-check"></i>
<span>Account</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Jobs-->

<li class="nav-item">
 <a class="nav-link" href="{{route('account.jobs')}}">
     <i class="fas fa-fw  fa-briefcase"></i>
     <span>Jobs+</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">

   <!-- Nav Item - Message -->

<li class="nav-item ">
 <a class="nav-link" href="/chatify">
     <i class="fas fa-fw  fa-envelope"></i>
     <span>Message</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


   <!-- Nav Item - Report -->

<li class="nav-item">
 <a class="nav-link" href="{{route('account.reports')}}">
     <i class="fas fa-fw  fa-file "></i>
     <span>Report</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


  <!-- Nav Item - Clients -->
<li class="nav-item">
 <a class="nav-link" href="{{route('account.clients')}}">
 <i class="fas fa-handshake"></i>
     <span>Client</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


  <!-- Nav Item - Calender -->
  <li class="nav-item">
 <a class="nav-link" href="{{route('account.events')}}">
 <i class="fas fa-calendar"></i>
     <span>Events</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

 <!-- Nav Item - Leave  -->
 <li class="nav-item">
                <a id="step-eight"class="nav-link" href="{{route('leavepage')}}">
                <i class="fas fa-calendar"></i>
                    <span>Leave Management</span></a>
            </li>


            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
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
                                        <a class="dropdown-item d-flex align-items-center" href="{{route('account.schedule')}}">
                                    @elseif($notify->type=="App\Notifications\EventNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('account.events')}}">

                                    @elseif($notify->type=="App\Notifications\DeclinedMeetingNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('account.schedule')}}">
                                    @elseif($notify->type=="App\Notifications\SendTask")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('account.tasks')}}">

                                    @elseif($notify->type=="App\Notifications\SupervisedDeleted")
                                    <a class="dropdown-item d-flex align-items-center" href="">
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
                                        @elseif($notify->type=="App\Notifications\SendTask")
                                        <span class="font-weight-bold">{{$notify['data']['data']}}  {{$notify['data']['createdby']}}, <br>  title : {{$notify['data']['title']}}</span> 

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
                                <a class="dropdown-item" href="{{route('account.profile.page')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{route('account.setting.page')}}">
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
                        <h1 class="h3 mb-0 text-gray-800">Account</h1>
                        
                    </div>

     
                            @if(session('msg'))
                                <div class="alert alert-success text-center">
                                    <p>{{session('msg')}}</p>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger text-center">
                                    <p>{{session('error')}}</p>
                                </div>
                            @endif

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Quick Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item bg-danger text-light font-weight-bold viewmodal" href="#"data-toggle="modal" data-target="#viewModal">Add Expense</a>
                                    <a class="viewmodal dropdown-item bg-success text-light font-weight-bold" href="#"data-toggle="modal" data-target="#receiveModal">Add Income</a>
                                    <a class="dropdown-item bg-secondary text-light font-weight-bold" href="{{route('account.invoice')}}">Create Invoice</a>
                                    <a class="dropdown-item bg-primary text-light font-weight-bold" href="{{route('account.export.income.statement')}}">Income Statement</a>
                                    <a class="dropdown-item bg-warning text-dark font-weight-bold" href="{{route('account.expenses.statement')}}">This Month Expenses</a>
                                    <a class="dropdown-item bg-info text-light font-weight-bold" href="{{route('account.incomestatement')}}">This Month Incomes</a>
                                </div>
                                </div>
                         
                        <hr class="text-dark">
                        
                        
                                
                        

                        <div class="card shadow expenses mb-4"id="expenses">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Expenses made</h6>
                        </div>
                       
                       <!--
                        <div class="form-inline ">
                           
                           <div class="form-group mx-sm-3 mb-2">
                               <label for="2" class="">From</label>
                               <input name="from"type="date" class="col-m-12 form-control from" id="inputPassword2" placeholder="Sort Month"required>
                           </div>

                           <div class="form-group mx-sm-3 mb-2">
                               <label for="inputPassword2" class="">To</label>
                               <input name="to"type="date" class="form-control to" id="inputPassword2" placeholder="Sort Month"required>
                           </div>
                           <button type="submit" class="filterbtn btn-sm btn btn-danger mb-2">Filter</button> <button type="submit" class="ml-4 refreshbtn btn-sm btn btn-secondary mb-2">Refresh</button> 
                           </div>
                    -->

                    <div class="row">
                        <div class="col-md-5 m-auto col-6">
                                <label for="2" class="">From</label>
                               <input name="from"type="date" class="col-m-12 form-control from" id="inputPassword2" placeholder="Sort Month"required>
                        </div>

                        <div class=" col-md-5 m-auto col-6">
                        <label for="inputPassword2" class="">To</label>
                               <input name="to"type="date" class="form-control to" id="inputPassword2" placeholder="Sort Month"required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 m-auto col-6">
                            <button type="submit" class="filterbtn btn w-100 btn-sm btn btn-danger mb-2">Filter</button>
                        </div>

                        <div class="col-md-5 m-auto col-6">
                            <button type="submit" class="refreshbtn btn w-100 btn-sm btn btn-secondary mb-2">Refresh</button> 
                        </div>
                    </div>
                        
                        <div class="card-body">
                            
                            <div class="text-right">
                          
                                
                            </div>
                            <div class="table-responsive">
                            
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Amount in Naira (₦)</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Accounted by</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                 
                                    <tbody class="thetablebody output"></tbody> 
                                    
                                </table>
                                
                            </div>
                            <div><a href="#received"class="btn-sm btn-secondary text-light font-weight-bold">Go to Received Payments</a></div>
                        </div>
                    </div>

                
                   
                


                    <section class="paymentreceived"id="paymentreceived">
                    

                    </section>






                    </div>
                <!-- /.container-fluid -->

            </div>
         
                    <div class="card shadow mb-4"id="received">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Received Payments</h6>
                        </div>


                        <div class="row">
                        <div class="col-md-5 m-auto col-6">
                                <label for="2" class="">From</label>
                                <input type="date" class="form-control from1" id="inputPassword2" placeholder="Sort Month">
                        </div>

                        <div class=" col-md-5 m-auto col-6">
                                <label for="inputPassword2" class="">To</label>
                                <input type="date" class="form-control to1" id="inputPassword2" placeholder="Sort Month">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 m-auto col-6">
                        <button  class="filterbtn1 btn-sm btn btn-success mb-2 w-100">Filter</button>
                        </div>

                        <div class="col-md-5 m-auto col-6">
                        <button  class="refreshbtn1  btn-sm btn btn-secondary mb-2 w-100">Refresh</button>
                        </div>
                    </div>

















                        <div class="card-body">
                     
                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Amount in Naira (₦)</th>
                                            <th>Client/Other Source</th>
                                            <th>Job /Source</th>
                                            <th>Accounted by</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="thetablebody1 output1"></tbody> 

                                   
                                </table>
                            </div>
                            <div><a href="#expenses"class="btn-sm btn-secondary text-light font-weight-bold">Go to Expenses</a></div>
                        </div>
                    </div>



                  



            

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <a href="https://quickoffice.online">QuickOffice</a> 2020</span>
                        <span>Developed by <a href="https://wallsandgates.com.ng">WallsandGates Limited</a></span>
                    </div>
                </div>
            </footer>
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









       <!-- ADD EXPENSES MODEL-->
       <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Add Expenses
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

               
                                       

                                       

                                        <form action="{{route('account.addexpense')}}"method="POST">
                                        @csrf


                                        <div class="form-group">
                                            <label for="title">Expenses Title</label>
                                            <input type="text"name="title"placeholder="Enter Expenses Title"class="form-control"required>
                                        </div>


                                       
                                        
                                            

                                            <!-- Here opted --> 
                                            <div class="form-group row">
                                        <div class="col-md-6">
                                        <label for="start">Category</label>
                                            <select name="category" id=""class="form-control addexpensecategories">4
                                            <option value="">Select Category</option>
                                                <option value="Administrative Expenses">Administrative Expenses</option>

                                         
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                        <label for="start">Add Category(If it doesn't exist)</label><br>
                                        <a href="#"data-id=""class="text-info font-weight-bold addcategory "data-toggle="modal" data-target="#addcategoryModal">Add Category</a>
                                        </div>

                                        
                                            
                                    </div>

                                            <!-- Here opted here --> 
                                    
                

                                        


                                        
                                            

                                            
                                      
                                        
                                        
                                        <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="start">Date made</label>
                                            <input type="date"name="date"placeholder="Enter date made"class="form-control"required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="start">₦ Amount Paid</label>
                                                <input type="number"name="amount"placeholder="Enter Amount in Naira"class="form-control"required>
                                        </div>

                                        
                                            
                                    </div>

                                   


                               

                                  
                                
                                    


                                    <hr>
                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <textarea name="description" id=""placeholder="Description of Expenses"class="form-control" cols="10" rows="5"required></textarea>
                                    </div>

                                </div>

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Add Expenses</button>
                                    </div>
                              
                                    </form>
                   
                        
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>



       <!-- Vie modal for add received payment Branch Modal-->
       <div class="modal fade" id="receiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Add Income
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('account.received.pay.post')}}"method="POST">

                                        @csrf

                                        <div class="form-group">
                                            <label for="title">Payment Title</label>
                                            <input type="text"name="title"placeholder="Enter Payment Title"class="form-control"required>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="start">Date Received</label>
                                            <input type="date"name="date"placeholder="Enter date payment was received"class="form-control"required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="start">₦ Amount Paid</label>
                                                <input type="number"name="amount"placeholder="Enter Amount in Naira"class="form-control"required>
                                        </div>    
                                    </div>

                                        <h5 class="text-center bg-secondary rounded text-light py-1">Income Sources</h5>
                                    <div class="form-group">
                                       <label for="client">Payment made by</label>
                                       <select onchange="getJob()"name="client" id=""class="client form-control">
                                            <option value="">Select from Client</option>
                                                @foreach($client as $clients)
                                                    <option value="{{$clients->name}}">{{$clients->name}}</option>

                                                @endforeach
                                       </select>
                                    </div>

                                    <div class="form-gorup">
                                        <label for="job">Jobs - <span>  <a href="#"data-id=""class="text-info font-weight-bold createjob "data-toggle="modal" data-target="#createjobModal">Create New Job</a></span></label>
                                        <select name="job" id=""class="job form-control">
                                            <option value="">Choose from Jobs</option>
                                        </select>
                                    </div>
                

                                    <hr>

                                    <div class="form-group">
                                        <label for="source">Other Source</label>
                                        <input type="text"name="source"class="form-control"placeholder="Enter Other Source">
                                    </div>
                               

                               <h5 class="text-center bg-secondary rounded">Income Source</h5>

                                  
                                
                                    


                                    <hr>
                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <textarea name="description" id=""placeholder="Description of Payment"class="form-control" cols="10" rows="5"required></textarea>
                                    </div>

                                </div>

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Add Income</button>
                                    </div>
                              
                                    </form>
                   
                        
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>




     <!-- Edit EXPENSE MODAL-->
     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Edit Expenses
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('account.edit.post')}}"method="POST">
                                        @csrf
                                        {{method_field('PUT')}}
                                          
                                          <input type="hidden"name="id"class="form-control expense_id">
                                        <div class="form-group">
                                            <label for="title">Expenses Title</label>
                                            <input type="text"name="title"placeholder="Enter Expenses Title"class="expense_title form-control"required>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="start">Date made</label>
                                            <input type="date"name="date"placeholder="Enter date made"class="expense_date form-control"required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="start">₦ Amount Paid</label>
                                                <input type="number"name="amount"placeholder="Enter Amount in Naira"class="expense_amount form-control"required>
                                        </div>

                                        
                                            
                                    </div>

                                   


                               

                                  
                                
                                    


                                    <hr>
                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <textarea name="description" id=""placeholder="Description of Expenses"class="form-control expense_description" cols="10" rows="5"required></textarea>
                                    </div>

                                </div>

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Update</button>
                                    </div>
                              
                                    </form>
                   
                        
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>


        <!-- Delete Expense Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this Expense?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Confirm you want to delete  <span class="expense_title_delete"></span></div>
                <form action="{{route('account.delete.expenses')}}"method="POST">
                        @csrf 
                        {{method_field('DELETE')}}

                        <input type="hidden"name="id"class="expense_id_delete form-control">
                        <button class="btn btn-danger">Delete Expense</button>
                    </form>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                  
                </div>
            </div>
        </div>
    </div>




<!--ALL RECEIVED PAY MODAL -->

<!--edit received payment -->
<div class="modal fade" id="editreceivedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                     Edit Payment Details
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('account.received.edit.pay.put')}}"method="POST">
                                        @csrf
                                        {{method_field('PUT')}}

                                        <input name="id"type="hidden"class="form-control received_id">
                                        <div class="form-group">
                                            <label for="title">Payment Title</label>
                                            <input type="text"name="title"placeholder="Enter Payment Title"class="received_title form-control"required>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="start">Date Received</label>
                                            <input type="date"name="date"placeholder="Enter date payment was received"class="received_date form-control"required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="start">₦ Amount Paid</label>
                                                <input type="number"name="amount"placeholder="Enter Amount in Naira"class="received_amount form-control"required>
                                        </div>    
                                    </div>

                                   
                                   


                               

                                  
                                
                                    


                                    <hr>
                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <textarea name="description" id=""placeholder="Description of Payment"class="received_description form-control" cols="10" rows="5"required></textarea>
                                    </div>

                                </div>

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Update Payment Details</button>
                                    </div>
                              
                                    </form>
                   
                        
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>


 
        <!-- Delete Received payments Modal-->
        <div class="modal fade" id="deletereceivedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this received payment?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Confirm you want to delete payment details for  <span class="received_title_delete"></span></div>
                <form action="{{route('account.received.delete.deleterequest')}}"method="POST">
                        @csrf 
                        {{method_field('DELETE')}}

                        <input type="hidden"name="id"class="received_id_delete form-control">
                        <button class="btn btn-danger">Delete Income</button>
                    </form>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                  
                </div>
            </div>
        </div>
    </div>







     <!-- Add Category MODAL-->
     <div class="modal fade" id="addcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content"style="background:#4e73df;">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="exampleModalLabel">
                     Add Category
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="/account/expense/category"method="POST"class="formaddcategory">
                                        @csrf
                                    
                                          
                                        
                                        <div class="form-group">
                                            <label for="title"class="text-light">Add Category</label>
                                            <input type="text"name="title"placeholder="Enter Category Name"class="form-control"required>
                                        </div>
                                      
                                    
                                   

                                    <div class="form-group">
                                        <button class="text-center btn btn-success submitaddcategory">Add Category</button>
                                    </div>
                              
                                    </form>
                   
                        
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>


   

   <!--Create Job Modal -->  

      
     <div class="modal fade text-light" id="createjobModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content"style="background:#4e73df;">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="exampleModalLabel">
                    Create A new Job
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="/account/job/create"method="POST"class="theformcreatejob">
                @csrf 

                            <div class="form-group">
                            <label for="title">Job Title</label>
                            <input type="text"name="title"placeholder="Enter Job Title"class="form-control"required>
                            </div>

                            <div class="form-group">
                            <label for="client">Clients</label>
                            <select name="client" id="client"class="form-control"required>
                            <option value="">Select from Clients</option>

                            @foreach($client as $clients)

                            <option value="{{$clients->name}}">{{$clients->name}}</option>
                            @endforeach

                            </select>
                            </div>

                            <div class="form-group">
                            <label for="description">Description</label>

                            <textarea name="description" id="" cols="10" rows="5"class="form-control description"required></textarea>
                            </div>

                            <div class="form-group">
                            <label for="amount">₦ Amount (Optional)</label>
                            <input type="integer"name="amount"placeholder="Enter Amount"class="form-control">
                            </div>

                            <div class="form-group">
                            <button class="btn btn-success text-light text-center">Add Job</button>
                            </div>
                              
                                    </form>
                   
                        
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>




   <!--End of Create Job Modal --> 


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

<script >
        function getTask(url , id){
            let task_title, task_start, task_end, task_category, task_client, task_description
            task_title= document.querySelector('.task_title')
            task_start = document.querySelector('.task_start')
            task_end = document.querySelector('.task_end')
            task_category = document.querySelector('.task_category')
            task_client = document.querySelector('.task_client')
            task_description = document.querySelector('.task_description')
          

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    task_title.innerText  = data.title
                    task_start.innerText  = data.start
                    task_end.innerText  = data.end
                    task_category.innerText  = data.category
                    task_client.innerText =data.client
                    task_description.innerText  = data.description
                    
                   
                })
                .catch(function(err){
                    console.log(err)
                })
        } catch (error) {
        console.error(error)
    }
}


    function showId(e){
        let _id = e.target.dataset.id
        getTask('/account/tasks/', _id)

    }

    try {
        let viewModalBtns  = document.querySelectorAll('.viewmodal');

viewModalBtns.forEach(function(viewModalBtn){
    viewModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
    </script>




<script >
//edit expenses script
        function editExpense(url , id){
            let expense_title, expense_date, expense_amount, expense_description, expense_id
            
          
            expense_title=document.querySelector('.expense_title');
            expense_date=document.querySelector('.expense_date');
            expense_amount=document.querySelector('.expense_amount');
            expense_description=document.querySelector('.expense_description');
            expense_id=document.querySelector('.expense_id');

//
               try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    console.log(data)
                    expense_title.value =data.title
                    expense_date.value  = data.date
                    expense_amount.value =data.amount
                    expense_description.value =data.description
                   expense_id.value=data.id
                })
               } catch (error) {
                   console.log(error)
               }
                   
}


  

    // try {
        let output  = document.querySelector('.output');
        output.addEventListener('click' , function(e){e.target.classList.contains('editmodal') && editExpense('/account/edit/', e.target.id) })

// viewModalBtns.forEach(function(viewModalBtn){
    // viewModalBtn.addEventListener('click' , function(){alert(123)})
// })
//     } catch (error) {
//         alert(error)
//     }


    </script>






<script >

//script for delete modal
        function deleteExpense(url , id){
            let expense_id_delete;
            let expense_title_delete;

            expense_id_delete  = document.querySelector('.expense_id_delete')
            expense_title_delete = document.querySelector('.expense_title_delete')
    
                    
                    try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    console.log(data)
                    expense_id_delete.value  = data.id
                            expense_title_delete.innerText  = data.title
                })
               } catch (error) {
                   console.log(error)
               }


                    
                
}

let output22  = document.querySelector('.output');
        output22.addEventListener('click' , function(e){e.target.classList.contains('deletemodal') && deleteExpense('/account/delete/', e.target.id)})


    </script>



<script >
//edit received payment script

function editReceived(url , id){
    let received_title, received_date, received_amount, received_description, received_id
            
          
            received_title=document.querySelector('.received_title');
            received_date=document.querySelector('.received_date');
            received_amount=document.querySelector('.received_amount');
            received_description=document.querySelector('.received_description');
            received_id=document.querySelector('.received_id');
           
               try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    received_title.value =data.title
                    received_date.value  = data.date
                    received_amount.value =data.amount
                    received_description.value =data.description
                    received_id.value=data.id
                    
                })
               } catch (error) {
                   console.log(error)
               }
                   
}


  

    // try {
        let output1  = document.querySelector('.output1');
        output1.addEventListener('click' , function(e){e.target.classList.contains('editmodal') && editReceived('/account/received/edit/', e.target.id) })


    </script>



<script >

/*
//script for delete modal for received payments
        function deleteReceived(url , id){
            let received_id_delete;
            let received_title_delete;

            received_id_delete  = document.querySelector('.received_id_delete')
            received_title_delete = document.querySelector('.received_title_delete')
            

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    received_id_delete.value  = data.id
                    received_title_delete.innerText  = data.title
                 
                })
                .catch(function(err){
                    console.log(err)
                })
        } catch (error) {
        console.error(error)
    }
}

    function showId(e){
        let _id = e.target.dataset.id
        deleteReceived('/account/delete/received/', _id)

    }


let output13  = document.querySelector('.output1');
        output13.addEventListener('click' , function(e){e.target.classList.contains('deletemodal') && editReceived('/account/delete/received/', e.target.id) })
   */


        function deleteIncome(url , id){
            let received_id_delete;
            let received_title_delete;

            received_id_delete  = document.querySelector('.received_id_delete')
            received_title_delete = document.querySelector('.received_title_delete')
            
    
                    
                    try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    console.log(data)
                    received_id_delete.value  = data.id
                    received_title_delete.innerText  = data.title
                })
               } catch (error) {
                   console.log(error)
               }


                    
                
}

let output23  = document.querySelector('.output1');
        output23.addEventListener('click' , function(e){e.target.classList.contains('deletemodal') && deleteIncome('/account/delete/received/', e.target.id)})



    </script>



<script>
    
    //get Jobs 

    function getJob(){
            
          let client, selectss

          client = document.querySelector('.client');
        selectss=client.value


            try {
                fetch(`http://localhost:8000/account/job/${selectss}`)
                .then(res=> res.json())
                .then(function(data){
                   // console.log(data)
                     //I want to get specific attribute of the data
                     //i.e data.title etc ..but not working
                   
                // console.log(data)
                var select = document.querySelector(".job");
                select.options.length = 0

                data.forEach(item=>{
                   // console.log(item.title); //works now
                   

                  
                    var option = document.createElement("option");
                    option.text = item.title;
                    option.value = item.title;


                   
                    select.append(option);

                    
                    //////////////////////////////////////

                    
                })
                                
                })
                .catch(function(err){
                    console.log(err)
                })
        } catch (error) {
        console.error(error)
    }
}


   
    

</script>


<script>



     $('.formaddcategory').submit(function(e){
        e.preventDefault();

       
        var title = $(this).find('input[name=title]').val();
        
       
     // console.log(title);

      
      

       var form_action = $('.formaddcategory').attr("action");

    

       $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

      $.ajax({
    type: "POST",
    url: form_action,
    data: { addcategory:title }, 
    success: function() {
        console.log('worked');

        

      

        
        toastr.success('Category was added successfully');
        var select = document.querySelector(".addexpensecategories");
        var option = document.createElement("option");
                      option.text = title;
                      option.value = title;
                    
                      select.append(option);
  
        
        
       
        
       
    }
});




    });


  

  
</script>



<script>
    //this script is to get expenses category and populate them to the select input field

    function getCategory(){
            
        
  
  
              try {
                  fetch('http://localhost:8000/account/office/expense/category')
                  .then(res=> res.json())
                  .then(function(data){
                     // console.log(data)
                       //I want to get specific attribute of the data
                       //i.e data.title etc ..but not working
                     
                  // console.log(data)
                  var select = document.querySelector(".addexpensecategories");
                  data.forEach(item=>{
                     // console.log(item.title); //works now
  
                      var option = document.createElement("option");
                      option.text = item.name;
                      option.value = item.name;
                    
                      select.append(option);
  
                      
                      //////////////////////////////////////
  
                      
                  })
                                  
                  })
                  .catch(function(err){
                      console.log(err)
                  })
          } catch (error) {
          console.error(error)
      }
  }

  getCategory();
 

</script>



<!-- Add Job Script  -->  


<script>



     $('.theformcreatejob').submit(function(e){
        e.preventDefault();

       
        var _title = $(this).find('input[name=title]').val();
         var _amount = $(this).find('input[name=amount]').val();
         var _office="<?php echo Auth::user()->office?>";
       var _accountant="<?php echo Auth::user()->name?>";
       var _description=$('.description').val();
       var _client = document.getElementById("client").value;
      

      
      

       var form_action = $('.theformcreatejob').attr("action");

    

       $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

      $.ajax({
    type: "POST",
    url: form_action,
    data: { title:_title,
            office:_office,
            accountant:_accountant,
            client:_client,
            amount:_amount,
            description: _description,
     }, 
    success: function() {
        console.log('worked');

        toastr.success('Category was added successfully');
        
        
        
       
        
       
    }
});




    });


  

  
</script>



<script>

    //this script to to query the sort table 


    $( document ).ready(function() {
    


    //functioin

    fetchexpense();

    function fetchexpense(_from='',_to=''){
        $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

//this is to check the name of the updated ones
      $.ajax({
    type: "POST",
    url: '/testtablesort',
    data: { from:_from,
            to:_to,
            
     }, 
    success: function(data) {
        console.log('worked');

        //toastr.success('Category was added successfully');
        console.log(data)

        var expense_data = ``;
      
        $.each(data.expense,function(key,value){
              /////////////////SEE THIS ID ........
            //   console.log(value.id)
              expense_data += `<tr>
                                <td>${value.title}</td>
                                <td>${value.date}</td>
                                <td>${value.amount}</td>
                                <td>${value.description}</td>
                                <td>${value.category}</td>
                                <td>${value.accountant}</td>
                                <td><a href="#" id=${value.id} class="editmodal btn-sm btn-info" data-toggle="modal" data-target="#editModal">Edit</a> <a href="#" id=${value.id} class="deletemodal btn-sm btn-danger"data-toggle="modal" data-target="#deleteModal">Delete</a></td>
                             </tr>
                       
                             
                             `
            

        })
        expense_data += `
        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total Expenses Made </b></td>
                                            <td class="font-weight-bold text-center">₦ ${data.sum}</td>
                                            <td></td>
                                            <td></td>
                                        
                                          
                                            
                         </tr>
        `
        $('.thetablebody').html(expense_data)
        
        
        
       
        
       
    }
});


    } //end of function





//click on filter button

$('.filterbtn').click(function(){
    var from=$('.from').val()
    var to=$('.to').val()

    //alert(from)

    if(from == ''|| to ==''){
        alert('both dates are required')
    }

    else{
       // alert('both are working well')
      
      fetchexpense(from , to);
      
    }

    
})
//to refresh the sort to default
$('.refreshbtn').click(function(){
    var _from=$('.from').val('')
    var _to=$('.to').val('')

    fetchexpense();
})
   

}); ///end of document.ready




   

    

</script>


<script>

    //get income sort table 

     //this script to to query the sort table 


     $( document ).ready(function() {
    


    //functioin

    fetchincome();

    function fetchincome(_from1='',_to1=''){
        $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

      $.ajax({
    type: "POST",
    url: '/tablesortincome',
    data: { from1:_from1,
            to1:_to1,
            
     }, 
    success: function(data) {
        console.log('worked');

        //toastr.success('Category was added successfully');
        console.log(data)

        var income_data = ``;
      
        $.each(data.income,function(key,value){
              /////////////////SEE THIS ID ........

            if(value.job !=null){
                var type=value.job
            }
            else{
                var type=value.othersource
            }

            
          
            //   console.log(value.id)
              income_data += `<tr>
                                <td>${value.title}</td>
                                <td>${value.date}</td>
                                <td>${value.amount}</td>
                                <td>${value.client}</td>
                                <td>${type}</td>
                                <td>${value.accountant}</td>
                                <td><a href="#" id=${value.id} class="editmodal btn-sm btn-info" data-toggle="modal" data-target="#editreceivedModal">Edit</a> <a href="#" id=${value.id} class="deletemodal btn-sm btn-danger"data-toggle="modal" data-target="#deletereceivedModal">Delete</a></td>
                             </tr>
                       
                             
                             `
            

        })
        income_data += `
        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total Income </b></td>
                                            <td class="font-weight-bold text-center">₦ ${data.sum}</td>
                                            <td></td>
                                            <td></td>
                                        
                                          
                                            
                         </tr>
        `
        $('.thetablebody1').html(income_data)
        
        
        
       
        
       
    }
});


    } //end of function





//click on filter button

$('.filterbtn1').click(function(){
    var from1=$('.from1').val()
    var to1=$('.to1').val()

    //alert(from)

    if(from1 == ''|| to1 ==''){
        alert('Kindly input the two dates');
    }

    else{
       // alert('both are working well')
      
      fetchincome(from1 , to1);
      
    }

    
})
//to refresh the sort to default
$('.refreshbtn1').click(function(){
    var _from=$('.from1').val('')
    var _to=$('.to1').val('')

    fetchincome();
})
   

}); ///end of document.ready







</script>





<!--End of Get Function to populate select category --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous"></script>

</body>

</html>