  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
         <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
              <i class="fa fa-laptop"></i>
              <span>Categories</span>
            </a>
          </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Blogs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i>View</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>
        <li class="">
          <a href="{{ route('users') }}">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
