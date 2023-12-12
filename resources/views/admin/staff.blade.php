<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{Auth::user()->office}} Admin - Staffs</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
<style>
    .notshow{
        display:none;
    }

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
           
            <li class="nav-item">
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

              <li class="nav-item active">
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
                        <h1 class="h3 mb-0 text-gray-800">Staff Records</h1>

                        <button class="btn btn-primary"data-toggle="modal" data-target="#exampleModal">Register A Staff</button>
                        
                    </div>

                   
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">All Staffs</h6>
                                </div>
                                <div class="card-body">

                                @if(session('msgg'))
                                    <div class="alert alert-success text-center">
                                        <p>{{session('msgg')}}</p>
                                    </div>
                                @endif
                                              <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">All Registered Staffs</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-hover table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Branch</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody style="color:black;font-size:13px;">
                                        @foreach($staff as $staffs)
                                        <tr>
                                            <td>{{$staffs->name}}</td>
                                            <td>{{$staffs->position}}</td>
                                            <td>{{$staffs->branch}}</td>
                                            <td>{{$staffs->phone}}</td>


                                            @if($staffs->name==Auth::user()->name)
                                                <td><p class="badge badge-success text-center text-light">Myself</p></td>

                                                @else
                                                <td><a href="#" data-id="{{$staffs->id}}" class="viewmodal btn-sm btn-info"data-toggle="modal" data-target="#viewModal">View</a><a href="#"data-id="{{$staffs->id}}"class="editmodal btn-sm btn-warning"data-toggle="modal" data-target="#editModal">Edit</a><a href="#"data-id="{{$staffs->id}}"class="deletemodal btn-sm btn-danger"data-toggle="modal" data-target="#deleteModal">Delete</a></td>
                                            @endif
                                           
                                            
                                        </tr>

                                        @endforeach
                                       
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                
                                </div>
                            </div>

                         </div>
                         <!-- Color System -->

                   
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


             <!-- View Branch Modal-->
             <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                       {{Auth::user()->office}} - Staff
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card text-center imagehouse">
                        <img src="{{asset('img/undraw_profile.svg')}}"class="py-2 m-auto notshow male" alt=""style="width:150px;height:150px;">
                        <img src="{{asset('img/female.png')}}"class="py-2 m-auto notshow female" alt=""style="width:150px;height:150px;">
                    </div>
                        <div class="table-responsive">
                            
                        
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Full Name</td>
                                        <td class="staff_name">name</td>

                                    </tr>

                                    <tr>
                                        <td> Email Address</td>
                                        <td class="staff_email">location</td>

                                    </tr>

                                    <tr>
                                        <td> Date of Birth</td>
                                        <td class="staff_dob" >branch</td>

                                    </tr>
                                      
                                    <tr>
                                        <td>Contact Phone</td>
                                        <td class="staff_phone" >branch</td>
                                    </tr>

                                    <tr>
                                        <td>Office Branch</td>
                                        <td class="staff_branch" >branch</td>
                                    </tr>

                                    <tr>
                                        <td>Staff Role</td>
                                        <td class="staff_role" >branch</td>
                                    </tr>

                                    <tr>
                                        <td>Job Description</td>
                                        <td class="staff_description" >branch</td>
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



    <!-- register modal box -->


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registe New Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-lg-12 mb-4">

<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New Staff</h6>
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

       @if ($errors->any())
        <div class="alert alert-danger text-center">
        <ul>
        @foreach ($errors->all() as $error)
        <li style="list-style:none">{{ $error }}</li>
        @endforeach
        </ul>
        </div>

        @endif
      <form action="{{route('admin.createstaff')}}"method="POST">
          @csrf

          <div class="row">
                <div class="col form-group">
                        <label for="name">Staff Full Name <span class="text-danger">*</span></label>
                        <input type="text"name="name"placeholder="Full Name"class="form-control"required>
                </div>

                <div class="col form-group">
                    <label for="dob">Staff DOB <span class="text-danger">*</span></label>
                    <input type="date"name="dob"placeholder="Date of Birth"class="form-control"required>
                </div>
              
          </div>

               
          <div class="row">
                <div class="col form-group">
                            <label for="email">Staff Email Address <span class="text-danger">*</span></label>
                            <input type="email"name="email"placeholder="Email Address"class="form-control"required>
                </div>

                <div class="col form-group">
                    <label for="password">Staff Password <span class="text-danger">*</span></label>
                    <input type="password"name="password"placeholder="Unique Password "class="form-control"required>
                 </div>



          </div>


          <div class="row">

                 <div class="col form-group">
                    <label for="password">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password"name="password_confirmation"placeholder="Re- Enter Password "class="form-control"required>
                </div>


                <div class="col form-group">
                    <label for="phone">Phone <span class="text-danger">*</span></label>
                    <input type="tel"name="phone"placeholder="Contact Phone"class="form-control"required>
                </div>



          </div>

            

            

            

            

            
            <div class="row">
                <div class="col form-group">
                    <label for="gender">Gender</label><br>
                        <input type="radio"name="gender"value="male"class="col-md-6">MALE
                        <input type="radio"name="gender"value="female"class="col-md-6">FEMALE
                </div>


                <div class="col form-group">
                    <label for="branch">Branch <span class="text-danger">*</span></label>
                <select name="branch" id=""class="form-control"required>
                <option value="">Select Branch</option>
                            @foreach($branch as $branches)
                                <option value="{{$branches->name}}">{{$branches->name}}</option>
                            @endforeach
                    </select>
                </div>


            </div>
          

           

           
            <div class="row">

                    <div class="col form-group">
                            <label for="department">Select Role <span class="text-danger">*</span></label>
                        <select name="position" id=""class="form-control"required>
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="account">Account</option>
                        <option value="staff">Staff</option>
                                
                        </select>
                    </div>


                    <div class="col form-group">
                            <label for="description">Job Description</label>
                             <textarea name="description" id="" cols="10" rows="5"class="form-control"required></textarea>
                    </div>


            </div>


            


            

            <div class="form-group">
                <button class="btn btn-info text-center">Register</button>
            </div>

      </form>
       
     
    </div>
</div>

<!-- Approach -->


</div>
      </div>
     
    </div>
  </div>
</div>




    <!-- end of register modal box -->



         <!-- Edit Staff Modal-->
         <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                       {{$branches->office}} Edit Staff
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('admin.edit.staff.post',$staffs->id)}}"method="POST">
                        @csrf 
                        {{method_field('PUT')}}

                        <input type="hidden"name="id"class="staff_id_edit"required>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"name="name"class="staff_name_edit form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email"name="email"class="staff_email_edit form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"name="password"class="form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input type="date"name="dob"class="staff_dob_edit form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel"name="phone"class="staff_phone_edit form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id=""class="form-control"required>
                                <option value="">Select Branch </option>

                                @foreach($branch as $branchess)
                                    <option value="{{$branchess->name}}">{{$branchess->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id=""class="form-control"required>
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="account">Accountant</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Job Description</label>

                           <input type="text"name="description"class="form-control staff_description_edit"style="height:100px;"required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success text-center">Update Details</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete Staff?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Confirm you want to delete  <span class="branch_name_delete"></span></div>
                <form action="{{route('admin.delete.staff.post')}}"method="POST">
                        @csrf 
                        {{method_field('DELETE')}}

                        <input type="hidden"name="id"class="branch_delete form-control">
                        <button class="btn btn-danger">Delete Branch</button>
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

    <script >
        function getBranch(url , id){
            let staff_name, staff_dob, staff_email, staff_phone, staff_branch, staff_role, staff_description;

            staff_name= document.querySelector('.staff_name')
            staff_dob = document.querySelector('.staff_dob')
            staff_email = document.querySelector('.staff_email')
            staff_phone = document.querySelector('.staff_phone')
            staff_branch = document.querySelector('.staff_branch')
            staff_role = document.querySelector('.staff_role')
            staff_description = document.querySelector('.staff_description')

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    staff_name.innerText  = data.name
                    staff_email.innerText  = data.email
                    staff_dob.innerText  = data.dob
                    staff_phone.innerText  = data.phone
                    staff_branch.innerText =data.branch
                    staff_role.innerText  = data.position
                    staff_description.innerText  = data.description

                    if(data.gender=="female"){
                        document.querySelector('.female').classList.remove("notshow")
                        document.querySelector('.male').classList.add("notshow")
                    }

                    else if(data.gender=="male"){
                        document.querySelector('.female').classList.add("notshow")
                        document.querySelector('.male').classList.remove("notshow")
                    }
                   
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
        getBranch('/admin/staff/', _id)

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

//script for edit modal
        function editBranch(url , id){
            let  staff_id, staff_name, staff_dob, staff_email, staff_phone, staff_branch, staff_role, staff_description;

            staff_id= document.querySelector('.staff_id_edit')
            staff_name= document.querySelector('.staff_name_edit')
            staff_dob = document.querySelector('.staff_dob_edit')
            staff_email = document.querySelector('.staff_email_edit')
            staff_phone = document.querySelector('.staff_phone_edit')
 
            staff_role = document.querySelector('.staff_role_edit')
            staff_description = document.querySelector('.staff_description_edit')

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    console.log(data)
                    staff_id.value  = data.id
                    staff_name.value  = data.name
                    staff_email.value  = data.email
                    staff_dob.value  = data.dob
                    staff_phone.value  = data.phone
                    
                    staff_role.innerText  = data.position
                    staff_description.innerText  = data.description
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
        editBranch('/admin/edit/staff/', _id)

    }

    try {
        let editModalBtns  = document.querySelectorAll('.editmodal');

editModalBtns.forEach(function(editModalBtn){
    editModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
    </script>



<script >

//script for delete modal
        function deleteStaff(url , id){
            let branch_delete;
            let branch_name_delete;

            branch_delete = document.querySelector('.branch_delete')
            branch_name_delete = document.querySelector('.branch_name_delete')
            

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    branch_delete.value  = data.id
                    branch_name_delete.innerText  = data.name
                 
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
        deleteStaff('/admin/delete/staff/', _id)

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



</body>

</html>