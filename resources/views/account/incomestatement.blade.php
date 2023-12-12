<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Account - Income Statement</title>

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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               
                <div class="sidebar-brand-text mx-3 font-weight-bolder">{{Auth::user()->office}} 
                    <br>
                    <h6 class="text-center">Accountant</h6>
                </div>
            </a>

                <!-- Divider -->
            <hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item ">
 <a class="nav-link" href="{{route('account.home')}}">
     <i class="fas fa-fw fa-tachometer-alt"></i>
     <span>Dashboard</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Schedule -->

<li class="nav-item">
 <a class="nav-link" href="{{route('account.schedule')}}">
     <i class="fas fa-fw  fa-clock"></i>
     <span>Schedule</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Task -->

<li class="nav-item">
 <a class="nav-link" href="{{route('account.tasks')}}">
     <i class="fas fa-fw  fa-tasks"></i>
     <span>Tasks+</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Account -->

<li class="nav-item active">
<a class="nav-link" href="{{route('account.accounts')}}">
<i class="fas fa-money-check"></i>
<span>Account</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item">
 <a class="nav-link" href="{{route('account.jobs')}}">
     <i class="fas fa-fw  fa-briefcase"></i>
     <span>Jobs+</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">

   <!-- Nav Item - Message -->

<li class="nav-item ">
 <a class="nav-link" href="/chatify">
     <i class="fas fa-fw  fa-envelope"></i>
     <span>Message</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


   <!-- Nav Item - Report -->

<li class="nav-item">
 <a class="nav-link" href="{{route('account.reports')}}">
     <i class="fas fa-fw  fa-file "></i>
     <span>Report</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


  <!-- Nav Item - Clients -->
<li class="nav-item">
 <a class="nav-link" href="{{route('account.clients')}}">
 <i class="fas fa-handshake"></i>
     <span>Client</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


  <!-- Nav Item - Calender -->
  <li class="nav-item">
 <a class="nav-link" href="{{route('account.events')}}">
 <i class="fas fa-calendar"></i>
     <span>Events</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

 <!-- Nav Item - Leave  -->
 <li class="nav-item">
                <a id="step-eight"class="nav-link" href="{{route('leavepage')}}">
                <i class="fas fa-calendar"></i>
                    <span>Leave Management</span></a>
            </li>


            

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
                                        <a class="dropdown-item d-flex align-items-center" href="{{route('account.schedule')}}">
                                    @elseif($notify->type=="App\Notifications\EventNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('account.events')}}">

                                    @elseif($notify->type=="App\Notifications\DeclinedMeetingNotification")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('account.schedule')}}">
                                    @elseif($notify->type=="App\Notifications\SendTask")
                                    <a class="dropdown-item d-flex align-items-center" href="{{route('account.tasks')}}">

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
                                <a class="dropdown-item" href="{{route('account.profile.page')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{route('account.setting.page')}}">
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
                        <h1 class="h3 mb-0 text-gray-800">Monthly Income</h1>
                        
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
                      
                        <hr class="text-dark">


                       
         
                    <div class="card shadow mb-4"id="received">
                        <div class="card-header bg-success py-3">
                            <h6 class="m-0 font-weight-bold  text-light">Income /Revenue</h6>
                        </div>
                       
                        <div class="card-body">
                        <div><a href="#expenses"class="btn-sm btn-success text-light font-weight-bold">Source 1 (Clients Jobs)</a></div>
                            <div class="text-right">
                         
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Amount in Naira (₦)</th>
                                            <th>Client</th>
                                            <th>Job</th>
                                            <th>Accounted by</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       
                                      @foreach($income as $incomes)
                                            <tr>
                                                <td>{{$incomes->title}}</td>

                                                <td>  @php  echo(date('M'))  @endphp </td>
                                                <td>{{$incomes->date}}</td>
                                                <td>{{$incomes->amount}}</td>
                                                <td>{{$incomes->client}}</td>
                                                <td>{{$incomes->job}}</td>
                                                <td>{{$incomes->accountant}}</td>
                                                
                                            </tr>

                                      @endforeach 
                                      
                                    </tbody>

                                    
                                    <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="font-size:20px;">Total</th>
                                            
                                            <th></th>
                                            @php 
                                                $date=date('M-Y');
                                            @endphp
                                            <th style="font-size:20px;">₦ {{\App\Receivedpay::where('office',Auth::user()->office)->where('job','!=',null)->where('month',$date)->sum('amount')}}</th>
                                           
                                            
                                        </tr>
                                        
                                   
                                </table>


                                <div><a href="#expenses"class="btn-sm btn-success text-light font-weight-bold">Source 2 (Other Sources)</a></div>


                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Amount in Naira (₦)</th>
                                            <th>Client</th>
                                            <th>Job</th>
                                            <th>Accounted by</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       
                                      @foreach($incomeothers as $incomes)
                                            <tr>
                                                <td>{{$incomes->title}}</td>
                                                <td>@php echo(date('M')) @endphp</td>
                                                <td>{{$incomes->date}}</td>
                                                <td>{{$incomes->amount}}</td>
                                                <td>{{$incomes->client}}</td>
                                                <td>{{$incomes->job}}</td>
                                                <td>{{$incomes->accountant}}</td>
                                                
                                            </tr>

                                      @endforeach 
                                      
                                    </tbody>


                                    <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                           <th></th>
                                            <th style="font-size:20px;">Total</th>
                                            <th></th>
                                            @php 
                                                $date=date('M-Y');
                                            @endphp
                                            <th style="font-size:20px;">₦ {{\App\Receivedpay::where('office',Auth::user()->office)->where('othersource','!=',null)->where('month',$date)->sum('amount')}}</th>
                                           
                                            
                                        </tr>

                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                           
                                            <th style="font-size:25px;color:black;font-weight-bold">Gross Income</th>
                                            <th></th>
                                            @php 
                                                $date=date('M-Y');
                                            @endphp
                                            <th style="font-size:25px;color:black;font-weight-bold;">₦ {{\App\Receivedpay::where('office',Auth::user()->office)->where('othersource','!=',null)->where('month',$date)->sum('amount') + \App\Receivedpay::where('office',Auth::user()->office)->where('job','!=',null)->where('month',$date)->sum('amount')}}  </th>
                                           
                                            
                                        </tr>


                                        <div class="card-header py-3">
                                 
                                   
                                </table>


                            



                            </div>



                          

                          

                       

                        </div>
                    </div>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <a href="https://quickoffice.online">QuickOffice</a> 2020</span>
                        <span>Developed by <a href="https://wallsandgates.com.ng">WallsandGates Limited</a></span>
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
            task_client = document.querySelector('.task_client')
            task_description = document.querySelector('.task_description')
          

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    task_title.innerText  = data.title
                    task_start.innerText  = data.start
                    task_end.innerText  = data.end
                    task_category.innerText  = data.category
                    task_client.innerText =data.client
                    task_description.innerText  = data.description
                    
                   
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
        getTask('/account/tasks/', _id)

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
//edit expenses script
        function editExpense(url , id){
            let expense_title, expense_date, expense_amount, expense_description, expense_id
            
          
            expense_title=document.querySelector('.expense_title');
            expense_date=document.querySelector('.expense_date');
            expense_amount=document.querySelector('.expense_amount');
            expense_description=document.querySelector('.expense_description');
            expense_id=document.querySelector('.expense_id');

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    expense_title.value =data.title
                    expense_date.value  = data.date
                    expense_amount.value =data.amount
                    expense_description.value =data.description
                   expense_id.value=data.id
                    
                   
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
        editExpense('/account/edit/', _id)

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
        function deleteExpense(url , id){
            let expense_id_delete;
            let expense_title_delete;

            expense_id_delete  = document.querySelector('.expense_id_delete')
            expense_title_delete = document.querySelector('.expense_title_delete')
            

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    expense_id_delete.value  = data.id
                    expense_title_delete.innerText  = data.title
                 
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
        deleteExpense('/account/delete/', _id)

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
//edit received payment script
        function editReceived(url , id){
            let received_title, received_date, received_amount, received_description, received_id
            
          
            received_title=document.querySelector('.received_title');
            received_date=document.querySelector('.received_date');
            received_amount=document.querySelector('.received_amount');
            received_description=document.querySelector('.received_description');
            received_id=document.querySelector('.received_id');
           


            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    received_title.value =data.title
                    received_date.value  = data.date
                    received_amount.value =data.amount
                    received_description.value =data.description
                    received_id.value=data.id
                    
                   
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
        editReceived('/account/received/edit/', _id)

    }

    try {
        let viewModalBtns  = document.querySelectorAll('.editreceivedmodal');

viewModalBtns.forEach(function(viewModalBtn){
    viewModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
    </script>



<script >

//script for delete modal for received payments
        function deleteReceived(url , id){
            let received_id_delete;
            let received_title_delete;

            received_id_delete  = document.querySelector('.received_id_delete')
            received_title_delete = document.querySelector('.received_title_delete')
            

            try {
                fetch(`${url}${id}`)
                .then(res=> res.json())
                .then(function(data){
                    received_id_delete.value  = data.id
                    received_title_delete.innerText  = data.title
                 
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
        deleteReceived('/account/delete/received/', _id)

    }

    try {
        let deleteModalBtns  = document.querySelectorAll('.deletereceivedmodal');

deleteModalBtns.forEach(function(deleteModalBtn){
    deleteModalBtn.addEventListener('click' , showId)
})
    } catch (error) {
        alert(error)
    }
    </script>



<script>
    
    //get Jobs 

    function getJob(){
            
          let client, selectss

          client = document.querySelector('.client');
        selectss=client.value


            try {
                fetch(`http://localhost:8000/account/job/${selectss}`)
                .then(res=> res.json())
                .then(function(data){
                   // console.log(data)
                     //I want to get specific attribute of the data
                     //i.e data.title etc ..but not working
                   
                // console.log(data)
                var select = document.querySelector(".job");
                data.forEach(item=>{
                   // console.log(item.title); //works now

                    var option = document.createElement("option");
                    option.text = item.title;
                    option.value = item.title;
                  
                    select.append(option);

                    
                    //////////////////////////////////////

                    
                })
                                
                })
                .catch(function(err){
                    console.log(err)
                })
        } catch (error) {
        console.error(error)
    }
}


   
    

</script>




</body>

</html>