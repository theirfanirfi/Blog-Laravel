  @extends('Admin.AdminLayout')
  @section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            @include('Admin.includes.alert')

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
        <div class="box-body">




                <div class="row">
                        <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-aqua">
                            <div class="inner">
                              <h3>{{ $blogs }}</h3>

                              <p>Blogs</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('blogs') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div>




                        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                  <div class="inner">
                                    <h3>{{ $users }}</h3>

                                    <p>Users</p>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-person"></i>
                                  </div>
                                  <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                              </div>




                              <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                      <div class="inner">
                                        <h3>{{ $categories }}</h3>

                                        <p>Categories</p>
                                      </div>
                                      <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                      </div>
                                      <a href="{{ route('categories') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                  </div>

                </div>



        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
