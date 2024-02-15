<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Staff - Tasks</title>

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

.notshow{
    display:none;
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
<div class="col-xl-4  text-light col-md-6 mb-4">
    <a href="{{route('staff.view.specific.task.type','overdue')}}">
    <div class="card bg-danger  shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                      OVER DUE TASKS</div>
                    <div class="h5 mb-0 font-weight-bold text-ligh">
                 

               

              

                   <div class="h5 mb-0 font-weight-bold "style="color:white;">
                   {{ \App\Activity::where(['obligated' => Auth::user()->name])->where(['status' => 'overdue'])->count() }}
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
<div class="col-xl-4 col-md-6 mb-4">
   <a href="{{route('staff.view.specific.task.type','pending')}}">
   <div class="card bg-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        PENDING TASKS</div>
                    <div class="h5 mb-0 font-weight-bold text-dark">
                    {{ \App\Activity::where(['obligated' => Auth::user()->name])
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
<div class="col-xl-4 col-md-6 mb-4">
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
                            {{ \App\Activity::where(['obligated' => Auth::user()->name])->where(['status' => 'completed'])->count() }}
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



</div>

<!-- Content Row -->


                   
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
      <form action="{{route('addweeklytask')}}"method="POST"enctype="multipart/form-data">
                                        @csrf

                                        @if(Auth::user()->branch != "Project Management")
                                        <div class="form-group row">
                                            <div class="col-md-6">

                                           
                                                <label for="">Business</label>
                                                <select name="business"class="form-control" id=""required>
                                                        
                                                    <option value="Lauren Parker">Lauren Parker</option>
                                                    
                                                        <option value="Asknello">Asknello</option>
                                                        <option value="Famacare">Famacare</option>
                                                        <option value="Skinns">Skinns</option>
                                                        <option value="Vells">Vells</option>
                                                 
                                                        
                                                        <option value="Quick Office">Quick Office</option>



                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Business Arm</label>
                                                <input name="arm" type="text"class="form-control"value="{{Auth::user()->branch}}"readonly>
                                             
                                            </div>
                                        </div>

                                        @else

                                        <div class="row form-group px-3">
                                        <input name="business" type="hidden"class="form-control"value="Lauren Parker">
                                        <input name="arm" type="hidden"class="form-control"value="{{Auth::user()->branch}}">
                                        <input type="text"name="project"placeholder="Product Name"class="form-control"required>

                                        </div>



                                        @endif

                                       
                                    <hr>
                                    <div class="card-header m-auto py-3">
              


                                    <div class="form-group row ">
                                        <div class="col-md-6">
                                            <label for="category">Activity/Task</label>
                                               
                                            <textarea name="task" id="" cols="30"class="form-control" rows="3"required></textarea>

                                        </div>

                                        <div class="col-md-6 ">
                                            <label for="category">Output</label>
                                            <textarea name="output" id="" cols="30"class="form-control" rows="3"required></textarea>
                                        </div>

                                        
                                            
                                    </div>

                                   

                                    <hr>
                                    <div class="card-header m-auto py-3">
                                    

                                    <div class="form-group row">
                                      
                                            <label for="supervisor">Due Date</label>
                                            
                                            <input id="dateInput" type="date"class="form-control"name="due_date"required>
                                      
                                    </div>

                                    <!-- <input type="week"class="form-control"name="week"required> -->


                                    <hr>
                                    <!-- <div class="form-group">
                                        <label for="description">Comments(optional)</label>

                                        <textarea name="comment" id=""class="form-control" cols="10" rows="5"required></textarea>
                                    </div> -->


                               

                                    <!-- <div class="form-group">
                                        <label for="file">Attachements (Optional)</label> <br>
                            
                                        <input type="file"name="fileattachment"placeholder="Enter Attachments">
                                    </div> -->

                                </div>

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Create Task</button>
                                    </div>
                              
                                    </form>
      </div>
      
    </div>
  </div>
</div>

                            

                         </div>

                         
                        
                         <!-- End of column-->

                       
                    </div>

                    

                </div>
                

            </div>
            <!-- End of Main Content -->


            <div class="row m-auto table-responsive">

<table class="table table-sm table-borderless table-hover">
    <thead class="bg-primary text-light">
<tr>

@if(Auth::user()->branch != "Project Management")
<th>Business</th>

@else
<th>Project Name</th>

@endif

<th>Activity/Task</th>

<th>Output</th>
<th>Due Date</th>

<th>Status</th>
<th>Actions</th>


</tr>
</thead>

<tbody style="color:black;font-size:13px;z-index:100;">

@foreach($task as $work)
<tr>
@if(Auth::user()->branch != "Project Management")
<td>{{$work->business}}</td>

@else
<td>{{$work->project}}</td>

@endif

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
    <i data-id="{{$work->id}}"data-toggle="modal" data-target="#viewModal"class="fa fa-eye mr-2 text-primary viewmodal"></i>|<i data-toggle="modal" data-target="#editModal{{$work->id}}"class="fa fa-edit mr-2 text-warning editmodal"></i>
</td>

@endif



</tr>


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

                                        @if(Auth::user()->branch != "Project Management")
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

                                        @else

                                        <div class="form-group row px-3">
                                        <input name="business" type="hidden"class="form-control"value="{{$work->business}}">
                                        <input name="arm" type="hidden"class="form-control"value="{{$work->arm}}">
                                        <input name="project" type="text"class="form-control"value="{{$work->project}}">


                                        </div>

                                        @endif

                                       
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

{{ $task->links() }}

           

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
                                        <td>Business</td>
                                        <td class="task_business">name</td>

                                    </tr>

                                    <tr>
                                        <td> Business Arm</td>
                                        <td class="task_arm">location</td>

                                    </tr>

                                  

                                    <tr>
                                        <td> Activity/Task</td>
                                        <td class="task_task" >branch</td>

                                    </tr>
                                      
                                    <tr>
                                        <td>Output</td>
                                        <td class="task_output" >branch</td>
                                    </tr>

                                    

                                  

                                    <tr>
                                        <td>Due Date</td>
                                        <td class="task_due"></td>
                                    </tr>


                                    <tr>
                                        <td>Comment</td>
                                        <td class="task_comment"></td>
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
                      Update Task
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                   
                <form action=""method="POST">
                    {{method_field('PUT')}}
                                        @csrf

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="">Business</label>
                                                <select name="business"class="form-control" id=""required>
                                                        
                                                    <option value="Lauren Parker">Lauren Parker</option>
                                                    
                                                        <option value="Asknello">Asknello</option>
                                                        <option value="Famacare">Famacare</option>
                                                        <option value="Skinns">Skinns</option>
                                                        <option value="Vells">Vells</option>
                                                      
                                                        
                                                        <option value="Quick Office">Quick Office</option>



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
                                               
                                            <textarea name="task" id="" cols="30"class="form-control" rows="3"required></textarea>

                                        </div>

                                        <div class="col-md-6 ">
                                            <label for="category">Output</label>
                                            <textarea name="output" id="" cols="30"class="form-control" rows="3"required></textarea>
                                        </div>

                                        
                                            
                                    </div>

                                   

                                    <hr>
                                    <div class="card-header m-auto py-3">
                                    

                                    <div class="form-group row">
                                      
                                            <label for="supervisor">Due Date</label>
                                            
                                            <input id="dateInput" type="date"class="form-control"name="due_date"required>
                                      
                                    </div>

                                    <!-- <input type="week"class="form-control"name="week"required> -->


                                    <hr>
                                    <!-- <div class="form-group">
                                        <label for="description">Comments(optional)</label>

                                        <textarea name="comment" id=""class="form-control" cols="10" rows="5"required></textarea>
                                    </div> -->


                               

                                    <!-- <div class="form-group">
                                        <label for="file">Attachements (Optional)</label> <br>
                            
                                        <input type="file"name="fileattachment"placeholder="Enter Attachments">
                                    </div> -->

                                </div>

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Create Task</button>
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
                <form action="{{route('staff.delete.taskdelete')}}"method="POST">
                        @csrf 
                        {{method_field('DELETE')}}

                        <input type="hidden"name="id"class="task_id_delete form-control">
                        <button class="btn btn-danger">Delete Task</button>
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
            let task_business, task_arm, task_task, task_output, task_due, task_comment, task_status
            task_business= document.querySelector('.task_business')
            task_arm = document.querySelector('.task_arm')
            task_task = document.querySelector('.task_task')
            task_output = document.querySelector('.task_output')
            task_due = document.querySelector('.task_due')
            task_comment = document.querySelector('.task_comment');
          
            task_status = document.querySelector('.task_status');
            


          

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    task_business.innerText  = data.business
                    task_arm.innerText  = data.arm
                    task_task.innerText  = data.task
                    task_output.innerText  = data.output
                    task_due.innerText  = data.due_date
                    task_comment.innerText = data.comment
                  
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
        getTask('/tasks/', _id)

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
        editTask('/tasks/edit/', _id)

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
        deleteTask('/tasks/delete/', _id)

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
    // Set the minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('dateInput').setAttribute('min', today);
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