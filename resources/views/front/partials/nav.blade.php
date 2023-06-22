
      <!-- Header -->
      <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
          <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
              <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </a>
            <a href="{{route('home')}}" class="navbar-brand logo">
              <img src="{{asset('front/img/about/logoPage.png')}}" class="img-fluid" alt="Logo">
            </a>
          </div>
          <div class="main-menu-wrapper">
            <div class="menu-header">
              <a href="{{route('home')}}" class="menu-logo">
                <img src="{{asset('front/img/about/logoPage.png')}}" class="img-fluid" alt="Logo" />
              </a>
              <a id="menu_close" class="menu-close" href="javascript:void(0);">
                <i class="fas fa-times"></i>
              </a>
            </div>
            <ul class="main-nav">
              <li class="active">
                <a href="{{route('home')}}">Home</a>
              </li>
              <li class="has-submenu">
                <a href="{{route('getSearch')}}">Search Doctors </a>
              </li>
              <li class="has-submenu">
                <a href="{{route('blogs')}}">Blogs</a>
              </li>
              <li class="has-submenu">
                <a href="{{route('about')}}">About Us</a>
              </li>
              <li class="login-link">
                @if(Session()->has('user'))
                  @if(Session()->get('userType') == 'Admin')
                  <a  href="{{route('adminDashboard')}}">dashboard</a>
                  @elseif(Session()->get('userType') == 'Doctor')
                  <a  href="{{route('doctorDashboard')}}">dashboard</a> 
                  @elseif(Session()->get('userType') == 'Patient')
                  <a href="{{route('patientDashboard')}}">dashboard</a>
                  @endif 
                <a href="{{route('logout')}}">Logout</a>
                @else 
                <a href="{{route('getPatientLogin')}}">Login</a>
                <a href="{{route('getPatientSignup')}}">Signup</a>
                @endif
          
              </li>
  
            </ul>
          </div>
          <div>
            <ul class="nav header-navbar-rht">
              <li class="nav-item">
                @if(Session()->has('user'))
                <li class="nav-item contact-item">
                  <div type="button" class="position-relative">
                    <img src="{{asset('front/img/chat.png')}}">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-new">+99
                      <span class="visually-hidden"></span></span>
                  </div>
                </li>
                <li class="nav-item contact-item">
                  <div type="button" class="position-relative">
                    <img src="{{asset('front/img/not.png')}}">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">+99
                      <span class="visually-hidden"></span></span>
                  </div>
                </li>
                <div class="dropdown">
                  <div class="drop-img">
                    <img src="http://ac7a1ae098-001-site1.etempurl.com{{Session()->get('user')['image']}}" alt="">
                  </div>
                  <div class="dropdown-content">

                    @if(Session()->get('userType') == 'Admin')
                    <a  href="{{route('adminDashboard')}}">dashboard</a>
                    @elseif(Session()->get('userType') == 'Doctor')
                    <a  href="{{route('doctorDashboard')}}">dashboard</a> 
                    @elseif(Session()->get('userType') == 'Patient')
                    <a href="{{route('patientDashboard')}}">dashboard</a>
                    @endif 

                    <a  href="{{route('logout')}}">Logout</a>
                
                  </div>
                </div>

                @else
                <a class="nav-link header-login m-2 rounded-14" href="{{route('getPatientLogin')}}">login</a>
                <a class="nav-link header-login m-2 rounded-14" href="{{route('getPatientSignup')}}">Signup</a>
                @endif
           
              </li>
              
              <li class="nav-item lang-section">
                <img src="{{asset('front/img/lang.png')}}" alt="lang Image" />
                <p>العربية</p>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- /Header -->
  