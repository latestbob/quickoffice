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
<li class="nav-item active">
 <a id="step-two"class="nav-link" href="{{route('account.home')}}">
     <i class="fas fa-fw fa-tachometer-alt"></i>
     <span>Dashboard</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Schedule -->

<!-- <li class="nav-item">
 <a id="step-three"class="nav-link" href="{{route('account.schedule')}}">
     <i class="fas fa-fw  fa-clock"></i>
     <span>Schedule</span></a>
</li>


<hr class="sidebar-divider"> -->


<!-- Nav Item - Task -->

<li class="nav-item">
 <a id="step-four"class="nav-link" href="{{route('account.tasks')}}">
     <i class="fas fa-fw  fa-tasks"></i>
     <span>Tasks+</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Account -->

<!-- <li class="nav-item">
<a id="step-five"class="nav-link" href="{{route('account.accounts')}}">
<i class="fas fa-money-check"></i>
<span>Account</span></a>
</li> -->

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

<!-- <li class="nav-item">
 <a id="step-six"class="nav-link" href="{{route('account.jobs')}}">
     <i class="fas fa-fw  fa-briefcase"></i>
     <span>Jobs+</span></a>
</li>




<hr class="sidebar-divider"> -->

   <!-- Nav Item - Message -->

<!-- <li class="nav-item ">
 <a id="step-seven"class="nav-link" href="/chatify">
     <i class="fas fa-fw  fa-envelope"></i>
     <span>Message</span></a>
</li>


<hr class="sidebar-divider"> -->


   <!-- Nav Item - Report -->

<!-- <li class="nav-item">
 <a id="step-eight"class="nav-link" href="{{route('account.reports')}}">
     <i class="fas fa-fw  fa-file "></i>
     <span>Report</span></a>
</li>


<hr class="sidebar-divider"> -->


  <!-- Nav Item - Clients -->
<!-- <li class="nav-item">
 <a id="step-nine"class="nav-link" href="{{route('account.clients')}}">
 <i class="fas fa-handshake"></i>
     <span>Client</span></a>
</li>


<hr class="sidebar-divider"> -->


  <!-- Nav Item - Calender -->
  <li class="nav-item">
 <a id="step-ten"class="nav-link" href="{{route('account.events')}}">
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