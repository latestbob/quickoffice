<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Admin - Calender/Events</title>

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
                                <a class="dropdown-item" href="#">
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
                        <h1 class="h3 mb-0 text-gray-800">Calender & Events</h1>
                        
                    </div>

                   
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-7 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Event Calender</h6>
                                </div>
                                <div class="card-body">

                                @if(session('msgg'))
                                    <div class="alert alert-success text-center">
                                        <p>{{session('msgg')}}</p>
                                    </div>
                                @endif
                                              <!-- DataTales Example
                    -->
                          
                                             {!! $calendar->calendar() !!}
                                    
                
                                </div>
                            </div>

                         </div>
                         <!-- Color System -->

                        <div class="col-lg-5 mb-4">

                            
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add New Event</h6>
                                </div>
                                <div class="card-body">
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
                                


                                    <form action="{{route('admin.add.event')}}"method="POST">
                                        @csrf 

                                        <div class="form-group">
                                            <label for="name">Event Title</label>

                                            <input type="text" name="title" id=""class="form-control"placeholder="Enter Event Title"required>
                                        </div>

                                        <div class="form-group">
                                        <label for="start">Start Date</label>
                                            <input type="date"name="start"class="form-control"required>

                                        </div>

                                        <div class="form-group">
                                        <label for="start">End Date</label>
                                            <input type="date"name="end"class="form-control"required>

                                        </div>


                                        <div class="form-group">
                                        <label for="start">Description</label>
                                            <textarea name="description" id="" cols="20" rows="5"placeholder="Event Description"class="form-control"required></textarea>

                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success text-center">Add Event</button>
                                        </div>

                                        <input type="hidden"name="office"value="{{Auth::user()->office}}"required>
                                        
                                    </form>
                                   
                                
                                   
                                 
                                </div>
                            </div>

                            <!-- Approach -->
                           

                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>End</th>
                                    <th>Createdby</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myevent as $event)

                                    <tr>
                                        <td>{{$event->title}}</td>
                                        <td>{{$event->start}}</td>
                                        <td>{{$event->end}}</td>
                                        <td>{{$event->createdby}}</td>
                                        <td>
                                            <form action="{{route('admin.delete.event',$event->id)}}"method="POST">
                                            @csrf 
                                            {{method_field('DELETE')}}

                                            @if($event->title=="Welcome")
                                            <button class="btn btn-sm btn-danger text-light"disabled>Delete</button>

                                            @else 
                                            <button class="btn btn-sm btn-danger text-light">Delete</button>
                                            @endif
                                                    
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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


{!! $calendar->script() !!}

 




</body>

</html>