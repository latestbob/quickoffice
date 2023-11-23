<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Admin - Tasks</title>

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
        color:black;
    }

    .notshow{
        display:none;
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
                    <h6 class="text-center">Admin</h6>
                </div>
            </a>

                         <!-- Divider -->
            <hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item ">
 <a class="nav-link" href="{{route('admin.home')}}">
     <i class="fas fa-fw fa-tachometer-alt"></i>
     <span>Dashboard</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Schedule -->

<li class="nav-item">
 <a class="nav-link" href="{{route('admin.schedule')}}">
     <i class="fas fa-fw  fa-clock"></i>
     <span>Schedule</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Task -->

<li class="nav-item active">
 <a class="nav-link" href="{{route('admin.tasks')}}">
     <i class="fas fa-fw  fa-tasks"></i>
     <span>Tasks+</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

 <!-- Nav Item - Account -->

 <li class="nav-item ">
 <a class="nav-link" href="{{route('admin.account')}}">
 <i class="fas fa-money-check"></i>
 <span>Account</span></a>
 </li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - staffs -->

<li class="nav-item">
 <a class="nav-link" href="{{route('admin.staff')}}">
 <i class="fas fa-user-friends"></i>
 <span>Staffs</span></a>
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
 <a class="nav-link" href="{{route('admin.report')}}">
     <i class="fas fa-fw  fa-file "></i>
     <span>Report</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


  <!-- Nav Item - Clients -->
<li class="nav-item">
 <a class="nav-link" href="{{route('admin.client')}}">
 <i class="fas fa-handshake"></i>
     <span>Client</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


  <!-- Nav Item - Calender -->
  <li class="nav-item">
 <a class="nav-link" href="{{route('admin.calender')}}">
 <i class="fas fa-calendar"></i>
     <span>Calender/Event</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

 <!-- Nav Item - Branch/Departments -->
 <li class="nav-item">
 <a class="nav-link" href="{{route('admin.branchdepartment')}}">
 <i class="fas fa-code-branch"></i>
     <span>Branches|Departments</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


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
                        <h1 class="h3 mb-0 text-gray-800">My Tasks</h1> 
                        <button class="btn btn-primary"data-toggle="modal" data-target="#taskModal">Create New Task</button>
                        
                    </div>

                     <!-- Content Row -->
                     <div class="row">

<!-- Earnings (Monthly) Card Example ////////////////////////////////////////////////////////////////// -->
<div class="col-xl-3  text-light col-md-6 mb-4">
    <a href="{{route('admin.view.task.type','overdue')}}">
    <div class="card bg-danger  shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                      OVER DUE TASKS</div>
                    <div class="h5 mb-0 font-weight-bold text-ligh">
                   @php
                        $date= date("Y-m-d H:i:s", strtotime('+1 hours'));
                       
                       
                        
                   @endphp

               

              

                   <div class="h5 mb-0 font-weight-bold "style="color:white;">
                   {{ \App\Task::where(['office' => Auth::user()->office])->where(['createdby' => Auth::user()->name])->where(['status' => 'pending'])->where('end' ,'<', $date)->
                    orwhere(['office' => Auth::user()->office])->where(['supervisor' => Auth::user()->name])->where(['status' => 'pending'])->where('end' ,'<', $date)
                   ->count() }}
                    </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-light"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
   <a href="{{route('admin.view.task.type','pending')}}">
   <div class="card bg-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        PENDING TASKS</div>
                    <div class="h5 mb-0 font-weight-bold text-dark">
                    {{ \App\Task::where(['office' => Auth::user()->office])
             ->where(function ($query) {
                 $query->where(['createdby' => Auth::user()->name])
                       ->orWhere(['supervisor' => Auth::user()->name]);
             })
             ->where(['status' => 'pending'])
             ->count() }}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clock fa-2x text-dark"></i>
                </div>
            </div>
        </div>
    </div>
   </a>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <a href="{{route('admin.view.task.type','completed')}}">
    <div class="card bg-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Completed Tasks
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-light">
                            {{ \App\Task::where(['office' => Auth::user()->office])->where(['createdby' => Auth::user()->name])->where(['status' => 'completed'])->count() }}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-check fa-2x text-light" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <a href="{{route('admin.view.task.type','supervised')}}">
    <div class="card bg-secondary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Supervised Tasks
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-light">
                            {{ \App\Task::where(['office' => Auth::user()->office])->where(['supervisor' => Auth::user()->name])->count() }}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-user fa-2x text-light" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>


</div>

<!-- Content Row -->


<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taskModalLabel">Create A New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('tasks.submit')}}"method="POST"enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="title">Task Title</label>
                                            <input type="text"name="title"placeholder="Enter Task Title"class="form-control"required>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="start">Task Start At</label>
                                            <input type="datetime-local"name="start"placeholder="Task Start at"class="form-control"required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="start">Task Should End At</label>
                                            <input type="datetime-local"name="end"placeholder="Proposed Date of completion"class="form-control"required>
                                        </div>
                                            
                                    </div>

                                    <hr>
                                    <div class="card-header m-auto py-3">
                                    <h6 class="m-0 font-weight-bold text-primary mb-4">Task Classification</h6>


                                    <div class="form-group row ">
                                        <div class="col-md-6">
                                            <label for="category">Task Category</label>
                                                <select onchange="getType();" name="category"class="form-control taskcategory" id=""required>
                                                    <option value="">Select Task Category (For Personal /Assigned to Staff)</option>
                                                    <!-- <option value="client">For Client</option> -->
                                                    <option value="personal">Personal</option>
                                                    <option value="staff">Staff</option>
                                                </select>
                                        </div>

                                        <div class="col-md-6 clientdiv notshow">
                                            <label for="category">Clients (Leave Blank If Not for Client)</label>
                                                <select name="client"class="form-control" id="">
                                                    <option value="">Select Client</option>
                                                   @foreach($client as $clients)

                                                        <option value="{{$clients->name}}">{{$clients->name}}</option>
                                                   @endforeach
                                                </select>
                                        </div>

                                        <div class="col-md-6 notshow staffdiv">
                                            <label for="staffs">Staffs(Leave Blank Tasks not for staff)</label>
                                                <select name="staff"class="form-control" id="">
                                                    <option value="">Select Staffs</option>
                                                    @foreach($staff as $staffs)

                                                    <option value="{{$staffs->name}}">{{$staffs->name}}</option>
                                                    @endforeach
                                                   
                                                </select>
                                        </div>
                                            
                                    </div>

                                   

                                    <hr>
                                    <div class="card-header m-auto py-3">
                                    <h6 class="m-0 font-weight-bold text-primary mb-4">Supervision</h6>

                                    <div class="form-group row">
                                      
                                            <label for="supervisor">Supervised By</label>
                                            <select name="supervisor" id=""class="form-control"required>
                                                <option value="">Select Name of Supervisor</option>
                                                <option value="{{Auth::user()->name}}">{{Auth::user()->name}} - Myself</option>
                                            
                                                @foreach($supervisor as $super)
                                                    
                                                    <option value="{{$super->name}}">{{$super->name}}</option>
                                                @endforeach


                                            </select>
                                      
                                    </div>


                                    <hr>
                                    <div class="form-group">
                                        <label for="description">Task Description</label>

                                        <textarea name="description" id=""placeholder="Task Description"class="form-control" cols="10" rows="5"required></textarea>
                                    </div>


                                    <hr>

                                    <div class="form-group">
                                        <label for="file">Attachements (Optional)</label> <br>
                            
                                        <input type="file"name="fileattachment"placeholder="Enter Attachments">
                                    </div>

                                </div>

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Create Task</button>
                                    </div>
                              
                                    </form>
      </div>
      
    </div>
  </div>
</div>


                   
                    <!-- Content Row -->
                    <div class="row">


                      
                        <!-- Content Column -->
                        <div class="col-lg-8  m-auto mb-4">
                            @if(session('error'))
                                <div class="alert alert-danger text-center">
                                    <p>{{session('error')}}</p>
                                </div>
                            @endif

                            @if(session('msg'))
                                <div class="alert alert-success text-center">
                                    <p>{{session('msg')}}</p>
                                </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger text-center">
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li style="list-style:none">{{ $error }}</li>
                            @endforeach
                            </ul>
                            </div>

                            @endif

                            <!-- Project Card Example -->
                            

                            

                         </div>

                         
                        
                         <!-- End of column-->

                       
                    </div>

                    

                </div>
                
                    <!--This section for construction-->
                    </div>
                <!-- /.container-fluid -->



                <div class="row m-auto table-responsive">

                <table class="table table-sm table-borderless table-hover">
                    <thead class="bg-primary text-light">
    <tr>
        <th>Title</th>
        <th>Start</th>
        <th>End</th>
        
        <th>Supervisor</th>
        <th>Assigned </th>
        <th>Attachment</th>
        <th>Status</th>
        <th>Actions</th>
   
      
    </tr>
  </thead>

  <tbody style="color:black;font-size:13px;z-index:100;">

            @foreach($task as $work)
            <tr>
                <td>{{$work->title}}</td>
                <td>{{$work->start}}</td>
                <td>{{$work->end}}</td>
                <td>{{Auth::user()->name == $work->supervisor ? "Me" : $work-supervisor}}</td>
                
                <td> 
                @if($work->category == "personal" && $work->createdby == Auth::user()->name)
    <p class="badge badge-primary text-light badge-sm"> Personal </p>

    @else
    <p> {{$work->createdby}}</p>
    @endif        
            </td>

                <td>
                    @if($work->attachment == NULL)
                        None
                    @else

                        <a href="{{$work->attachment}}"target="_blank"><i class="fa fa-download"> </i></a>
                    

                    @endif
                </td>
                <td>
                    @if($work->status  == "pending")
                        <p class="badge badge-warning text-dark badge-sm">{{$work->status}} </p>
                    
                        @elseif($work->status  == "completed")
                        <p class="badge badge-success text-light badge-sm">{{$work->status}} </p>
                  

                    @else
                    <p class="badge badge-danger text-light badge-sm">{{$work->status}} </p>

                    @endif
                </td>

                @if($work->supervisor == Auth::user()->name)
                <td>
                    <i data-id="{{$work->id}}"data-toggle="modal" data-target="#viewModal"class="fa fa-eye mr-2 text-primary viewmodal"></i>|<i data-id="{{$work->id}}"data-toggle="modal" data-target="#editModal"class="fa fa-edit mr-2 text-warning editmodal"></i>|<i data-id="{{$work->id}}"data-toggle="modal" data-target="#deleteModal"class="fa fa-trash mr-2 text-danger deletemodal"></i>
                </td>
                    
                @else

                <td>
                    <i data-id="{{$work->id}}"data-toggle="modal" data-target="#viewModal"class="fa fa-eye mr-2 text-primary viewmodal"></i>|<i data-id="{{$work->id}}"data-toggle="modal" data-target="#editModal"class="fa fa-edit mr-2 text-warning editmodal"></i>
                </td>

                @endif
                


            </tr>


            @endforeach

</tbody>
  
</table>
               
                    
                </div>

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









       <!-- View Branch Modal-->
       <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      My Task
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                   
                        <div class="table-responsive">
                            
                        
                            <table class="table table-hover table-sm table-borderless">
                                <tbody style="color:black;font-size:13px;">
                                    <tr>
                                        <td>Title</td>
                                        <td class="task_title">name</td>

                                    </tr>

                                    <tr>
                                        <td> Start Date</td>
                                        <td class="task_start">location</td>

                                    </tr>

                                    <tr>
                                        <td> Schedule End Date</td>
                                        <td class="task_end" >branch</td>

                                    </tr>
                                      
                                    <tr>
                                        <td>Task Category</td>
                                        <td class="task_category" >branch</td>
                                    </tr>

                                    

                                  

                                    <tr>
                                        <td>Description</td>
                                        <td class="task_description"></td>
                                    </tr>


                                    <tr>
                                        <td>Supervised by</td>
                                        <td class="task_supervisor"></td>
                                    </tr>

                                    <tr>
                                        <td>Assigned to</td>
                                        <td class="task_assigned"></td>
                                    </tr>


                                    <tr>
                                        <td>Status</td>
                                        <td class="task_status"></td>
                                    </tr>

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>








    
       <!--  Edit Task Modal-->
       <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title task_title_edit" id="exampleModalLabel">
                      
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                   
                        <form action="{{route('admin.edit.task.put')}}"method="POST">
                            @csrf 
                            {{method_field('PUT')}}

                            <input type="hidden"name="id"class="task_id_edit form-control">

                            <div class="form-group">
                                <select name="status" id=""class="form-control"required>
                                    <option value="">Select Task Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success text-center text-light">Update Task Status</button>
                            </div>
                        </form>
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>



        <!-- Delete Staff Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete Task?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Confirm you want to delete  <span class="task_title_delete"></span></div>
                <form action="{{route('admin.delete.taskdelete')}}"method="POST">
                        @csrf 
                        {{method_field('DELETE')}}

                        <input type="hidden"name="id"class="task_id_delete form-control">
                        <button class="btn btn-danger ml-3">Delete Branch</button>
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
            task_description = document.querySelector('.task_description')
            task_supervisor = document.querySelector('.task_supervisor');
            task_assigned = document.querySelector('.task_assigned');
            task_status = document.querySelector('.task_status');


            
          

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    task_title.innerText  = data.title
                    task_start.innerText  = data.start
                    task_end.innerText  = data.end
                    task_category.innerText  = data.category
                  
                    task_description.innerText  = data.description
                    task_supervisor.innerText = data.supervisor
                    task_assigned.innerText = data.createdby
                    task_status.innerText = data.status;

                    
                   
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
        getTask('/admin/tasks/', _id)

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
        function editTask(url , id){
            let task_id, task_title, task_start, task_end, task_category, task_client, task_description
            task_title= document.querySelector('.task_title_edit')
            
            task_id =document.querySelector('.task_id_edit')
          

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    task_id.value =data.id
                    task_title.innerText  = data.title
                   
                    
                   
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
        editTask('/admin/tasks/edit/', _id)

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
        function deleteTask(url , id){
            let task_id_delete;
            let task_title_delete;

            task_id_delete = document.querySelector('.task_id_delete')
            task_title_delete = document.querySelector('.task_title_delete')
            

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    task_id_delete.value  = data.id
                    task_title_delete.innerText  = data.title
                 
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
        deleteTask('/admin/tasks/delete/', _id)

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



<script>

    function getType(){
        var category=document.querySelector('.taskcategory');
        var sel=category.value

        if(sel=='client'){
            //alert('true')

            document.querySelector('.staffdiv').classList.add("notshow");
            document.querySelector('.clientdiv').classList.remove("notshow");
        }
        
        else if(sel=='staff'){
            document.querySelector('.staffdiv').classList.remove("notshow");
            document.querySelector('.clientdiv').classList.add("notshow");
        }

        else if(sel='personal'){
            document.querySelector('.staffdiv').classList.add("notshow");
            document.querySelector('.clientdiv').classList.add("notshow");
        }
        
    }
</script>




</body>

</html>