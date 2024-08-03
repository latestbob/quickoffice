<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$project->title}}</title>

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
       
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
              

     
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
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                            <h4 class="m-0 font-weight-bold text-primary">{{$project->title}}</h4>

                            <button class="btn btn-sm btn-primary font-weight-bold">Project Completion Status - {{ round(\App\ProjectTask::where(['project' => $project->title])->avg('percentage')) }}% </button>
                        </div>
                       
                        <div class="card-body">
                            <!-- <div><a href="#received"class="btn-sm btn-secondary text-light font-weight-bold">Go to Received Payments</a></div>
                            <div class="text-right">
                                <button class="btn-sm btn-primary">Export to Excel</button>
                            </div> -->

                            <div class="table-responsive">

                                <table class="table  table-striped table-hover">

                                <thead style="color:white;font-size:14px;z-index:100;" class="bg-primary text-light">
                                    <tr>
                                        <th>Task/Activities</th>
                                        <th>Outcome</th>
                                        <th class="text-center">Completion Status (%)</th>
                                        <th>Responsible Party</th>
                                        <th>Start Date</th>
                                        <th>Expected End Date</th>
                                        <th>Actual End Date</th>
                                        <th>Status</th>
                                       
                                    </tr>

</thead>


            <tbody style="font-size:14px;z-index:100;color:#1A191A;" >

                @foreach($milestone as $mile)

                        <tr>
                        <td colspan="2"class="text-primary font-weight-bold">{{ $mile->name }}</td>
               
                        
                      
                        
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
                            <td>{{ $task->output }}</td>
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

                                    <p class="badge badge-success text-light">Done</p>

                                    @else
                                    <p class="badge badge-warning text-dark">Pending</p>

                                @endif
                            </td>
                     
                        </tr>







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
                <button type="submit" class="btn btn-success text-center">Update Task</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
                  
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

                        <input type="date"name="start"class="form-control"required>
                </div>

                <div class="col">
                        <label for="">Expected End Date</label>

                        <input type="date"name="end"class="form-control"required>
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