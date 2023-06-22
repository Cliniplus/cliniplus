
<!-- Profile Sidebar -->
<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src="{{config('constants.img_url').Session()->get('user')['image']}}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>{{Session()->get('user')['fullName']}}</h3>

                <div class="patient-details">
                    <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li class="{{ Request::routeIs('doctorDashboard') ? 'active' : '' }}">
                    <a href="{{route('doctorDashboard')}}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('getAppointments') ? 'active' : '' }}">
                    <a href="{{route('getAppointments')}}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('getMyPatient') ? 'active' : '' }}">
                    <a href="{{route('getMyPatient')}}">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('getScheduleTime') ? 'active' : '' }}">
                    <a href="{{route('getScheduleTime')}}">
                        <i class="fas fa-hourglass-start"></i>
                        <span>Schedule Timings</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('getReview') ? 'active' : '' }}">
                    <a href="{{route('getReview')}}">
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('getDoctorChat') ? 'active' : '' }}">
                    <a href="{{route('getDoctorChat')}}">
                        <i class="fas fa-comments"></i>
                        <span>Message</span>
                        <small class="unread-msg">23</small>
                    </a>
                </li>  
                 <li class="{{ Request::routeIs('getDoctorChat') ? 'active' : '' }}">
                    <a href="{{route('blog.index')}}">
                        <i class="fas fa-comments"></i>
                        <span>Blogs</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('getCompleteDoctorProfile') ? 'active' : '' }}">
                    <a href="{{route('getCompleteDoctorProfile')}}">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('getSocialMedia') ? 'active' : '' }}">
                    <a href="{{route('getSocialMedia')}}">
                        <i class="fas fa-share-alt"></i>
                        <span>Social Media</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('getChangePassword') ? 'active' : '' }}">
                    <a href="{{route('getChangePassword')}}">
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /Profile Sidebar -->
