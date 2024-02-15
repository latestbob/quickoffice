<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Account - Expenses</title>

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
  </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('account.nav')
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
                        <h1 class="h3 mb-0 text-gray-800">Monthly Expenses</h1>
                        
                    </div>

     
                            @if(session('msg'))
                                <div class="alert alert-success text-center">
                                    <p>{{session('msg')}}</p>
                                </div>
                            @endif
                        
                        <hr class="text-dark">


                        <div class="card shadow expenses mb-4"id="expenses">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Other Expenses</h6>
                        </div>
                       
                        <div class="card-body">
                            <div><a href="#received"class="btn-sm btn-secondary text-light font-weight-bold">Go to Administrative Expenses</a></div>
                            <div class="text-right">
                         
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Amount in Naira (₦)</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Accounted by</th>
                                         
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($expenses as $expense)
                                            <tr>
                                                <td>{{$expense->title}}</td>
                                                <td>{{$expense->month}}</td>
                                                <td>{{$expense->date}}</td>
                                                <td>{{$expense->amount}}</td>
                                                <td>{{$expense->description}}</td>
                                                <td>{{$expense->category}}</td>
                                                <td>{{$expense->accountant}}</td>
                                                
                            
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total Expenses Made </b></td>

                                            @php   $date=date('M-Y') @endphp
                                            <td class="font-weight-bold text-center">₦ {{\App\Expense::where('office',Auth::user()->office)->where('category','!=','Administrative Expenses')->where('month',$date)->sum('amount')}}</td>
                                          
                                            
                                        </tr>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>Title</th>
                                            <th>Date</th>
                                            <th>Amount in Naira (₦)</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Accounted by</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                
                    <div class="card shadow mb-4"id="received">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Administrative Expenses</h6>
                        </div>
                       
                        <div class="card-body">
                        <div><a href="#expenses"class="btn-sm btn-secondary text-light font-weight-bold">Go to Other Expenses</a></div>
                            <div class="text-right">
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Amount in Naira (₦)</th>
                                            <th>Client</th>
                                            <th>Description</th>
                                            <th>Accounted by</th>
                                      
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       
                                       @foreach($administrative as $expensess)
                                            <tr>
                                              
                                            <td>{{$expensess->title}}</td>
                                            <td>{{$expensess->month}}</td>
                                                <td>{{$expensess->date}}</td>
                                                <td>{{$expensess->amount}}</td>
                                                <td>{{$expensess->description}}</td>
                                                <td>{{$expensess->category}}</td>
                                                <td>{{$expensess->accountant}}</td>
                                                
                                               
                                                
                                            </tr>

                                       @endforeach

                                       <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total Payments Received </b></td>
                                            @php   $date=date('M-Y') @endphp
                                            <td class="font-weight-bold text-center">₦ {{\App\Expense::where('office',Auth::user()->office)->where('category','=','Administrative Expenses')->where('month',$date)->sum('amount')}}</td>
                                          
                                            
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Amount in Naira (₦)</th>
                                            <th>Client</th>
                                            <th>Description</th>
                                            <th>Accounted by</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>


                                
                            </div>

                            <div class="table-responsive">
                            <div class="card-header bg-danger  py-3">
                                <div class="row">
                                    <div class="col-6 text-center">
                                    <h6 class="m-0 font-weight-bold  text-light"style="font-size:20px;">Total Expenses for {{date('M-Y')}} </h6>
                                    </div>

                                    <div class="col-6 text-cener">
                                    <h6 class="font-weight-bold  text-light"style="font-size:20px;">₦ {{\App\Expense::where('office',Auth::user()->office)->where('category','=','Administrative Expenses')->where('month',$date)->sum('amount') + \App\Expense::where('office',Auth::user()->office)->where('category','!=','Administrative Expenses')->where('month',$date)->sum('amount')}}</h6>
                                    </div>
                                </div>
                        </div>
                            </div>
                        </div>
                    </div>

                  


                    <section class="paymentreceived"id="paymentreceived">
                    

                    </section>






                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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

               
                                       

                                        <div class="col-md-12">
                                            <!--Add category collapsed here --> 
                                            <label for="">Add Category (If it doesn't Exists)</label>

                                            <p>
                                                
                                                <button class="btn btn-secondary btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                    +
                                                </button>
                                                </p>
                                                <div class="collapse" id="collapseExample">
                                                <div class="card card-body">
                                                   
                                                  <form action="{{route('account.add.expense.category')}}"method="POST">
                                                    @csrf 

                                                    <input type="text"name="addcategory"placeholder="Category Name"class="form-control"required>
                                                   <button class="btn btn-sm btn-secondary">Add</button>   
                                                </form>
                                                </div>
                                                </div>
                                            <!--end of add category collaspse --> 
                                        </div>

                                        <form action="{{route('account.addexpense')}}"method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="start">Category</label>
                                            <select name="category" id=""class="form-control">4
                                            <option value="">Select Category</option>
                                                <option value="Administrative Expenses">Administrative Expenses</option>

                                                @foreach($category as $exp)
                                                        <option value="{{$exp->name}}">{{$exp->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                            
                                    
                

                                        <div class="form-group">
                                            <label for="title">Expenses Title</label>
                                            <input type="text"name="title"placeholder="Enter Expenses Title"class="form-control"required>
                                        </div>


                                        
                                        
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

                                    <div class="form-group">
                                       <label for="client">Payment made by</label>
                                       <select name="client" id=""class="form-control"required>
                                            <option value="">Select from Client</option>
                                                @foreach($client as $clients)
                                                    <option value="{{$clients->name}}">{{$clients->name}}</option>

                                                @endforeach
                                       </select>
                                    </div>
                                   


                               

                                  
                                
                                    


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

                                    <div class="form-group">
                                       <label for="client">Payment made by</label>
                                       <select name="client" id=""class="form-control"required>
                                            <option value="">Select from Client</option>
                                                @foreach($client as $clients)
                                                    <option value="{{$clients->name}}">{{$clients->name}}</option>

                                                @endforeach
                                       </select>
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
                        <button class="btn btn-danger">Delete Expense</button>
                    </form>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                  
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

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    expense_title.value =data.title
                    expense_date.value  = data.date
                    expense_amount.value =data.amount
                    expense_description.value =data.description
                   expense_id.value=data.id
                    
                   
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
        editExpense('/account/edit/', _id)

    }

    try {
        let viewModalBtns  = document.querySelectorAll('.editmodal');

viewModalBtns.forEach(function(viewModalBtn){
    viewModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
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
                    expense_id_delete.value  = data.id
                    expense_title_delete.innerText  = data.title
                 
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
        deleteExpense('/account/delete/', _id)

    }

    try {
        let deleteModalBtns  = document.querySelectorAll('.deletemodal');

deleteModalBtns.forEach(function(deleteModalBtn){
    deleteModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
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
                .catch(function(err){
                    console.log(err)
                })
        } catch (error) {
        console.error(error)
    }
}


    function showId(e){
        let _id = e.target.dataset.id
        editReceived('/account/received/edit/', _id)

    }

    try {
        let viewModalBtns  = document.querySelectorAll('.editreceivedmodal');

viewModalBtns.forEach(function(viewModalBtn){
    viewModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
    </script>



<script >

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

    try {
        let deleteModalBtns  = document.querySelectorAll('.deletereceivedmodal');

deleteModalBtns.forEach(function(deleteModalBtn){
    deleteModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
    </script>





</body>

</html>