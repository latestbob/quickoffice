<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Admin  - {{$project->title}}</title>

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
                        <h1 id="project_title" class="h3 mb-0 text-gray-800">{{$project->title}}</h1>


                        <button type="button"data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Create A Task</button>
                        
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
                      
                            <!--Total expense and total payments received-->

                            <!-- Content Row -->
                     <div class="row">



</div>




                        <hr class="text-dark">


                        <div class="card shadow expenses mb-4"id="expenses">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Project Tasks/Activities</h6>
                        </div>
                       
                        <div class="card-body">
                            <!-- <div><a href="#received"class="btn-sm btn-secondary text-light font-weight-bold">Go to Received Payments</a></div>
                            <div class="text-right">
                                <button class="btn-sm btn-primary">Export to Excel</button>
                            </div> -->

                            <div class="table-responsive">

                                <table class="table table-borderless table-striped table-hover">

                                <thead style="color:white;font-size:13px;z-index:100;" class="bg-primary text-light">
                                    <tr>
                                        <th>Task/Activities</th>
                                        <th class="text-center">Completion Status (%)</th>
                                        <th>Responsible Party</th>
                                        <th>Start Date</th>
                                        <th>Expected End Date</th>
                                        <th>Actual End Date</th>
                                        <th>Stage</th>
                                        <th></th>
                                        <th>Action</th>
                                    </tr>

</thead>


            <tbody style="font-size:13px;z-index:100;color:#1A191A;" >

                @foreach($milestone as $mile)

                        <tr>
                        <td colspan="2"class="text-primary font-weight-bold">{{ $mile->name }}</td>
                        <td> </td>

                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                      
                        <td colspan="3" class=""><a  type="button" data-toggle="modal" data-target="#statusModal{{ $mile->id}}"class="text-light px-2 py-1 rounded bg-primary"style="font-size:12px;text-decoration:none;">Update</a></td>
                    </tr>

                    <!-- Milestone status Modal -->
                        <div class="modal fade" id="statusModal{{ $mile->id }}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel{{ $mile->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"style="color:black;font-size:18px;">{{$mile->name}} 

                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 @php

                                $tasks = \App\ProjectTask::where(['milestone' => $mile->name])->get();

                                @endphp
                                <div class="d-sm-flex align-items-center justify-content-between mb-2">

                                    <p class="font-weight-600 text-primary"style="">Select all task in this milestone</p>

                                    <input class="text-primary controltwo" type="checkbox"id="">

                                </div>

                                <form action="{{route('updatetaskstatus')}}"method="POST">
                                    @csrf
                                    {{method_field('PUT')}}

                                    <input type="hidden"name="project"value="{{$project->title}}">

                                    <input type="hidden"name="milestone"value="{{$mile->name}}">

                                @foreach($tasks as $t)

                                <div class="d-sm-flex align-items-center justify-content-between mb-2">

                                    <p class="font-weight-600"style="color:black;">{{$t->title}}</p>


                                    @if($t->status != 'done')

                                    <input type="checkbox"name="tasks[]"class="controlledtwo" value="{{ $t->title }}">


                                    @else

                                   
                                        
                                            <a href="{{route('updatetaskreverse',$t->id)}}" class="badge badge-danger border-0">Reverse</a>
                                            
                                       

                                    @endif
                                </div>




                                @endforeach

                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
</form>
                            </div>
                            
                            </div>
                        </div>
                        </div>


                  

                    @php

                    $tasks = \App\ProjectTask::where(['milestone' => $mile->name])->get();

                    @endphp
                    @foreach ($tasks as $task)
                        <tr>
                            
                            <td>{{ $task->title }}</td>
                            <td class="text-center">{{ $task->percentage }}</td>
                            <td>{{ $task->responsible }}</td>
                            <td>
                            @php
                                                $dateStart = $task->start;
                                                $formattedStart = \Carbon\Carbon::parse($dateStart)->format('d/m/Y');
                                            @endphp

                                            {{$formattedStart}}
                            </td>
                            <td>
                            @php
                                                $dateEnd = $task->end;
                                                $formattedEnd = \Carbon\Carbon::parse($dateEnd)->format('d/m/Y');
                                            @endphp

                                            {{$formattedEnd}}
                            </td>
                            <td>{{$task->actual_date}}</td>
                            <td>
                                @if($task->status == 'done')

                                    <p class="badge badge-success text-light">Completed</p>

                                    @else
                                    <p class="badge badge-warning text-dark">In Progress</p>

                                @endif
                            </td>

                                <td></td>
                            <td>
                               

                                <i type="button"data-toggle="modal" data-target="#exampleModal{{$task->id}}" class="fa fa-edit text-warning"></i><i type="button"data-toggle="modal" data-target="#deleteModal{{$task->id}}" class="fa fa-trash text-danger"></i><i class="fa fa-clone text-primary"type="button"data-toggle="modal" data-target="#cloneModal{{$task->id}}" ></i>

                                
                            </td>
                        </tr>



    <!-- delete Modal-->
    <div class="modal fade" id="deleteModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$task->id}}"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{$task->id}}"style="color:black;font-size:18px;">Are you sure you want to delete {{$task->title}}?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Click the delete button if you want to delete this task.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                    <form action="{{route('deleteprojecttask')}}"method="POST">

                        @csrf 
                        {{method_field('DELETE')}}
                        <input type="hidden"name="id"value="{{$task->id}}">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<!-- Edit Modal -->
                    <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$task->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{$task->id}}"style="color:black;">Edit -  {{$task->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{route('updateprojecttask')}}"method="POST">
            {{method_field('PUT')}}
            @csrf

            <div class="form-group row">
                <div class="col">
                        <label for="">Milestone</label>

                        <select name="milestone"class="form-control" required>
                        @foreach ($milestone as $stone)
                            <option value="{{ $stone->name }}" {{ $stone->name == $task->milestone ? 'selected' : '' }}>
                                {{ $stone->name }}
                            </option>
                        @endforeach
                        </select>
                </div>


                <div class="col">
                        <label for="">% Completion</label>

                        <input type="number"name="percentage"value="{{ $task->percentage ?? '' }}"placeholder="Do not include the % symbol"class="form-control">
                </div>

                
            </div>


           

            <div class="form-row">
                <div class="col">
                <label for="">Title</label>
                <textarea name="title"class="form-control" id="" cols="5" rows="3"required>{{$task->title}}</textarea>
                </div>

                <div class="col">
                <label for="">Output</label>
                <textarea name="output"class="form-control" id="" cols="5" rows="3">{{$task->output}}</textarea>
                </div>


            </div>

                    <input type="hidden"name="id"value="{{$task->id}}" >

              


            <div class="form-group row mt-2">
                <div class="col">
                        <label for="">Start Date</label>

                        <input type="date"name="start"value="{{$task->start}}"class="form-control"required>
                </div>

                <div class="col">
                        <label for="">Expected End Date</label>

                        <input type="date"name="end"value="{{$task->end}}"class="form-control"required>
                </div>

                <div class="col">
                        <label for="">Actual End Date </label>

                        <!-- <input type="date"name="actual_date"value="{{$task->actual_date}}"class="form-control"required> -->

                        <input type="date" name="actual_date" value="{{ date('dd-mm-yyyy', strtotime($task->actual_date)) }}" class="form-control">
                </div>
            </div>

            

<hr>
            <div class="form-group">
                <label for="">Responsible Parties <span class="text-primary small px-2"><input type="checkbox"id="controlCheckbox"class="px-2">Check All</span></label>

                <div class="row">
                    @foreach($members as $mem)

                    <div class="col-md-4">
                            <!-- <label class="text-primary small">
                                <input class="controlledCheckbox" type="checkbox" name="members[]" value="{{ $mem->name }}">
                                {{ $mem->name }}
                            </label> -->


                            <label class="text-primary small">
                <input class="controlledCheckbox" type="checkbox" name="members[]" value="{{ $mem->name }}" 
                    {{ in_array($mem->name, explode(', ', $task->responsible)) ? 'checked' : '' }}>
                {{ $mem->name }}
            </label>



                        </div>

                    @endforeach
                </div>
            </div>


            
<hr>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success text-center">Update Task</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
               


<!-- End of Edit Modal -->


<!-- Clone Modal -->
<div class="modal fade" id="cloneModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="cloneModalLabel{{$task->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cloneModalLabel{{$task->id}}"style="color:black;">Duplicate -  {{$task->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{route('addprojectask')}}"method="POST">
            
            @csrf

            <div class="form-group row">
                <div class="col">
                        <label for="">Milestone</label>

                        <select name="milestone"class="form-control" required>
                        @foreach ($milestone as $stone)
                            <option value="{{ $stone->name }}" {{ $stone->name == $task->milestone ? 'selected' : '' }}>
                                {{ $stone->name }}
                            </option>
                        @endforeach
                        </select>
                </div>

                
            </div>


           

            <div class="form-row">
                <div class="col">
                <label for="">Title</label>
                <textarea name="title"class="form-control" id="" cols="5" rows="3"required>{{$task->title}}</textarea>
                </div>

                <div class="col">
                <label for="">Output</label>
                <textarea name="output"class="form-control" id="" cols="5" rows="3">{{$task->output}}</textarea>
                </div>


            </div>

                    <!-- <input type="hidden"name="id"value="{{$task->id}}" > -->

                    <input type="hidden"name="project"value="{{$project->title}}" >

<input type="hidden"name="team"value="{{$project->team}}" >

              


            <div class="form-group row mt-2">
                <div class="col">
                        <label for="">Start Date</label>

                        <input type="date"name="start"value="{{$task->start}}"class="form-control"required>
                </div>

                <div class="col">
                        <label for="">Expected End Date</label>

                        <input type="date"name="end"value="{{$task->end}}"class="form-control"required>
                </div>
            </div>

<hr>
            <div class="form-group">
                <label for="">Responsible Parties <span class="text-primary small px-2"><input type="checkbox"id="controlCheckbox"class="px-2">Check All</span></label>

                <div class="row">
                    @foreach($members as $mem)

                    <div class="col-md-4">
                           

                            <label class="text-primary small">
                <input class="controlledCheckbox" type="checkbox" name="members[]" value="{{ $mem->name }}" 
                    {{ in_array($mem->name, explode(', ', $task->responsible)) ? 'checked' : '' }}>
                {{ $mem->name }}
            </label>
                        </div>

                    @endforeach
                </div>

                
            </div>


            
<hr>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success text-center">Add New Task</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>


<!-- End of Clone Modal -->
                    @endforeach



                @endforeach
                

            

            

            </tbody>

</table>
                            </div>
                            
                        </div>
                    </div>

                


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"style="color:black;">Create A New  Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{route('addprojectask')}}"method="POST">
            @csrf

            <div class="form-group row">
                <div class="col">
                        <label for="">Milestone</label>

                        <select name="milestone"class="form-control" id="teams"required>
                            <option value="">Select Milestone</option>
                        </select>
                </div>

                <div class="col">
                       

                        <!-- <p class="mt-1">Can't find team ? click <a href="">Here </a> to create team</p> -->
                        <p class="mt-4">
                            <a class="btn text-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Click to create  new milestone
                            </a>
                            
                        </p>
                        
                             

                </div>
            </div>

            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                <div class="form-row">
                                <div class="col-7">
                                <input id="name" type="text" class="form-control" placeholder="Enter Milestone">
                                </div>
                                <div class="col">
                                <button id="createBtn" class="btn btn-success btn-sm">Create</button>
                                </div>

                                </div>
                                </div>
                            </div>

           

            <div class="form-row">
                <div class="col">
                <label for="">Title</label>
                <textarea name="title"class="form-control" id="" cols="5" rows="3"required></textarea>
                </div>

                <div class="col">
                <label for="">Output</label>
                <textarea name="output"class="form-control" id="" cols="5" rows="3"></textarea>
                </div>


            </div>

                    <input type="hidden"name="project"value="{{$project->title}}" >

                    <input type="hidden"name="team"value="{{$project->team}}" >


            <div class="form-group row mt-2">
                <div class="col">
                        <label for="">Start Date</label>

                        <input type="date"min="{{ $project->start_date }}"max="{{ $project->end_date }}"name="start"class="form-control"required>
                </div>

                <div class="col">
                        <label for="">Expected End Date</label>

                        <input type="date"name="end"min="{{ $project->start_date }}"max="{{ $project->end_date }}"class="form-control"required>
                </div>
            </div>

<hr>
            <div class="form-group">
                <label for="">Responsible Parties <span class="text-primary small px-2"><input type="checkbox"id="controlCheckbox"class="px-2">Check All</span></label>

                <div class="row">
                    @foreach($members as $mem)

                    <div class="col-md-4">
                            <label class="text-primary small">
                                <input class="controlledCheckbox" type="checkbox" name="members[]" value="{{ $mem->name }}">
                                {{ $mem->name }}
                            </label>
                        </div>

                    @endforeach
                </div>
            </div>


            
<hr>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success text-center">Add New Task</button>
            </div>
        </form>
      </div>
     
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


<script>
     $(document).ready(function(){

        var title =  $('#project_title').text();

      


      $('#createBtn').click(function(){
         
            // Check if control checkbox is checked
            var name = $('#name').val();

            
            if(name == ''){
                alert('Milestone is required');
            }

            else{

    

            $.ajax({
            url: '/project/milestone',
            type: 'POST',
            data: {name:name,
                project:title,
                _token: '{{ csrf_token() }}'
            
            },
            success: function(response) {
                fetchTeams();
                 // Fetch teams again after creating a new one
                // Optionally, close the modal or display a success message
                $('#name').val('')
                alert(response);


            },
            error: function(xhr, status, error) {
                // Handle error (e.g., display validation errors)
                console.error("Error:", error);
            }
        });


        }

        });



        function fetchTeams() {
                $.get("/get/milestone/" + title, function(data) {
                    // Clear previous options
                    $('#teams').empty();

                    // Append each team as an option
                    data.forEach(function(team) {
                        $('#teams').append('<option value="' + team.name + '">' + team.name + '</option>');
                    });
                });
    }

    fetchTeams();


    


        // When control checkbox is checked/unchecked
        $('#controlCheckbox').change(function(){
            // Check if control checkbox is checked
            if($(this).is(":checked")){
                // Check all controlled checkboxes
                $('.controlledCheckbox').prop('checked', true);
            } else {
                // Uncheck all controlled checkboxes
                $('.controlledCheckbox').prop('checked', false);
            }
        });


         // When control checkbox is checked/unchecked
         $('.controltwo').change(function(){
            // Check if control checkbox is checked
            var modal = $(this).closest('.modal');
    // Check or uncheck all controlled checkboxes related to this control checkbox
    modal.find('.controlledtwo').prop('checked', $(this).prop('checked'));
        });
    });
</script>



</body>

</html>