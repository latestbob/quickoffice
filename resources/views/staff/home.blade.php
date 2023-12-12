<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{Auth::user()->office}} Staff - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">

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
                    <h6 class="text-center">Staff</h6>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a id="step-two" class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Schedule -->
           
            <li class="nav-item">
                <a id="step-three"class="nav-link" href="{{route('staff.schedule')}}">
                    <i class="fas fa-fw  fa-clock"></i>
                    <span>Schedule</span></a>
            </li>
            
              <!-- Divider -->
              <hr class="sidebar-divider">


               <!-- Nav Item - Task -->
           
            <li class="nav-item">
                <a id="step-four"class="nav-link" href="{{route('staff.tasks')}}">
                    <i class="fas fa-fw  fa-tasks"></i>
                    <span>Tasks+</span></a>
            </li>
            
              <!-- Divider -->
              <hr class="sidebar-divider">

                  <!-- Nav Item - Message -->
           
            <li class="nav-item ">
            <a id="step-five"class="nav-link" href="/chatify">
                    <i class="fas fa-fw  fa-envelope"></i>
                    <span>Message</span></a>
            </li>
            
              <!-- Divider -->
              <hr class="sidebar-divider">


                  <!-- Nav Item - Report -->
           
            <li class="nav-item">
                <a id="step-six"class="nav-link" href="{{route('staff.report')}}">
                    <i class="fas fa-fw  fa-file "></i>
                    <span>Report</span></a>
            </li>
            
              <!-- Divider -->
              <hr class="sidebar-divider">


                 <!-- Nav Item - Clients -->
              <li class="nav-item">
                <a id="step-seven"class="nav-link" href="{{route('staff.clients')}}">
                <i class="fas fa-handshake"></i>
                    <span>Client</span></a>
            </li>
            
              <!-- Divider -->
              <hr class="sidebar-divider">


                 <!-- Nav Item - Calender -->
                 <li class="nav-item">
                <a id="step-eight"class="nav-link" href="{{route('staff.events')}}">
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
                                        <a class="dropdown-item d-flex align-items-center" href="{{route('staff.schedule')}}">
                                    @elseif($notify->type=="App\Notifications\EventNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('staff.events')}}">

                                    @elseif($notify->type=="App\Notifications\DeclinedMeetingNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('staff.schedule')}}">

                                    @elseif($notify->type=="App\Notifications\SendTask")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('staff.tasks')}}">

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
                                <img id="step-one" class="img-profile rounded-circle"
                                    src="{{asset('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('staff.profile.page')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a id=""class="dropdown-item" href="{{route('staff.setting.page')}}">
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        

                    @if(\App\User::where('office',Auth::user()->office)->where('name',Auth::user()->name)->value('hint') != 'false')
                        <a id="step-ten"href="{{route('staff.hint.hide')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Don't show me Hint again</a>
                        @endif
                    </div>
                   
                   
                                             
 <!-- Content Row -->
 <div class="row">

<!-- Earnings (Monthly) Card Example ////////////////////////////////////////////////////////////////// -->
<div class="col-xl-3  text-light col-md-6 mb-4">
    <a href="{{route('staff.view.specific.task.type','overdue')}}">
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
   <a href="{{route('staff.view.specific.task.type','pending')}}">
   <div class="card bg-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        PENDING TASKS</div>
                    <div class="h5 mb-0 font-weight-bold text-dark">
                    {{ \App\Task::where(['office' => Auth::user()->office])->where(['createdby' => Auth::user()->name])->where(['status' => 'pending'])->count() }}
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
    <a href="{{route('staff.view.specific.task.type','completed')}}">
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
    <a href="{{route('staff.view.specific.task.type','supervised')}}">
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

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                                 @if(\App\Task::where('office',Auth::user()->office)->where('createdby',Auth::user()->name)->exists())
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Latest Tasks</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    
                                

                                        <div class="table-responsive">
                                           <table class="table table-striped">
                                           <thead>
                                                <th>Title</th>
                                                <th>Client</th>
                                                <th>Status</th>
                                                <td>Ending</td>

                                            </thead>

                                            <tbody>
                                               @foreach($task as $tasks)
                                                    <tr>
                                                        <td>{{$tasks->title}}</td>
                                                        <td>{{$tasks->client}}</td>

                                                      
                                                        <td>  
                                                        @if($tasks->status=="pending")
                                                            <p class="text-center badge badge-warning">{{$tasks->status}}</p>

                                                            @elseif($tasks->status=="completed")
                                                            <p class="text-center badge badge-success">{{$tasks->status}}</p>

                                                            @elseif($tasks->status=="")
                                                        @endif
                                                        </td>
                                                        <td>{{$tasks->end}}</td>
                                                        
                                                        <!--date("d-M", strtotime($tasks->end)) change date to month day -->
                                                    </tr>
                                               @endforeach

                                               
                                            </tbody>
                                            
                                           </table>
                                          <div class="m-auto text-center">
                                            <a href="{{route('staff.tasks')}}" class="btn btn-sm btn-info text-white">View More</a>
                                          </div>
                                        </div>
                                   
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Upcoming Events</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    
                                    @if(\App\Events::where('office',Auth::user()->office)->exists())
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                            @foreach($event as $events)

                                            
                                                <tr>
                                                    <td>{{$events->title}}</td>
                                                    <td>{{$events->start}}</td>
                                                </tr>
                                            
                                            @endforeach
                                            </table>

                                            <div class="m-auto text-center">
                                            <a href="{{route('staff.events')}}" class="btn btn-sm btn-info text-white">View More</a>
                                            </div>


                                        </div>

                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-8 mb-4">
                                    @if(\App\Meeting::where('office',Auth::user()->office)->where('participant',Auth::user()->name)->exists())
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Meetings Schedule with me</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Title</th>
                                                <th>Start</th>
                                                <th>Creator</th>
                                                
                                            </thead>

                                            <tbody>
                                                @foreach($meeting as $meetings)
                                                    <tr>
                                                        <td>{{$meetings->title}}</td>
                                                        <td>{{$meetings->start}}</td>
                                                        <td>{{$meetings->creator}}</td>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="m-auto text-center">
                                            <a href="{{route('staff.schedule')}}" class="btn btn-sm btn-info text-white">View More</a>
                                            </div>

                                    </div>
                                </div>
                            </div>
                                @endif
                           </div>

                      
                    </div>

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
    

    <script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>

    @if(\App\User::where('office',Auth::user()->office)->where('name',Auth::user()->name)->value('hint') != 'false')


       
    <script>
        const intro=introJs();
        intro.setOptions({
            steps:[
                {
                    intro:'<p>Welcome to QuickOffice, <br> let\'s take a tour</p>'
                },

                {
                    element:'#step-one',
                    intro:'<p>You are required to change your default password. click on the Profile image and go to settings.</p>',
                    position:'top'
                },

                {
                    element:'#step-two',
                    //intro:'You are required to change you default password, click on the Profile image and go to settings.<img src="{{asset('img/staffstep1.png')}}" alt="">',
                    intro:'<p>This is your dashboard. It contains information on other section on the application.</p>'
                    
                },

                {
                    element:'#step-three',
                    //intro:'You are required to change you default password, click on the Profile image and go to settings.<img src="{{asset('img/staffstep1.png')}}" alt="">',
                    intro:'<p>Create meeting schedule with  of staff and clients. Join meetings, share screens and recordings etc .</p>',
                    position:'top',
                    
                },

             

                {
                    element:'#step-four',
                    //intro:'You are required to change you default password, click on the Profile image and go to settings.<img src="{{asset('img/staffstep1.png')}}" alt="">',
                    intro:'<p>Task, <br> create task for client/staff, attach file option and tracking task progress.</p>',
                   
                    
                },

                {
                    element:'#step-five',
                    //intro:'You are required to change you default password, click on the Profile image and go to settings.<img src="{{asset('img/staffstep1.png')}}" alt="">',
                    intro:'<p>RealTime Message to staff, share files etc.</p>',
                    position:'right'
                   
                    
                },

                {
                    element:'#step-six',
                    //intro:'You are required to change you default password, click on the Profile image and go to settings.<img src="{{asset('img/staffstep1.png')}}" alt="">',
                    intro:'<p>Write Report on activities, survey and events <br> Generate reports in pdf, using company and staff information.</p>',
                   
                    
                },

                {
                    element:'#step-seven',
                    //intro:'You are required to change you default password, click on the Profile image and go to settings.<img src="{{asset('img/staffstep1.png')}}" alt="">',
                    intro: '<p>Get Record on tasks pending, overdued and completed .</p>',
                   
                    
                },

                {
                    element:'#step-eight',
                    //intro:'You are required to change you default password, click on the Profile image and go to settings.<img src="{{asset('img/staffstep1.png')}}" alt="">',
                    intro:'<p>Event Calendar, <br> View and schedule events in calandar mode etc.</p>',
                   
                    
                },

                {
                    element:'#step-ten',
                    //intro:'You are required to change you default password, click on the Profile image and go to settings.<img src="{{asset('img/staffstep1.png')}}" alt="">',
                    intro:'<p>Don\'t want to see hint again? <br> click here</p>',
                   
                    
                },

                
            ]
        })

        intro.start();




      
    </script>
 @endif
</body>

</html>