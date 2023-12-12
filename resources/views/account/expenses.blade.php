<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Account - Expense Approval</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" />
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


<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Accounting Features</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="{{route('account.invoice')}}">Invoices</a>
                        <a class="collapse-item" href="{{route('account.expenses')}}">Expense Approval</a>
                        <!-- <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a> -->
                    </div>
                </div>
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
                              ]<a class="dropdown-item" href="{{route('account.profile.page')}}">
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
                        <h1 class="h3 mb-0 text-gray-800">Expense Approvals</h1> 
                        <button class="btn btn-primary"data-toggle="modal" data-target="#exampleModal">Create New Expense</button>
                        
                    </div>

     
                            @if(session('msg'))
                                <div class="alert alert-success text-center">
                                    <p>{{session('msg')}}</p>
                                </div>
                            @endif
        
                
                

                


                    






                    </div>
                <!-- /.container-fluid -->


             
        </div>
    </div>




                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Expenses For Approval</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


            <form action=""method="POST">
                @csrf


                <div class="form-group">
                    <label for="">Expense Title</label>

                    <input type="text"name="title"class="form-control"placeholder="Expense Title">
                </div>


                <div class="form-group row">
                                        <div class="col-md-6">
                                        <label for="start">Category</label>
                                            <select name="category" id=""class="form-control addexpensecategories">4
                                            <option value="">Select Category</option>
                                                <option value="Administrative Expenses">Administrative Expenses</option>

                                         
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                              <label for="start">Add Category(If it doesn't exist) <a class="text-info font-weight-bold addcategory"data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add </a> </label><br>
                                        

                                        <div class="collapse" id="collapseExample">
                                          
                                               
                                                   <form class="myform">
                                                    <div class="row">
                                                        <div class="col-8">
                                                             <input id="myinputcategory" type="text"class="form-control"name="title"placeholder="Enter Category Title"required>
                                                        </div>

                                                        <div class="col-4">
                                                            <button id="mysubmit" class="btn btn-primary btn-sm">Add</button>
                                                        </div>
                                                    </div>

                                                    </form>
                                                    
                                               
                                           
                                            </div>
                                        </div>

                                        
                                            
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="start">Date made</label>
                                            <input type="date"name="date"placeholder="Enter date made"class="form-control"required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="start">₦ Amount Paid</label>
                                                <input type="number"name="amount"placeholder="Enter Amount in Naira"class="form-control"required>
                                        </div>

                                        
                                            
                                    </div>

                                    <p class="font-weight bold">Add Items</p>

                                    <div class="form-row">
                                        <div class="col-5">
                                            <input type="text"id="item_name"class="form-control"placeholder="Item Name">
                                        </div>

                                        <div class="col">
                                            <input type="number"id="item_quantity"oninput="getTotal()"class="form-control"placeholder="Quanity">
                                        </div>

                                        <div class="col">
                                            <input type="number"id="unit_price"oninput="getTotal()"class="form-control"placeholder="Unit Price">
                                        </div>

                                        <div class="col">
                                            <input type="number"id="total_price"class="form-control"placeholder="Total"readonly>
                                        </div>

                                        <div class="col">
                                            <button id="additem" class="btn btn-primary additem">Add Item</button>
                                        </div>


                                        


                                    </div>

                                    <div class="form-group">
                                         <ul id="itemList"></ul>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <textarea name="description" id=""placeholder="Description of Expenses"class="form-control" cols="10" rows="5"required></textarea>
                                    </div>

                          

                                    <div class="form-group">
                                        <button class="text-center btn btn-success">Add Expenses</button>
                                    </div>

            </form>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

            </div>
            <!-- End of Main Content -->

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


<!-- Add items -->

<script>
    var item_name  = document.getElementById('item_name');
    var item_quantity = document.getElementById('item_quantity');
    var unit_price = document.getElementById('unit_price');
    var total_price = document.getElementById('total_price');

    var addItemBtn = document.getElementById('additem');

    function getTotal(){
        var myquantity = item_quantity.value;
        var myunitprice = unit_price.value;

        var mytotal  = myquantity * myunitprice;

        document.getElementById('total_price').value=mytotal;


    }

    


    addItemBtn.addEventListener('click',function(e){

       
        e.preventDefault();
        var inputed_item_name = item_name.value;
        var inputed_item_quantity = item_quantity.value;
        var inputed_unit_price = unit_price.value;
        var inputed_total_price  = total_price.value;

    // check if necessary input are been field


        

    if(inputed_item_name == "" || inputed_item_quantity == "" || inputed_unit_price == "" || inputed_total_price == ""){
        alert("An important field is empty");
    }

    else{
        
    }


    });


</script>



<!--  -->






<script>
    var myInput = document.getElementById('myinputcategory');
var myButton = document.getElementById('mysubmit');

// Add click event listener to the button
myButton.addEventListener('click', function(e) {
    e.preventDefault();
  // Get the content of the input
  var inputContent = myInput.value;

  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$.ajax({
    type: "POST",
    url: "/account/expense/category",
    data: { addcategory:inputContent }, 
    success: function() {
        console.log('worked');

        

      
        document.getElementById('myinputcategory').value="";
        
        toastr.success('Category was added successfully');
        var select = document.querySelector(".addexpensecategories");
        var option = document.createElement("option");
                      option.text = inputContent;
                      option.value = inputContent;
                    
                      select.append(option);
  
        
        
       
        
       
    }
});


  
});
</script>


<script>



     $('#myform').submit(function(e){
        e.preventDefault();

       
        var title = $(this).find('input[name=title]').val();
        
       
     console.log(title);

    

      
      

       var form_action = $('.formaddcategory').attr("action");

    

       $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

      $.ajax({
    type: "POST",
    url: form_action,
    data: { addcategory:title }, 
    success: function() {
        console.log('worked');

        

      

        
        toastr.success('Category was added successfully');
        var select = document.querySelector(".addexpensecategories");
        var option = document.createElement("option");
                      option.text = title;
                      option.value = title;
                    
                      select.append(option);
  
        
        
       
        
       
    }
});




    });


  

  
</script>



<script>
    //this script is to get expenses category and populate them to the select input field

    function getCategory(){
            
        
  
  
              try {
                  fetch('http://localhost:8000/account/office/expense/category')
                  .then(res=> res.json())
                  .then(function(data){
                     // console.log(data)
                       //I want to get specific attribute of the data
                       //i.e data.title etc ..but not working
                     
                  // console.log(data)
                  var select = document.querySelector(".addexpensecategories");
                  data.forEach(item=>{
                     // console.log(item.title); //works now
  
                      var option = document.createElement("option");
                      option.text = item.name;
                      option.value = item.name;
                    
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

  getCategory();
 

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous"></script>





</body>

</html>