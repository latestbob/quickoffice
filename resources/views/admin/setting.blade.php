<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Admin - Settings</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Profile Settings</h1>
                        
                    </div>

                   
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-8 m-auto mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update Details</h6>
                                </div>
                                <div class="card-body">

                                @if(session('msgg'))
                                    <div class="alert alert-success text-center">
                                        <p>{{session('msgg')}}</p>
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


                                <form action="{{route('admin.setting.post')}}"method="POST">
                        @csrf 
                        {{method_field('PUT')}}

                        <input type="hidden"name="id"value="{{Auth::user()->id}}"required>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"name="name"value="{{Auth::user()->name}}"class="form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email"name="email"value="{{Auth::user()->email}}"class=" form-control"readonly>
                        </div>

                       

                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input type="date"name="dob"value="{{Auth::user()->dob}}"class="form-control"required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel"name="phone"value="{{Auth::user()->phone}}"class="form-control"required>
                        </div>

                       

                        

                        
                        <div class="form-group">
                            <button class="btn btn-success text-center">Update Details</button>
                        </div>
                    </form>

                        
                                            
                
                                </div>
                            </div>

                         </div>
                         <!-- Color System -->

                       
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




<script >

//script for edit modal
        function editBranch(url , id){
            let  client_id, client_name,  client_email, client_password, client_phone, client_description;

            client_id= document.querySelector('.client_id_edit')
            client_name= document.querySelector('.client_name_edit')
           
            client_email = document.querySelector('.client_email_edit')
            client_phone = document.querySelector('.client_phone_edit')
 
            client_password = document.querySelector('.client_password_edit')
            client_description = document.querySelector('.client_description_edit')

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    client_id.value  = data.id
                    client_name.value  = data.name
                    client_email.value  = data.email
                    
                    client_phone.value  = data.phone
                    client_password.value  = data.password
                    
                    client_description.value  = data.description
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
        editBranch('/admin/client/edit/', _id)

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
        deleteStaff('/admin/client/delete/', _id)

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



<script >

//script for email modal
        function emailClient(url , id){
            let  client_id, client_name,  client_email, client_password, client_phone, client_description;

            client_id= document.querySelector('.client_id_email')
         
           
            client_email = document.querySelector('.client_email_email')
           

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    client_id.value  = data.id
                   
                    client_email.value  = data.email
                    
                  
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
        emailClient('/admin/client/email/', _id)

    }

    try {
        let editModalBtns  = document.querySelectorAll('.emailmodal');

editModalBtns.forEach(function(editModalBtn){
    editModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
    </script>


</body>

</html>