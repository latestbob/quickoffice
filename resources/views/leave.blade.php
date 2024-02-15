<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Leave Management</title>

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

    label{
        font-size:14px;
        color:black;
    }
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('staff.nav')
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
                    <!-- <form
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
                    </form> -->

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
                                <img class="img-profile rounded-circle"
                                    src="{{asset('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('staff.profile.page')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{route('staff.setting.page')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
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
                        <h1 class="h3 mb-0 text-gray-800">Leave Management</h1> 
                        <button class="btn btn-primary"data-toggle="modal" data-target="#exampleModal">Apply For Leave</button>
                        
                    </div>


                    @if(session('error'))

<div class="w-100 alert alert-danger text-center">
    <p>{{session('error')}}</p>
</div>


@endif

@if(session('msg'))

<div class="w-100 alert alert-success text-center">
<p>{{session('msg')}}</p>
</div>


@endif



<!-- $table->string("fullname");
            $table->string("email");
            $table->string("position");
            $table->string("emergency_contact");
            $table->string("type");
            $table->integer("applicable_days")->nullable();
            $table->integer("requested_days");
            $table->string("start");
            $table->string("end");
            $table->string("status")->nullable();
            $table->string("comment")->nullable();
            $table->string("approved_by")->nullable();
            $table->string("year")->nullable();
            $table->string("ref")->nullable(); -->



                   
                    <!-- Content Row -->
                    <div class="row">
                       
                    </div>
 <div class="row m-auto table-responsive">

<table class="table table-sm table-borderless table-hover">
    <thead class="bg-primary text-light">
<tr>
<th>Ref</th>
<th>Fullname</th>
<th>Email</th>
<th>Position</th>
<th>Emergency Contact</th>
<th>Type </th>
<th>Applicable Days</th>
<th>Requested Days</th>
<th>Start</th>
<th>End</th>
<th>Status</th>
<th>Year</th>
<th>Actions</th>


</tr>
</thead>

<tbody style="color:black;font-size:13px;z-index:100;">

    @foreach($leave as $leaves)

        <tr>
            <td>{{$leaves->ref}}</td>
            <td>{{$leaves->fullname}}</td>
            <td>{{$leaves->email}}</td>
            <td>{{$leaves->position}}</td>
            <td>{{$leaves->emergency_contact}}</td>

            <td>{{$leaves->type}}</td>
            <td>{{$leaves->applicable_days}}</td>
            <td>{{$leaves->requested_days}}</td>
            <td>{{$leaves->start}}</td>
            <td>{{$leaves->end}}</td>
            <td>
                @if($leaves->status == 'pending')


                <p class="badge badge-warning text-dark">{{$leaves->status}}</p>

                @elseif($leaves->status == 'approved')

                <p class="badge badge-success text-light">{{$leaves->status}}</p>

                @else

                <p class="badge badge-danger text-light">Disapproved</p>
                @endif
            </td>
            <td>{{$leaves->year}}</td>
            <td>Actions</td>
            
        </tr>


    @endforeach


</tbody>

</table>

    
</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Leave Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <form action="{{route('applyleave')}}"method="POST">
             @csrf


             <h6 class="card card-heading bg-primary text-center py-1 rounded"style="color:white;">Staff Information</h6>


             <div class="form-row my-3">
                    <div class="col">
                        <label for="">Full Name</label>
                    <input type="text"name="fullname" class="form-control" placeholder="Full name"value="{{Auth::user()->name}}"required>
                    </div>
                    <div class="col">
                    <label for="">Email</label>
                    <input type="email" class="form-control"name="email"value="{{Auth::user()->email}}"required>
                    </div>
                </div>


                <div class="form-row my-3">
                <div class="col">
                        <label for="">Position</label>
                    <input type="text"name="position" class="form-control" placeholder="Full name"value="{{Auth::user()->description}}"required>
                    </div>
                    <div class="col">
                    <label for="">Emergency Contact</label>
                    <input type="tel" class="form-control"name="emergency_contact"placeholder="Your Emergency Contact"required>
                    </div>
                </div>

                </div>


                <h6 class="card card-heading bg-primary text-center py-1 rounded"style="color:white;">Leave Details</h6>



             <div class="form-row my-3 px-3">
                    <div class="col">
                        <label for="">Leave type</label>
                        <select name="type" class="form-control" id=""required>
                            <option value="">Choose Type</option>
                            <option value="Annual Leave">Annual Leave</option>
                            <option value="Sick/Casual Leave">Sick/Casual Leave</option>
                            <option value="Compassionate Leave">Compassionate Leave</option>
                            <option value="Maternity Leave">Maternity Leave</option>
                            <option value="Paternity Leave">Paternity Leave</option>
                        </select>
                    </div>
                    <div class="col">
                    <label for="">No. of applicable leave days </label>
                    <input type="number" class="form-control"name="applicable_days"required>
                    </div>
                </div>




                <div class="form-row my-3 px-3">

                <div class="col">
                    <label for="">No. of days requested </label>
                    <input type="number" class="form-control"name="requested_days"required>
                    </div>
                    <div class="col">

                        <label for="">Start Date</label>
                        <input type="date" class="form-control"name="start"required>
                        
                    </div>


                    <div class="col">

                        <label for="">End Date</label>
                        <input type="date" class="form-control"name="end"required>
                        
                    </div>
                    
                </div>



                <br>
 

                <div class="text-center py-4">
                    <button class="col-md-6 btn btn-primary text-light text-center">Submit Application</button>
                </div>


         


         </form>

           
      </div>
      
    </div>
  </div>
</div>

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






         <!-- Edit Client Modal-->
         <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                       {{Auth::user()->office}} Client
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('admin.client.edit.post')}}"method="POST">
                        @csrf 
                        {{method_field('PUT')}}

                        <input type="hidden"name="id"class="client_id_edit"required>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"name="name"class="client_name_edit form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email"name="email"class="client_email_edit form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"name="password"class="client_password_edit form-control"required>
                        </div>


                      

                        <div class="form-group">
                            <label for="phone">Official Phone</label>
                            <input type="tel"name="phone"class="client_phone_edit form-control"required>
                        </div>

                     

                       

                        <div class="form-group">
                            <label for="description">Job Description</label>

                           <input type="text"name="description"class="form-control client_description_edit"style="height:100px;"required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success text-center">Update Client Details</button>
                        </div>
                    </form>
               
                    
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>



 <!-- Email Client Modal-->
 <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                       {{Auth::user()->office}} Client
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="#"method="POST">
                        @csrf 
                       

                        <input type="hidden"name="id"class="client_id_email"required>

                     

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email"name="email"class="client_email_email form-control"required>
                        </div>

                       

                        <div class="form-group">
                            <label for="attachment">Add Attachment</label>
                            <input type="file"name="attachment"class=" form-control"required>
                        </div>

                     

                       

                        

                        <div class="form-group">
                            <button class="btn btn-success text-center">Email Client</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this Client?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Confirm you want to delete  <span class="branch_name_delete"></span></div>
                <form action="{{route('admin.client.delete.post')}}"method="POST">
                        @csrf 
                        {{method_field('DELETE')}}

                        <input type="hidden"name="id"class="branch_delete form-control">
                        <button class="btn btn-danger">Delete Client</button>
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






</body>

</html>