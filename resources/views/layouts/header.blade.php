  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ url('public/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ url('public/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ url('public/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-custom-bg elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="{{ url('public/assets/psas_logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="" style="">AMS-PSAS</span>
    </a> -->

    <div class="sidebar-logo-cont" style="text-align: center;">
        <img src="{{ url('public/assets/psas_logo.png')}}" alt="PSAS Logo" class="sidebar-logo" style="width: 150px;">
        <hr>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel pb-2 pt-2 mb-3 d-flex" style="background-color: #2cd695;">
        <div class="image">
          @if(Auth::user()->profile_picture)
            <img src="{{ asset('public/' . Auth::user()->profile_picture)}}" class="img-circle elevation-2" alt="User Image">
          @else
            <img src="{{ url('public/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block text-white"><strong>{{ Auth::user()->name }}</strong></a>
        </div>
      </div>
      <hr>

      <!-- Sidebar Menu -->
      <nav class="sidebar-nav">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->user_type == 1)
          <li class="nav-item">
            <a href="{{ url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Admins
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/lecturer/list')}}" class="nav-link @if(Request::segment(2) == 'lecturer') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Lecturers
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/student/list')}}" class="nav-link @if(Request::segment(2) == 'student') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Students
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Academics
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/programs/list')}}" class="nav-link @if(Request::segment(2) == 'programs') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Programs
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/courses/list')}}" class="nav-link @if(Request::segment(2) == 'courses') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Courses
                  </p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{ url('admin/groups/list')}}" class="nav-link @if(Request::segment(2) == 'groups') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Groups / Class
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/enrollment/list')}}" class="nav-link @if(Request::segment(2) == 'enrollment') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Enrollment
                  </p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="{{ url('admin/institution')}}" class="nav-link @if(Request::segment(3) == 'institution') active @endif">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Institution Name
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{ url('admin/profile')}}" class="nav-link @if(Request::segment(2) == 'profile') active @endif">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type == 2)
          <li class="nav-item">
            <a href="{{ url('lecturer/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('lecturer/courses/list')}}" class="nav-link @if(Request::segment(2) == 'courses') active @endif">
              <i class="nav-icon fa fa-book"></i>
              <p>
                My Subjects
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('lecturer/classgroups')}}" class="nav-link @if(Request::segment(2) == 'classgroups') active @endif">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Class Group
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('lecturer/students')}}" class="nav-link @if(Request::segment(2) == 'students') active @endif">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Students
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Assignment / Task
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('lecturer/allassignment')}}" class="nav-link @if(Request::segment(2) == 'allassignment') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    All Assignments
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('lecturer/assignmentgroup')}}" class="nav-link @if(Request::segment(2) == 'assignmentgroup') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Assignment Groups
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('lecturer/progressreport')}}" class="nav-link @if(Request::segment(2) == 'peermarks') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Progress Report
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('lecturer/peermarks')}}" class="nav-link @if(Request::segment(2) == 'peermarks') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Peer Marks
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('lecturer/submission')}}" class="nav-link @if(Request::segment(2) == 'submission') active @endif">
                  <i class="nav-icon far fa-circle"></i>
                  <p>
                    Submission
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('lecturer/profile')}}" class="nav-link @if(Request::segment(2) == 'profile') active @endif">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          
          @elseif(Auth::user()->user_type == 3)
          <li class="nav-item">
            <a href="{{ url('student/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @endif
          
          <li class="nav-item">
            <a href="{{ url('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>