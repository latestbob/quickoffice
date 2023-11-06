<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{Auth::user()->office}} Client - Schedule</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

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
                    <h6 class="text-center">CLIENT</h6>
                </div>
            </a>

             
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('client.home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Schedule -->

            <li class="nav-item active">
                <a class="nav-link" href="{{route('client.schedule')}}">
                    <i class="fas fa-fw  fa-clock"></i>
                    <span>Schedule</span></a>
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
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{asset('img/undraw_profile_1.svg')}}"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{asset('img/undraw_profile_2.svg')}}"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{asset('img/undraw_profile_3.svg')}}"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
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
                                <a class="dropdown-item" href="#">
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
                        <h1 class="h3 mb-0 text-gray-800">Schedule Meetings </h1>
                        
                    </div>

                   
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-7 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Schedule a Meeting</h6>
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

                        <a href="#" class="viewmodal btn btn-success"data-toggle="modal" data-target="#viewModal">Create a Meeting</a>


                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Participant</th>
                                            <th>Starting</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      
                                        @foreach($meets as $meet)
                                            <tr>
                                                <td>{{$meet->title}}</td>
                                                <td>{{$meet->participant}}</td>
                                                <td>{{$meet->start}}</td>
                                                <td>{{$meet->description}}</td>
                                                <td>
                                                @php
                                                    date_default_timezone_set('Africa/Lagos');
                                                    $date = date('Y-m-d H:i:s');
                                                    @endphp

                                                    @if($date>$meet->start)
                                                        @if($meet->accept != 'declined')
                                                        <a href=""class="btn btn-sm btn-success start"data-id="{{$meet->id}}">Meeting Started</a>

                                                        @else 
                                                        <a href=""class="btn btn-sm btn-warning"style="color:black;">Meeting Declined</a>
                                                        @endif 
                                                       
                                                       

                                                   

                                                    @else
                                                       <a href=""class="btn btn-sm btn-primary"disabled>Not Started</a>
                                                    
                                                    @endif
                                                     
                                                    
                                                    
                                                    
                                                    <form action="{{route('delete.meeting',$meet->id)}}"method="POST">
                                                        @csrf 
                                                        {{method_field('DELETE')}}

                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Participant</th>
                                            <th>Starting</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                           
                        </div>
                    </div>

                
                                </div>
                            </div>

                         </div>
                         <!-- Color System -->

                        <div class="col-lg-5 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Meeting Scheduled with me</h6>
                                </div>
                                <div class="card-body">
                                    @if(session('msg'))
                                        <div class="alert alert-success text-center">
                                            <p>{{session('msg')}}</p>
                                        </div>
                                    @endif


                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Scheduled by</th>
                                            <th>Starting</th>
                                         
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                      
                                        @foreach($withme as $meet)

                                        @if($meet->accept != 'declined')
                                            <tr>
                                                <td>{{$meet->title}}</td>
                                                <td>{{$meet->creator}}</td>
                                                <td>{{$meet->start}}</td>
                                         
                                                <td>
                                                @php
                                                    date_default_timezone_set('Africa/Lagos');
                                                    $date = date('Y-m-d H:i:s');
                                                    @endphp

                                                    @if($date>$meet->start)
                                                       <a href=""class=" btn btn-sm btn-success join"data-id="{{$meet->id}}">Join Meeting</a>
                                                       

                                                   

                                                    @else
                                                       <a href="#"class="btn-sm btn-primary"disabled>Not Started</a>
                                                    
                                                    @endif
                                                     
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <form action="{{route('decline.meeting',$meet->id)}}"method="POST">
                                                        @csrf 
                                                        {{method_field('PUT')}}

                                                        <button class="btn btn-sm btn-danger text-center">Decline</button>

                                                    </form>
                                                </td>
                                            </tr> 
                                        @endif
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Scheduled by</th>
                                            <th>Starting</th>
                                          
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>


                                 

                                  
                                   
                                 
                                </div>
                            </div>

                            <!-- Approach -->
                           

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            

            <!--Jitsi meet div-->

            <div class="meet m-auto"id="meet">


            </div>
  




            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
                                        <select name="participant" id=""class="form-control"required>

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