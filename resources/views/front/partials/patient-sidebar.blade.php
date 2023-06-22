
	<!-- Profile Sidebar -->
            <div class="profile-sidebar">
                <div class="widget-profile pro-widget-content">
                    <div class="profile-info-widget">
                        <a href="#" class="booking-doc-img">
                            <img src="http://ac7a1ae098-001-site1.etempurl.com{{Session()->get('user')['image']}}" alt="User Image">
                        </a>
                        <div class="profile-det-info">
                            <h3>{{Session()->get('user')['fullName']}}</h3>
                            <div class="patient-details">
                                <h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-widget">
                    <nav class="dashboard-menu">
                        <ul>
                            <li class="active">
                                <a href="{{route('patientDashboard')}}">
                                    <i class="fas fa-columns"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('favourites')}}">
                                    <i class="fas fa-bookmark"></i>
                                    <span>Favourites</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('getMessage')}}">
                                    <i class="fas fa-comments"></i>
                                    <span>Message</span>
                                    <small class="unread-msg">23</small>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('getPatientProfile')}}">
                                    <i class="fas fa-user-cog"></i>
                                    <span>Profile Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('getChangePassword')}}">
                                    <i class="fas fa-lock"></i>
                                    <span>Change Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="index-2.html">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
    <!-- / Profile Sidebar -->
