<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               
                <div class="sidebar-brand-text mx-3 font-weight-bolder">{{Auth::user()->office}} 
                    <br>
                    <h6 class="text-center">Admin</h6>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

               <!-- Nav Item - Dashboard -->
               <li class="nav-item active">
                <a id="step-one"class="nav-link" href="{{route('admin.home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Schedule -->
           
             <!-- <li class="nav-item">
                <a id="step-two"class="nav-link" href="{{route('admin.schedule')}}">
                    <i class="fas fa-fw  fa-clock"></i>
                    <span>Virtual Meetings</span></a>
            </li>
            
            
              <hr class="sidebar-divider">  -->


               <!-- Nav Item - Task -->
           
            <li class="nav-item">
                <a id="step-three"class="nav-link" href="{{route('admin.tasks')}}">
                    <i class="fas fa-fw  fa-tasks"></i>
                    <span>Tasks+</span></a>
            </li>


            

            <!-- Divider -->
            <hr class="sidebar-divider">



            


                 <li class="nav-item">
                <a id="step-three"class="nav-link" href="{{route('admintasksummary')}}">
                    <i class="fas fa-fw  fa-users"></i>
                    <span>Task Summary</span></a>
            </li>


          
            <hr class="sidebar-divider">
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.projects')}}">
                <i class="fas fa-calendar"></i>
                    <span>Projects</span></a>
            </li>

            <hr class="sidebar-divider">
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.teams')}}">
                <i class="fas fa-users"></i>
                    <span>Teams</span></a>
            </li>
            

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

                <!-- Nav Item - Account -->

               
              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Nav Item - staffs -->

              <li class="nav-item ">
                <a id="step-five"class="nav-link" href="{{route('admin.staff')}}">
                <i class="fas fa-user-friends"></i>
                <span>Staff</span></a>
                </li>
              <!-- Divider -->
              <hr class="sidebar-divider">

                  <!-- Nav Item - Message -->
           
           <li class="nav-item ">
                <a id="step-six"class="nav-link" href="{{route('adminsummarymonthly')}}">
                    <i class="fas fa-fw  fa-envelope"></i>
                    <span>Monthly Summary</span></a>
            </li>
            
           
              <hr class="sidebar-divider"> 


                  <!-- Nav Item - Report -->
           
            <!-- <li class="nav-item">
                <a id="step-seven"class="nav-link" href="{{route('admin.report')}}">
                    <i class="fas fa-fw  fa-file "></i>
                    <span>Report</span></a>
            </li>
            
         
              <hr class="sidebar-divider"> -->


                 <!-- Nav Item - Clients -->
               <!-- <li class="nav-item">
                <a class="nav-link" href="{{route('admin.client')}}">
                <i class="fas fa-handshake"></i>
                    <span>Business</span></a>
            </li> -->
            
             


                 <!-- Nav Item - Calender -->
                 <li class="nav-item ">
                <a id="step-four"class="nav-link" href="{{route('admin.account')}}">
                <i class="fas fa-money-check"></i>
                <span>Account</span></a>
                </li>
                <hr class="sidebar-divider">
        
              <!-- <hr class="sidebar-divider"> -->

                <!-- Nav Item - Branch/Departments -->
                <li class="nav-item">
                <a class="nav-link" href="{{route('admin.branchdepartment')}}">
                <i class="fas fa-code-branch"></i>
                    <span>Departments</span></a>
            </li>
            
              <!-- Divider -->
              


            


           

            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           

        </ul>