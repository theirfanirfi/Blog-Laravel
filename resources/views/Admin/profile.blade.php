  @extends('Admin.AdminLayout')
  @section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Profile

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
            <div class="col-md-6">
                <label>Profile Picture</label>
                @if(!empty($user->profile_image))
                <img src="{{ URL::asset('images/profile/') }}/{{ $user->profile_image }}" class="img-responsive img-circle" style="width:250px; height:250px;" />
                @else
                <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-responsive img-circle" />

                @endif

                <form action="{{ route('changeprofileimage') }}" method="post" enctype="multipart/form-data" >

                <div class="form-group">
                    <label for="image">Change Profile Image</label>
                    @csrf
                    <input type="file" class="form-control" id="image" name="profile_image">
                  </div>

                  <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">Change Image</button>
                                   </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('changeprofile') }}" method="post" >
                    <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                          </div>
                          @csrf
                          <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                              </div>

                              <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                 </div>
                </form>
<br/>
<br/>
<br/>
            <h3>Change Password</h3>
            <form action="{{ route('changepassword') }}" method="post" >

            <div class="form-group">
                    <label for="cpass">Current Password</label>
                    <input type="password" class="form-control" id="cpass" name="cpass">
                  </div>

                  <div class="form-group">
                        <label for="npass">New Password</label>
                        <input type="password" class="form-control" id="npass" name="npass">
                      </div>
@csrf

                      <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                         </div>
            </form>
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
