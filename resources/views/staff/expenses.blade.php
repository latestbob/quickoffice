<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{Auth::user()->office}} Staff - Expense Approval</title>

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

ul{
    list-style-type:none;
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

                    
                            <div class="card py-3">
                            <h6 class="card-header card-m-0 font-weight-bold text-primary">All Expenses Approvals</h6>
                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table class="table table-hover table-sm">
                                        <thead style="color:white;font-size:13px;z-index:100;" class="bg-primary text-light">

                                            <tr>
                                                <th>Expenses Type</th>
                                                <th>Business</th>
                                                <th>Date</th>
                                                <th>Currency</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Created By</th>
                                                <th>Actions</th>
                                            </tr>

                                        </thead>

                                        <tbody style="color:black;font-size:13px;z-index:100;">

                                        @foreach($expense as $ex)

                                            <tr>
                                                <td>{{$ex->title}}</td>
                                                <td>{{$ex->category}}</td>
                                                <td>{{ \Carbon\Carbon::parse($ex->date)->format('d/m/Y') }}</td>
                                                <td>{{$ex->currency}}</td>
                                                <td>{{$ex->total}}</td>
                                                <td>
                                                    @if($ex->status =='pending')

                                                        <p class="badge badge-warning badge-sm text-dark">pending</p>

                                                        @elseif($ex->status =='approved')

                                                        <p class="badge badge-success badge-sm text-light">approved</p>

                                                        @else
                                                        <p class="badge badge-danger badge-sm text-light">rejected</p>
                                                    @endif
                                                </td>
                                                <td>{{$ex->accountant}}</td>
                                                <td>
                                                   <!-- <a href=""class="btn btn-info btn-sm"data-toggle="modal" data-target="#exampleModal{{$ex->id}}">View More</a>  -->

                                                   <form action="{{route('expensereminder')}}"method="POST">
                                                    @csrf

                                                    <input type="hidden"name="id"value="{{$ex->id}}">
                                                    <a href=""class="btn btn-info btn-sm"data-toggle="modal" data-target="#exampleModal{{$ex->id}}">View</a> |   <button type="submit"class="btn btn-success btn-sm">Send Reminder</button> 

                                                </form>
                                                </td>
                                            </tr>


                                            <div class="modal fade" id="exampleModal{{$ex->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{$ex->title}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p class="expensepara">Title : {{$ex->title}}</p>
                                                        <p class="expensepara">Category : {{$ex->category}}</p>
                                                        <p  class="expensepara">Date : {{$ex->date}}</p>

                                                        <p  class="expensepara">Total Amount : {{$ex->total}}</p>
                                                        <p  class="expensepara">Description  <br> {{$ex->description}}</p>

                                                        <hr>
                                                        <p  class="expensepara">Items </p> 

                                                        
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p class="font-weight-bold itemsss">Items name/title</p>
                                                            </div>

                                                            <div class="col">
                                                            <p class="font-weight-bold itemsss">Quantity</p>
                                                            </div>

                                                            <div class="col">
                                                                 <p class="font-weight-bold itemsss">Unit Price</p>
                                                            </div>

                                                            <div class="col">
                                                            <p class="font-weight-bold itemsss">Total</p>
                                                            </div>
                                                        </div>

                                                        @foreach(json_decode($ex->items) as $items)
                                                        <div class="row">
                                                            <div class="col-md-3 itemsss">
                                                                {{$items->inputed_item_name}}
                                                            </div>

                                                            <div class="col itemsss">
                                                            {{$items->inputed_unit_price}}
                                                            </div>

                                                            <div class="col itemsss">
                                                            {{$items->inputed_item_quantity}}
                                                            </div>


                                                            <div class="col itemsss">
                                                            {{$items->inputed_total_price}}
                                                            </div>
                                                            </div>

                                                        @endforeach



                                                        <hr>

                                                        <p class="expensepara">Status : {{$ex->status}}</p>


                                                        <p class="expensepara">Action By : {{$ex->approved_by}}</p>


                                                        <p class="expensepara bg-warning">Comments <br>

                                                        {{$ex->comments == null ? 'none' : $ex->comments}}
                                                    </p>



                                                     


                                                        
                                                           
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


     

            <form action="{{route('account.addexpense')}}"method="POST">
                @csrf

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="">Business</label>
                        <select id="subsidary" name="category"class="form-control"required>
                            <option value="">Choose a Business</option>

                            @foreach($subsidary as $sub)

                                <option value="{{$sub}}">{{$sub}}</option>


                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-4">
                                        <label for="start">Category</label>
                                            <select  name="title" id="expenses"class="form-control addexpensecategories"required>
                                            <option value="">Select Category</option>
                                                

                                         
                                            </select>
                                        </div>


                                        <div class="col-md-4">
                                        <label for="start">Currency</label>
                                            <select  name="currency" id="currency"onchange="updateCurrency()"class="form-control"required>
                                            <option value="">Choose Currency</option>
                                            <option value="Naira">Naira</option>
                                            
                                            <option value="Dollar">Dollar</option>
                                            <option value="Pound">Pound</option>
                                          

                                                

                                         
                                            </select>
                                        </div>
                </div>

                <!-- <div class="form-group">
                    <label for="">Expense Title</label>

                    <input type="text"name="title"class="form-control"placeholder="Expense Title"required>
                </div> -->


                

                     

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
                                         <ul id="itemsList"></ul>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="start">Date made</label>
                                            <input type="date"name="date"placeholder="Enter date made"value="{{ date('Y-m-d') }}"class="form-control"readonly>
                                        </div>

                                        <div class="col-md-6">
                                        <label for="start"><span id="symbol"></span> Amount Paid</label>
                                                <input id="totalamount" type="number"name="amount"placeholder="Enter Amount in Naira"class="form-control"readonly>
                                        </div>

                                        
                                            
                                    </div>

                                    <div class="form-group">
                                        <input id="iteminput" type="hidden"name="items"class="form-control">
                                    </div>

                                

                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <textarea name="description" id=""placeholder="Description of Expenses"class="form-control" cols="10" rows="5"required></textarea>
                                    </div>

                          

                                    <div class="form-group">
                                        <button type="submit" class="text-center btn btn-success">Add Expenses</button>
                                    </div>

            </form>
       
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

    let items = [];
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
        
        var newItems = {
         inputed_item_name : item_name.value,
        inputed_item_quantity : item_quantity.value,
        inputed_unit_price : unit_price.value,
        inputed_total_price : parseFloat(total_price.value) || 0,
        }

        items.push(newItems);

       document.getElementById('item_name').value='';
        document.getElementById('item_quantity').value='';
        document.getElementById('unit_price').value='';
    document.getElementById('total_price').value='';

    console.log(items);

    updateTotalAmount();

        renderItems();
    }


    function renderItems() {
            // Get the itemsList element
            var itemsList = document.getElementById('itemsList');

            // Clear existing items
            itemsList.innerHTML = '';

            // Loop through items and create list items
            items.forEach(function(item, index) {
                var listItem = document.createElement('li');

                // Display item properties
                listItem.textContent = `${index + 1}: Title :${item.inputed_item_name}, Quantity: ${item.inputed_item_quantity}, Price :${item.inputed_unit_price}, Total: ${item.inputed_total_price}`;
                
                     // Add styles to the list item
                listItem.style.marginBottom = '10px';
                listItem.style.padding = '10px';
             
                listItem.style.backgroundColor = '#f9f9f9';
                listItem.style.display = 'flex';
                listItem.style.justifyContent = 'space-between';
                listItem.style.alignItems = 'center';

                // Add a delete button
                var deleteButton = document.createElement('button');
                deleteButton.textContent = 'Remove';
                deleteButton.style.backgroundColor = "red";
                deleteButton.style.color="white";
                deleteButton.style.padding="5px";
                deleteButton.style.borderRadius = "15px";
                deleteButton.style.fontSize = "12px";
                deleteButton.style.border = "none";
                deleteButton.addEventListener('click', function() {
                    deleteItem(index);
                });

                // Append the delete button to the list item
                listItem.appendChild(deleteButton);

                // Append the list item to the itemsList
                itemsList.appendChild(listItem);
            });

            var jsonString = JSON.stringify(items);

            document.getElementById('iteminput').value=jsonString;
        }


        function deleteItem(index) {
            // Remove the item at the specified index
            items.splice(index, 1);

            // Re-render the items
            updateTotalAmount();
            renderItems();
        }

        function updateTotalAmount() {
            // Calculate the sum of 'Field D' values
            var totalAmount = items.reduce(function (sum, item) {
                return sum + item.inputed_total_price;
            }, 0);

            // Update the value of the 'Total Amount' input
            document.getElementById('totalamount').value = totalAmount.toFixed(2);
            document.getElementById('iteminput').value = items;
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
                  fetch('/account/office/expense/category')
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


<script>
    //get expenses base on selected business
    function fetchExpenses(subsidaryId) {
        $.ajax({
            url: '{{ route('staff.expenses.unique') }}',
            type: 'GET',
            data: { name: subsidaryId },
            success: function (data) {
                // Clear existing options
                $('#expenses').empty();

                // Add new options based on fetched data
                $.each(data, function (key, value) {
                    $('#expenses').append('<option value="' + value.expenses + '">' + value.expenses + '</option>');
                });
            }
        });
    }

    // Listen for changes in the subsidiary dropdown
    $('#subsidary').change(function () {
        var subsidaryId = $(this).val();

        // Fetch expenses for the selected subsidiary
        fetchExpenses(subsidaryId);
    });
    
</script>



<script>
        function updateCurrency() {
            // Get the selected currency value
            var selectedCurrency = document.getElementById("currency").value;

            // Update the currency symbol in the paragraph based on the selected currency
            var symbol = document.getElementById("symbol");
            switch (selectedCurrency) {
                case "Naira":
                    symbol.innerHTML = "₦";
                    break;
                case "Dollar":
                    symbol.innerHTML = "$";
                    break;
                case "Pound":
                    symbol.innerHTML = "£";
                    break;
                default:
                symbol.innerHTML = "₦";
            }
        }

        
    </script>


</body>

</html>