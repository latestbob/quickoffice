<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{Auth::user()->office}} Staff - Schedule</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Schedule A Virtual Meeting</h1> 
                        <button class="viewmodal btn btn-primary"data-toggle="modal" data-target="#viewModal">Schedule a Meeting</button>
                        
                    </div>

                   
                    <!-- Content Row -->
                   

                    <!-- here -->

                                 

                    @if($meets->count() > 0)

                    <div class="row">

<!-- Content Column -->


    <!-- Project Card Example -->
    <div class="card shadow mb-4 w-100">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upcoming Virtual Meeting</h6>
        </div>
        <div class="card-body">
        

        @if(session('msgg'))
            <div class="alert alert-success text-center">
                <p>{{session('msgg')}}</p>
            </div>
        @endif
                      <!-- DataTales Example -->
    <div class="card shadow mb-4">

<div class="card-body">
    @if(session('error'))

        <div class="alert alert-danger text-center">
            <p>{{session('error')}}</p>
        </div>
    @endif




    <div class="table-responsive">
        <table class="table table-hovered table-borderless table-sm" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-primary text-light">
                <tr>
                    <th>Title</th>
                    
                    <th>Starting</th>
                   
                    <th>Host</th>
                    <th>Description</th>
                    <th>Action</th>
                    
                </tr>
            </thead>


            <tbody style="color:black;font-size:13px;z-index:100;">
              
              @foreach($meets->unique('ref') as $meet)

                <tr>
                <td>{{$meet->title}}</td>
                        <td>{{$meet->start}}</td>
                       
                        <td>

                        @if($meet->creator == Auth::user()->name)

                                <p>Me</p>
                                @else

                                <p>{{$meet->creator}}</p>


                                @endif
                        </td>
                       
                        <td>{{$meet->description}}</td>

                        <td>
                        @php
                            date_default_timezone_set('Africa/Lagos');
                            $date = date('Y-m-d H:i:s');

                            
                            
                            @endphp

                            <form action="{{route('delete.meetings',$meet->ref)}}"method="POST">
                                @csrf
                                {{method_field('DELETE')}}

                            <!-- check of today is greater than start  -->

                     

                           

                                    @if($meet->creator == Auth::user()->name)
                                            <a href="{{$meet->link}}"target="_blank"class="btn btn-success btn-sm">Start</a>
                                                @else

                                                @if($date > $meet->start)
                                                     <a href="{{$meet->link}}"target="_blank"class="btn btn-success btn-sm">Join</a>

                                                @else

                                                <a href=""target="_blank"class="btn btn-warning text-dark btn-sm">Not started</a>

                                                @endif
                                                
                                            @endif

                                            @if($meet->creator == Auth::user()->name)
                                            <a href=""class="btn btn-primary btn-sm"data-toggle="modal" data-target="#myModal{{$meet->id}}">Invitees</a>
                                            @endif

                                            <!-- invitess modal -->

                                            <div class="modal fade" id="myModal{{$meet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Meeting Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Display meeting details here -->
                                                    <p>Title: {{$meet->title}}</p>
                                                    <p>Start Time: {{$meet->start}}</p>
                                                    <p>End Time: {{$meet->start}}</p>
                                                    <!-- Add other meeting details as nee'ded -->

                                                    <?php
                                                        $person = \App\Meeting::where('ref',$meet->ref)->pluck('participant')
                                                    
                                                    ?>

                                            <p class="font-weight-bold">Invitees</p>
                                                                @foreach($person as $per)

                                                            

                                                                <p>{{$per}}</p>

                                                                @endforeach
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                                        



                                            <!-- end of inviteess modal -->

                                            @if(Auth::user()->name == $meet->creator)

<button class=""style="background:white;border:none;"><i class="fa fa-trash text-danger"></i></button>

@endif
             

                            





                            
                            <!-- check of today is greater than start  -->

                                

                            </form>

                           

                            
                        </td>
                </tr>


            
              @endforeach

            </tbody>

        </table>

    
    </div>




    
    

</div>

                        @else

                        
                      
                        
                        
                    

                       

                    @endif

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            

            <!--Jitsi meet div-->

            <div class="meet m-auto"id="meet">


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




       <!-- ADD EXPENSES MODEL-->
       <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Create a New Meeting
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                <form action="{{route('create.meeting.schedule')}}"method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="title">Meeting Title</label>
                                            <input type="text"name="title"placeholder="Enter Meeting Title"class="form-control"required>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="start">Schedule Start</label>
                                            <input type="datetime-local"name="start"placeholder="Enter Start time"class="form-control"required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="end">Schedule End</label>
                                            <input type="datetime-local"name="end"placeholder="Enter Scheduled End time"class="form-control">
                                        </div>

                                        
                                            
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label for="">Participant</label>
                                        <select name="participant[]"class="form-control"multiple>

                                            <option value="">Select from the list</option>
                                            @foreach($members as $mem)

                                                <option value="{{$mem->name}}">{{$mem->name}} - {{$mem->position}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                   


                               

                                  
                                
                                    


                                    <hr>
                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <textarea name="description" id=""placeholder="Short Description of Meeting"class="form-control" cols="10" rows="5"required></textarea>
                                    </div>

                                </div>

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Create Meeting</button>
                                    </div>
                              
                                    </form>
                   
                        
                    </div>
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
    <script src='https://meet.jit.si/external_api.js'></script>


    <script>

        function getMeeting(url, id){
            let meeting
            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    meeting=data.title

                  //console.log($meeting)

                  const domain = 'meet.jit.si';
                const options = {
                    userInfo: {
                    email: 'edidiongbobson@gmail.com',
                    displayName: data.participant
                    },
                    roomName:meeting,
                    width: 1000,
                    height: 900,
                     parentNode: document.querySelector('#meet')

                  

                 };
             const api = new JitsiMeetExternalAPI(domain, options)
                   
                })
                .catch(function(err){
                    console.log(err)
                })

            } catch (error) {
        console.error(error)
    }

        }

        function showId(e){
            e.preventDefault();
        let _id = e.target.dataset.id
        getMeeting('/meeting/', _id)

    }

    try {
        let viewModalBtns  = document.querySelectorAll('.join');

viewModalBtns.forEach(function(viewModalBtn){
    viewModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
    </script>



<!--Start meeting script here --> 

<script>

function startMeeting(url, id){
    let meeting
    try {
        fetch(`${url}${id}`)
        .then(res=> res.json())
        .then(function(data){
            meeting=data.title

          //console.log($meeting)

          const domain = 'meet.jit.si';
        const options = {
            userInfo: {
            email: 'edidiongbobson@gmail.com',
            displayName: data.creator
            },
            roomName:meeting,
            width: 1000,
            height: 900,
             parentNode: document.querySelector('#meet')

          

         };
     const api = new JitsiMeetExternalAPI(domain, options)
           
        })
        .catch(function(err){
            console.log(err)
        })

    } catch (error) {
console.error(error)
}

}

function showId(e){
    e.preventDefault();
let _id = e.target.dataset.id
startMeeting('/meeting/', _id)

}

try {
let viewModalBtns  = document.querySelectorAll('.start');

viewModalBtns.forEach(function(viewModalBtn){
viewModalBtn.addEventListener('click' , showId)
})
} catch (error) {
alert(error)
}
</script>



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