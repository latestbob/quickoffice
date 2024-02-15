<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center">
   
    <div class="sidebar-brand-text mx-3 font-weight-bolder">{{Auth::user()->office}} 
        <br>
        <h6 class="text-center">Staff</h6>
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a id="step-two" class="nav-link" href="{{route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Schedule -->

<!-- <li class="nav-item">
    <a id="step-three"class="nav-link" href="{{route('staff.schedule')}}">
        <i class="fas fa-fw  fa-clock"></i>
        <span>Schedule</span></a>
</li> -->

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->


   <!-- Nav Item - Task -->

<li class="nav-item">
    <a id="step-four"class="nav-link" href="{{route('staff.tasks')}}">
        <i class="fas fa-fw  fa-tasks"></i>
        <span>Tasks+</span></a>
</li>

  <!-- Divider -->
  <hr class="sidebar-divider">

      <!-- Nav Item - Message -->

<!-- <li class="nav-item ">
<a id="step-five"class="nav-link" href="/chatify">
        <i class="fas fa-fw  fa-envelope"></i>
        <span>Message</span></a>
</li> -->

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->


      <!-- Nav Item - Report -->

<!-- <li class="nav-item">
    <a id="step-six"class="nav-link" href="{{route('staff.report')}}">
        <i class="fas fa-fw  fa-file "></i>
        <span>Report</span></a>
</li> -->

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->


     <!-- Nav Item - Clients -->
  <!-- <li class="nav-item">
    <a id="step-seven"class="nav-link" href="{{route('staff.clients')}}">
    <i class="fas fa-handshake"></i>
        <span>Client</span></a>
</li> -->

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->


     <!-- Nav Item - Calender -->
     <!-- <li class="nav-item">
    <a id="step-eight"class="nav-link" href="{{route('staff.events')}}">
    <i class="fas fa-calendar"></i>
        <span>Events</span></a>
</li> -->

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->



    <!-- Nav Item - Leave  -->
    <li class="nav-item">
    <a id="step-eight"class="nav-link" href="{{route('leavepage')}}">
    <i class="fas fa-calendar"></i>
        <span>Leave Management</span></a>
</li>




 <!-- Divider -->
 <hr class="sidebar-divider">



<!-- Nav Item - Leave  -->
<li class="nav-item">
<a id="step-eight"class="nav-link" href="{{route('staff.expenses')}}">
<i class="fas fa-calendar"></i>
    <span>Expense Approval</span></a>
</li>












<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>