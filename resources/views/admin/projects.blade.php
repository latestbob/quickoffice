<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Admin - Projects</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Projects</h1>


                        <button type="button"data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">CREATE NEW PROJECT</button>
                        
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

<!-- Earnings (Monthly) Card Example -->
<!-- <div class="col-xl-6  text-light col-md-6 mb-4">
    <div class="card bg-danger  shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                      TOTAL EXPENSES MADE</div>
                    <div class="h5 mb-0 font-weight-bold text-ligh">


               

                    ₦ {{\App\Expense::where('office',Auth::user()->office)->sum('amount')}}
                    </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-money-bill-alt fa-lg"style=""></i>
                </div>
            </div>
        </div>
    </div>
</div> -->


<!-- Earnings (Monthly) Card Example -->
<!-- <div class="col-xl-6 col-md-6 mb-4">
    <div class="card bg-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">TOTAL PAYMENTS RECEIVED
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-light">
                            ₦ {{\App\Receivedpay::where('office',Auth::user()->office)->sum('amount')}}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-auto">
                <i class="fas fa-receipt fa-lg text-light"></i>
                </div>

                
            </div>
        </div>
    </div>
</div> -->


</div>




                        <hr class="text-dark">


                        <div class="card shadow expenses mb-4"id="expenses">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
                        </div>
                       
                        <div class="card-body">
                            <!-- <div><a href="#received"class="btn-sm btn-secondary text-light font-weight-bold">Go to Received Payments</a></div>
                            <div class="text-right">
                                <button class="btn-sm btn-primary">Export to Excel</button>
                            </div> -->
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead style="color:white;font-size:14px;z-index:100;" class="bg-primary text-light">



                                <!-- $table->string('title');
            
            $table->string('team')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->integer('percentage_status')->nullable();
            $table->string('status')->nullable();
            $table->string('stage')->nullable();
            $table->string('manager')->nullable(); -->
                                    <tr>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>Expected End Date</th>
                                        <th>Completion Status (%)</th>
                                        <th>Team</th>
                                        <th>Manager</th>
                                        
                                        <th>Action</th>
                                    </tr>

                                    </thead>

                                    
                                    <tbody style="color:black;font-size:13px;z-index:100;">
                                       
                                       @foreach($project as $projects)

                                       <tr>
                                           <td>{{$projects->title}}</td>
                                           <td>
                                           @php
                                                $dateStart = $projects->start_date;
                                                $formattedStart = \Carbon\Carbon::parse($dateStart)->format('d/m/Y');
                                            @endphp

                                            {{$formattedStart}}
                                           </td>
                                           <td>
                                           @php
                                                $dateEnd = $projects->end_date;
                                                $formattedEnd = \Carbon\Carbon::parse($dateEnd)->format('d/m/Y');
                                            @endphp

                                            {{$formattedEnd}}

                                           </td>
                                           <td class="text-center">{{ round(\App\ProjectTask::where(['project' => $projects->title])->avg('percentage')) }}</td>
                                           <td>{{$projects->team}}</td>
                                           <td>{{$projects->manager}}</td>
                                           <td>

                                           <a href="{{route('uniqueproject',$projects->id)}}"class="btn btn-info btn-sm">View More</a>|  <a type="button"data-toggle="modal" data-target="#exampleModal{{$projects->id}}"class="btn btn-warning text-dark btn-sm">Edit</a>| <a type="button"data-toggle="modal" data-target="#shareModal{{$projects->id}}"class="btn btn-sm btn-primary">Share</a>
                                           </td>

                                           


                                       </tr>


                                       <!-- Share Modal -->
<div class="modal fade" id="shareModal{{$projects->id}}" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel{{$projects->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shareModalLabel{{$projects->id}}"style="color:black;">{{$projects->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row m-auto">
                <div class="col-7">

                    <input type="text" class="form-control myInput"value="https://office.laurenparkerway.com/projects/{{$projects->urlstring}}"readonly >
                </div>

                <div class="col">
                    <a href="" class="btn btn-sm btn-primary mt-1 copyButton">Copy Url</a>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

                                       <div class="modal fade" id="exampleModal{{$projects->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$projects->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{$projects->id}}"style="color:black;">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{route('updateproject')}}"method="POST">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <label for="">Title</label>

                <input type="text"name="title"value="{{$projects->title}}"class="form-control"required>

            </div>


            <input type="hidden"name="id"value="{{$projects->id}}">

            <div class="form-group row">
                <div class="col">
                        <label for="">Start Date</label>

                        <input type="date"name="start"value="{{$projects->start_date}}"class="form-control"required>
                </div>

                <div class="col">
                        <label for="">Expected End Date</label>

                        <input type="date"name="end"value="{{$projects->end_date}}"class="form-control"required>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-md-6">
                        <label for="">Team</label>

                        <select name="team"class="form-control" id="teamstwo"required>
                            @foreach($team as $teams)
                          
                            <option value="{{$teams->name}}" {{ $teams->name == $projects->team ? 'selected' : '' }}>
                            {{$teams->name}}
                            </option>

                            @endforeach
                        </select>
                </div>

         
            </div>


            <div class="form-group text-center">
                <button type="submit" class="btn btn-success text-center">Update Project</button>
            </div>
        </form>
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

                


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"style="color:black;">Create A New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{route('createproject')}}"method="POST">
            @csrf

            <div class="form-group">
                <label for="">Title</label>

                <input type="text"name="title"class="form-control"required>

            </div>

            <div class="form-group row">
                <div class="col">
                        <label for="">Start Date</label>

                        <input type="date"name="start"class="form-control"required>
                </div>

                <div class="col">
                        <label for="">Expected End Date</label>

                        <input type="date"name="end"class="form-control"required>
                </div>
            </div>


            <div class="form-group row">
                <div class="col">
                        <label for="">Team</label>

                        <select name="team"class="form-control" id="teams"required>
                            <option value="">Choose A Team</option>
                        </select>
                </div>

                <div class="col">
                        <label for=""style="visibility:hidden;">Can't find team ? click <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Here </a> to create team</label>

                        <!-- <p class="mt-1">Can't find team ? click <a href="">Here </a> to create team</p> -->
                        <p>
  <a class="btn text-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Click to create new team
  </a>
  
</p>
                        
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <div class="form-row">
                                <div class="col-7">
      <input id="name" type="text" class="form-control" placeholder="Team Name">
    </div>
    <div class="col">
      <button id="createBtn" class="btn btn-success btn-sm">Create</button>
    </div>

                                </div>
                            </div>
                            </div>

                </div>
            </div>


            <div class="form-group text-center">
                <button type="submit" class="btn btn-success text-center">Create A Project</button>
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
     $('#createBtn').click(function(e) {
        e.preventDefault();


        var name = $('#name').val();

        if(name == ''){
            alert('Team name is required');
        }

        else{

            $.ajax({
            url: '/create/team',
            type: 'POST',
            data: {name:name,
                _token: '{{ csrf_token() }}'
            
            },
            success: function(response) {
                fetchTeams(); // Fetch teams again after creating a new one
                // Optionally, close the modal or display a success message
                $('#name').val('')
                alert('Team Created Successfully');


            },
            error: function(xhr, status, error) {
                // Handle error (e.g., display validation errors)
                console.error("Error:", error);
            }
        });


        }

        
        
    });


    function fetchTeams() {
        $.get("{{ route('getteams') }}", function(data) {
            // Clear previous options
            $('#teams').empty();

            // Append each team as an option
            data.forEach(function(team) {
                $('#teams').append('<option value="' + team.name + '">' + team.name + '</option>');
            });
        });
    }

    // Fetch teams when modal is opened
    $('#exampleModal').on('shown.bs.modal', function() {
        fetchTeams();
    });
</script>

<script>
    //get options from team
    function fetchTeamsTwo() {
        $.get("{{ route('getteams') }}", function(data) {
            // Clear previous options
            $('#teamstwo').empty();

            // Append each team as an option
            data.forEach(function(team) {
                $('#teamstwo').append('<option value="' + team.name + '">' + team.name + '</option>');
            });
        });
    }

    // Fetch teams when modal is opened
 fetchTeamsTwo();

</script>


<script>
    $(document).ready(function() {
    $('.copyButton').click(function() {
        // e.preventDefault();
        var inputField = $('.myInput');
        inputField.select();
        document.execCommand('copy');
        // Optionally, provide user feedback
        alert('Text copied to clipboard');
    });
});
</script>

</body>

</html>