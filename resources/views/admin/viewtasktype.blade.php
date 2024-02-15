<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Admin - Tasks {{$task}}</title>

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

                           

                            

                         </div>

                         
                        
                         <!-- End of column-->

                       
                    </div>

                    

                </div>
                <div class="row">

                <div class="card-header py-3 m-auto">
                                    <h6 class="m-0 font-weight-bold text-primary">My {{$task}} Tasks</h6>
                </div>

               


                <div class="container m-auto table-responsive">

                <table class="table table-sm table-borderless table-hover">
    <thead class="bg-primary text-light">
<tr>
<th>Business</th>

<th>Activity/Task</th>

<th>Output</th>
<th>Due Date</th>

<th>Status</th>
<th>Actions</th>


</tr>
</thead>

<tbody style="color:black;font-size:13px;z-index:100;">

@foreach($taskss as $work)
<tr>
<td>{{$work->business}}</td>

<td>{{$work->task}}</td>
<td>{{$work->output}}</td>
<td>{{\Carbon\Carbon::parse($work->due_date)->format('d/m/Y')}}</td>

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
    <i data-toggle="modal" data-target="#viewModal{{$work->id}}"class="fa fa-eye mr-2 text-primary viewmodal"></i>|<i data-toggle="modal" data-target="#editModal{{$work->id}}"class="fa fa-edit mr-2 text-warning editmodal"></i>
</td>

@endif



</tr>


<div class="modal fade" id="viewModal{{$work->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <div class="modal-body"style="color:black;font-size:13px;">

                   <div class="form-group">
                       <p>Business - {{$work->business}}</p>
                   </div>

                   <div class="form-group">
                       <p>Arm - {{$work->arm}}</p>
                   </div>


                   <div class="form-group">
                       <p>Activity/Task - {{$work->task}}</p>
                   </div>

                   <div class="form-group">
                       <p> Output - {{$work->output}}</p>
                   </div>


                   <div class="form-group">
                       <p>Due Date - {{$work->due_date}}</p>
                   </div>


                   <div class="form-group">
                       <p>Status - {{$work->status}}</p>
                   </div>


                   <div class="form-group">
                       <p>Comment - {{$work->comment}}</p>
                   </div>


                   
                      
                            
                        
                            
                                   
                                    

                                    
                              
                        
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>




<div class="modal fade" id="editModal{{$work->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title task_title_edit" id="exampleModalLabel">
                      Update {{$work->task}}
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                   
                <form action="{{route('updateactivity')}}"method="POST">
                    {{method_field('PUT')}}
                                        @csrf


                                        

                                                <input type="hidden"value="{{$work->id}}"name="id">


                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="">Business</label>
                                                <select name="business"class="form-control" id=""required>
                                                        
                                                    <option value="Lauren Parker"{{ $work->business == 'Lauren Parker' ? 'selected' : '' }}>Lauren Parker</option>
                                                    
                                                        <option value="Asknello"{{ $work->business == 'Asknello' ? 'selected' : '' }}>Asknello</option>
                                                        <option value="Famacare"{{ $work->business == 'Famacare' ? 'selected' : '' }}>Famacare</option>
                                                        <option value="Skinns"{{ $work->business == 'Skinns' ? 'selected' : '' }}>Skinns</option>
                                                        <option value="Vells"{{ $work->business == 'Vells' ? 'selected' : '' }}>Vells</option>
                                                        <option value="OWC"{{ $work->business == 'OWC' ? 'selected' : '' }}>OWC</option>
                                                        
                                                        <option value="Quick Office"{{ $work->business == 'Quick Office' ? 'selected' : '' }}>Quick Office</option>



                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Business Arm</label>
                                                <input name="arm" type="text"class="form-control"value="{{Auth::user()->branch}}"readonly>
                                             
                                            </div>
                                        </div>

                                       
                                    <hr>
                                    <div class="card-header m-auto py-3">
              


                                    <div class="form-group row ">
                                        <div class="col-md-6">
                                            <label for="category">Activity/Task</label>
                                               
                                            <textarea name="task" id="" cols="30"class="form-control" rows="3"required>{{$work->task}}</textarea>

                                        </div>

                                        <div class="col-md-6 ">
                                            <label for="category">Output</label>
                                            <textarea name="output" id="" cols="30"class="form-control"value="{{$work->output}}"  rows="3"required>{{$work->output}}</textarea>
                                        </div>

                                        
                                            
                                    </div>

                                   

                                    <hr>
                                    <div class="card-header m-auto py-3">
                                    

                                    <div class="form-group row">
                                      
                                           <div class="col-md-6">
                                           <label for="supervisor">Due Date</label>
                                            
                                            <input id="dateInput" type="date"class="form-control"value="{{$work->due_date}}" name="due_date"required>
                                           </div>

                                           <div class="col-md-6">
                                           <label for="description">Status</label>

<select name="status"class="form-control" id=""required>
                
                <option value="pending"{{ $work->status == 'pending' ? 'selected' : '' }}>Pending</option>
                
                <option value="completed"{{ $work->status == 'completed' ? 'selected' : '' }}>Completed</option>

                <option value="overdue"{{ $work->status == 'overdue' ? 'selected' : '' }}>Overdue</option>



            </select>
                                           </div>
                                      
                                    </div>

                                    <!-- <input type="week"class="form-control"name="week"required> -->


                                    <hr>
                                    <div class="form-group">
                                        <label for="description">Comments(optional)</label>

                                        <textarea name="comment" id=""class="form-control" cols="10" rows="3">{{$work->comment}}</textarea>
                                    </div>

                                    
                                    <hr>

                                    





                               

                                    <!-- <div class="form-group">
                                        <label for="file">Attachements (Optional)</label> <br>
                            
                                        <input type="file"name="fileattachment"placeholder="Enter Attachments">
                                    </div> -->

                                </div>

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Update Task</button>
                                    </div>
                              
                                    </form>
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
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







</body>

</html>