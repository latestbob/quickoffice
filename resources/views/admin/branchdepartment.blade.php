<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{Auth::user()->office}} Admin - Branches and Departments</title>

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
                        <h1 class="h3 mb-0 text-gray-800"> Departments</h1>
                        
                    </div>

                   
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-10 m-auto mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Create Department</h6>
                                </div>
                                <div class="card-body">
                                              <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            @if(session('msg'))
                                <div class="alert alert-success text-center">
                                    <p>{{session('msg')}}</p>
                                </div>

                            @endif
                        <form action="{{route('admin.addbranch')}}"method="POST">
                                      @csrf

                                            <div class="form-group">
                                                <label for="name">Department Name<span class="text-danger">*</span></label>
                                                <input type="text"name="name"placeholder="Department Name"class="form-control"required>
                                        </div>

                                        <div class="form-group">
                                                <label for="location">Location <span class="text-danger">*</span></label>
                                            <textarea name="location" id="" cols="10" rows="5"placeholder="Enter the location"class="form-control"required></textarea>
                                        </div>

                                        <input type="hidden"name="office"value="{{Auth::user()->office}}"required>

                                        <div class="form-group">
                                            <button class="btn btn-info text-center">Add Department</button>
                                        </div>

                                  </form>

                                  <div class="card-header mt-5 py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">All Department</h6>
                                </div>
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Department Name</th>
                                            <th>Location</th>
                                            <th>Number of Staff</th>
                                            
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody style="color:black;font-size:13px;z-index:100;">
                                        @foreach($branch as $branches)
                                        <tr>
                                            <td>{{$branches->name}}</td>
                                            <td>{{$branches->location}}</td>
                                            <td>{{\App\User::where('branch',$branches->name)->count()}}</td>
                                            
                                            <td><a href="#" data-id="{{$branches->id}}" class="viewmodal btn-sm btn-info"data-toggle="modal" data-target="#viewModal">View</a><a href="#"data-id="{{$branches->id}}"class="editmodal btn-sm btn-warning"data-toggle="modal" data-target="#editModal">Edit</a><a href="#"data-id="{{$branches->id}}"class="deletemodal btn-sm btn-danger"data-toggle="modal" data-target="#deleteModal">Delete</a></td>
                                            
                                        </tr>

                                        @endforeach
                                    </tbody>
                                   
                                    </tfoot>
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
                       {{$branches->office}}
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Branch Name</td>
                                        <td class="branch_name">name</td>

                                    </tr>

                                    <tr>
                                        <td>Branch Location</td>
                                        <td class="branch_location">location</td>

                                    </tr>

                                    <tr>
                                        <td>Branch Office</td>
                                        <td class="branch_office" >branch</td>

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



     <!-- Edit Branch Modal-->
     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                       {{$branches->office}} Edit Branch
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('admin.editbranchpost',$branches->id)}}"method="POST">
                        @csrf
                        {{method_field('PUT')}}

                        <div class="form-group">
                            <label for="name">Branch Name</label>
                            <input type="text"name="branch_name"class="form-control branch_name_edit"required>
                        </div>


                        <div class="form-group">
                            <label for="location">Branch Location</label>
                            <input type="text"name="branch_location"class="form-control branch_location_edit"required>
                        </div>

                        <div class="form-group">
                        <label for="office">Branch Office</label>
                            <input type="text"name="branch_office"class="form-control branch_office_edit"required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success text-center">Edit Branch</button>
                        </div>
                    </form>
                       
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  
                   
                </div>
            </div>
        </div>
    </div>




    <!-- Delete Branch  Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete Branch?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Confirm you want to delete  <span class="branch_name_delete"></span></div>
                <form action="{{route('admin.deletebranchpost')}}"method="POST">
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
            let branch_name, branch_location, branch_office;

            branch_name = document.querySelector('.branch_name')
            branch_location = document.querySelector('.branch_location')
            branch_office = document.querySelector('.branch_office')

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    branch_name.innerText  = data.name
                    branch_location.innerText  = data.location
                    branch_office.innerText  = data.office
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
        getBranch('/branch/', _id)

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
            let branch_name_edit, branch_location_edit, branch_office_edit;

            branch_name_edit = document.querySelector('.branch_name_edit')
            branch_location_edit = document.querySelector('.branch_location_edit')
            branch_office_edit = document.querySelector('.branch_office_edit')

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    branch_name_edit.value  = data.name
                    branch_location_edit.value  = data.location
                    branch_office_edit.value  = data.office
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
        editBranch('/branch/edit/', _id)

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
        function deleteBranch(url , id){
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
        deleteBranch('/branch/delete/', _id)

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