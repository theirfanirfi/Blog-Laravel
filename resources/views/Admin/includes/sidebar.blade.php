  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
                @if(!empty($user->profile_image))
                <img src="{{ URL::asset('images/profile/') }}/{{ $user->profile_image }}" class="image-circle img-circle" style="width:60px;height:40px;" alt="User Image">
                @else
                <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="image-circle img-circle" style="width:60px;height:40px;" alt="User Image">

                @endif
        </div>
        <div class="pull-left info">
          <p>{{ $user->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="">
            <a href="{{ route('categories') }}">
              <i class="ion ion-pie-graph"></i>
              <span>Categories</span>
            </a>
          </li>


        <li class="treeview">
          <a href="#">
            <i class="ion ion-bag"></i>
            <span>Blogs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('blogs') }}"><i class="fa fa-circle-o"></i>View</a></li>
            <li><a href="{{ route('addblog') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>
        <li class="">
          <a href="{{ route('users') }}">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>

        <li class="">
                <a href="{{ route('aboutus') }}">
                  <i class=""></i>
                  <span>About Us</span>
                  <span class="pull-right-container">

                  </span>
                </a>
              </li>

              <li class="">
                    <a href="{{ route('contact') }}">
                      <i class=""></i>
                      <span>Contact Us</span>
                      <span class="pull-right-container">

                      </span>
                    </a>
                  </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
