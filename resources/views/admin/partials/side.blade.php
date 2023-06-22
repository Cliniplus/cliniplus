<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="{{ Request::routeIs('adminDashboard') ? 'active' : '' }}"> 
          <a href="{{route('adminDashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
        </li>
        <li class="{{ Request::routeIs('getAdminAppointments') ? 'active' : '' }}" > 
          <a href="{{route('getAdminAppointments')}}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
        </li>
        <li> 
          <a href="/admins/speciality"><i class="fe fe-users"></i> <span>Specialities</span></a>
        </li>
        <li class="{{ Request::routeIs('getDoctors') ? 'active' : '' }}"> 
          <a href="{{route('getDoctors')}}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
        </li>
        <li class="{{ Request::routeIs('getPatients') ? 'active' : '' }}"> 
          <a href="{{route('getPatients')}}"><i class="fe fe-user"></i> <span>Patients</span></a>
        </li>
        <li class="{{ Request::routeIs('getReviews') ? 'active' : '' }}"> 
          <a href="{{route('getReviews')}}"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
        </li>
        <li class="{{ Request::routeIs('getSettings') ? 'active' : '' }}"> 
          <a href="{{route('getSettings')}}"><i class="fe fe-vector"></i> <span>Settings</span></a>
        </li>
        <li class="{{ Request::routeIs('getInvoices') ? 'active' : '' }}"> 
          <a href="{{route('getInvoices')}}"><i class="fe fe-vector"></i> <span>Invoices</span></a>
        </li>
        <li class="{{ Request::routeIs('getProfile') ? 'active' : '' }}"> 
          <a href="{{route('getProfile')}}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
        </li>  
        <li > 
          <a href="{{route('logout')}}"><i class="fe fe-user-plus"></i> <span>Logout</span></a>
        </li>  
      </ul>
    </div>
  </div>
</div>
<!-- /Sidebar -->