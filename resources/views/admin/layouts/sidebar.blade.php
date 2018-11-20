<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">jobStock</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucfirst(Auth::user()->name) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
              @can('users.category', Auth::user())
                <li class="nav-item">
                  <a href="{{ route('category.index') }}" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Job Category</p>
                  </a>
                </li>
              @endcan
              
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('permission.index') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Permissions</p>
                </a>
              </li>

              @can('users.create', Auth::user())
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Administrators</p>
                </a>
              </li>
              @endcan

              <li class="nav-item">
                <a href="{{ route('admin.employers') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Employers</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.freelancers') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Freelancers</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.applicants') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Applicants</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.profile.show') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>My Profile</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                     <p>Logout</p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
                </form>
              </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>