<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Workstation Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               
                <div class="sidebar-brand-text mx-3 font-weight-bolder">
                    <br>
                    <h6 class="text-center">Station Admin</h6>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('mainadmin.home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>All Office</span></a>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Schedule -->
           
            <li class="nav-item">
                <a class="nav-link" href="{{route('mainadmin.active')}}">
                    <i class="fas fa-fw  fa-check "></i>
                    <span>Active Plans</span></a>
            </li>
            
              <!-- Divider -->
              <hr class="sidebar-divider">


               <!-- Nav Item - Task -->
           
            <li class="nav-item">
                <a class="nav-link" href="{{route('mainadmin.inactive')}}">
                    <i class="fas fa-fw  fa-ban"></i>
                    <span>Inactive </span></a>
            </li>
            
              <!-- Divider -->
              <hr class="sidebar-divider">

                  <!-- Nav Item - Message -->
           
            <li class="nav-item ">
            <a class="nav-link" href="{{route('mainadmin.freeplans')}}">
                    <i class="fas fa-fw  fa-gift"></i>
                    <span>Free Plan</span></a>
            </li>
            
              <!-- Divider -->
              <hr class="sidebar-divider">


                  <!-- Nav Item - Report -->
           
         
            
              
            
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
                                        <a class="dropdown-item d-flex align-items-center" href="{{route('staff.schedule')}}">
                                    @elseif($notify->type=="App\Notifications\EventNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('staff.events')}}">

                                    @elseif($notify->type=="App\Notifications\DeclinedMeetingNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('staff.schedule')}}">
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    @if(session('msg'))

                        <div class="alert alert-success text-center">
                            <p>{{session('msg')}}</p>
                            
                        </div>


                    @endif

                   
                     <!-- Content Row -->
                     <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3  text-light col-md-6 mb-4">
    <div class="card bg-info  shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                      All Registered Offices</div>
                    <div class="h5 mb-0 font-weight-bold text-ligh">
                  

                    {{\App\Office::count()}}

                    
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-tachometer-alt fa-2x text-light"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                        Active Subscriptions</div>
                    <div class="h5 mb-0 font-weight-bold text-light">
                    {{\App\Office::where('active','true')->count()}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw  fa-check fa-2x text-light"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Inactive Subscriptions
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-dark">
                                {{\App\Office::where('active','false')->count()}}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-ban fa-2x text-dark" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Free Plans
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-light">
                                    {{\App\Office::where('plan','starterfree')->orWhere('plan','basicfree')->orWhere('plan','professionalfree')->orWhere('plan','businessfree')->orWhere('plan','enterprisefree')->count()}}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-gift fa-2x text-light" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<!-- Content Row -->

                    <!-- Content Row -->

                    <div class="row">

                       <div class="table-responsive">

                            <table class="table striped">
                                <thead>
                                    <tr>
                                        <th>Office name</th>
                                        <th>Official Mail</th>
                                        <th>Phone</th>
                                        <th>Plan</th>
                                        <th>Plan Type</th>
                                        <th>Active</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($office as $off)

                                        <tr>
                                            <td>{{$off->office_name}}</td>
                                            <td>{{$off->official_mail}}</td>
                                            <td>{{$off->official_phone}}</td>
                                            <td>{{$off->plan}}</td>
                                            <td>{{$off->type}}</td>
                                            <td>
                                                @if($off->active=="true")
                                                    <p class="badge badge-success text-center text-light">{{$off->active}}</p>

                                                    @else 
                                                    <p class="badge badge-danger text-center text-light">{{$off->active}}</p>
                                                @endif 
                                            </td>
                                            <td>
                                            <a href="#" data-id="{{$off->id}}" class="viewmodal btn-sm btn-info"data-toggle="modal" data-target="#viewModal">View</a><a href="#"data-id="{{$off->id}}"class="editmodal btn-sm btn-warning"data-toggle="modal" data-target="#editModal">Edit</a><a href=""class="btn btn-sm btn-success">Send Mail</a> 
                                            <form action="{{route('specificofficedelete',$off->id)}}"method="POST">
                                                @csrf
                                                {{method_field('DELETE')}}

                                                <button class="btn btn-danger text-light btn-sm">Delete </button>

                                            </form>
                                        </td>

                                          
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
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
                  
                    <form action="{{route('logoutadmin')}}"method="POST">
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
                    
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    
                        <div class="table-responsive">
                            
                        
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Office Name</td>
                                        <td class="office_name"></td>

                                    </tr>

                                    <tr>
                                        <td> Email Address</td>
                                        <td class="office_email"></td>

                                    </tr>

                                    <tr>
                                        <td> Phone</td>
                                        <td class="office_phone"></td>

                                    </tr>
                                      
                                    <tr>
                                        <td>Slug</td>
                                        <td class="office_slug"></td>
                                    </tr>

                                    <tr>
                                        <td>Physical Address</td>
                                        <td class="office_address"></td>
                                    </tr>

                                    <tr>
                                        <td>Secured Answer</td>
                                        <td class="secured_answer"></td>
                                    </tr>
                                    

                                    <tr>
                                        <td>Payment Reference</td>
                                        <td class="last_reference"></td>
                                    </tr>

                                    <tr>
                                        <td>Customer Code</td>
                                        <td class="customer_code"></td>
                                    </tr>


                                    <tr>
                                        <td>Plan</td>
                                        <td class="plan"></td>
                                    </tr>

                                    <tr>
                                        <td>Plan Code</td>
                                        <td class="plan_code"></td>
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



<!--Get office script -->  

<script >
        function getBranch(url , id){
            let name , email, phone, slug, address, answer, reference, customer_code, plan, plan_code, activee;

            name= document.querySelector('.office_name')
            email= document.querySelector('.office_email')
            phone= document.querySelector('.office_phone')
            slug= document.querySelector('.office_slug')
            address= document.querySelector('.office_address')
            answer= document.querySelector('.secured_answer')
            reference= document.querySelector('.last_reference')
            customer_code= document.querySelector('.customer_code')
            plan= document.querySelector('.plan')
            plan_code= document.querySelector('.plan_code')
            activee= document.querySelector('.active')

            

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    name.innerText  = data.office_name
                    email.innerText  = data.official_mail
                    phone.innerText  = data.official_phone
                    slug.innerText=data.slug

                    address.innerText=data.office_address
                    answer.innerText=data.secured_answer
                    reference.innerText=data.reference
                    customer_code.innerText=data.customer_code
                    plan.innerText=data.plan
                    plan_code.innerText=data.plan_code
                    activee.innerText=data.active
                  
                   
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
        getBranch('/specific/', _id)

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



<!--Edit Modal -->   

  <!-- Edit Staff Modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                    
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('editpostspecificoffice')}}"method="POST">
                        @csrf 
                        {{method_field('PUT')}}

                        <input type="hidden"name="id"class="theid"required>

                        <div class="form-group">
                            <label for="name">Office Name</label>
                            <input type="text"name="office_name"class="office_name_edit form-control"required>
                        </div>

                        <!-- <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email"name="office_email"class="office_email_edit form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel"name="office_phone"class="office_phone_edit form-control"required>
                        </div> -->

                        <div class="form-group">
                            <label for="plan">Plan</label>
                            <input type="text"name="office_plan"class="office_plan_edit form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Active</label>
                            <input type="text"name="office_active"class="office_active_edit form-control"required>
                        </div>



                     

                       

                

                        <!-- <div class="form-group">
                            <label for="description">Customer Code</label>

                           <input type="text"name="customer_code"class="thecustomer form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="description">Plan Code</label>

                           <input type="text"name="plan_code"class="office_plan_code_edit form-control"required>
                        </div> -->


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


    <script >
        function getEdit(url , id){
            let idd, customer_code, plan_code, name, email, phone, plan, active ;

            idd= document.querySelector('.theid')
            name= document.querySelector('.office_name_edit')
            email= document.querySelector('.office_email_edit')
            phone= document.querySelector('.office_phone_edit')
            plan= document.querySelector('.office_plan_edit')
            active= document.querySelector('.office_active_edit')
            
           plan_code= document.querySelector('.office_plan_code_edit')
           customer_code= document.querySelector('.thecustomer')
            
           
            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    
                    name.value  = data.office_name
                    email.value=data.official_mail
                    phone.value=data.official_phone
                    plan.value=data.plan
                    active.value=data.active
                   
                    plan_code.value=data.plan_code
                    customer_code.value=data.customer_code
                    idd.value=data.id
                   
                  
                   
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
        getEdit('/specific/edit/', _id)

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






</body>

</html>