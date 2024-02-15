
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

                            <form action="{{route('delete.meeting',$meet->ref)}}"method="POST">

                            @if($date>$meet->start)


                                @if($meet->accept != 'declined')

                                @if($meet->creator == Auth::user()->name)
                                <a href="{{$meet->link}}"target="_blank"class="btn btn-success btn-sm">Start</a>
                                    @else
                                    <a href="{{$meet->link}}"target="_blank"class="btn btn-success btn-sm">Join</a>
                                @endif
                                
                                @if($meet->creator == Auth::user()->name)
                                <a href=""class="btn btn-primary btn-sm"data-toggle="modal" data-target="#myModal{{$meet->id}}">Invitees</a>
                                @endif
                                @else
                                <a href=""class="btn btn-sm btn-warning"style="color:black;">Meeting Declined</a>

                                @endif 

                                 <!-- Modal -->
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
                              

                            

                            @else
                            <a href="#"class="btn btn-sm btn-primary"disabled>Not Started</a>
                            
                            @endif
                            
                            
                            
                                @csrf 
                                {{method_field('DELETE')}}

                                @if(Auth::user()->name == $meet->creator)

<button class=""style="background:white;border:none;"><i class="fa fa-trash text-danger"></i></button>

@endif
                            </form>
                        </td>
                    </tr>
                @endforeach
               
            </tbody>
           
        </table>
    </div>