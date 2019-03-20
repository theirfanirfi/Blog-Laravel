  @extends('Admin.AdminLayout')
  @section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('users') }}"><i class="fa fa-dashboard"></i> Add Users</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('Admin.includes.alert')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Update User</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
<form action="{{ route('updateuser') }}" method="post">
    @csrf
    <div class="row">
<div class="col-md-3">
        <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" placeholder="Enter Full name" name="name"  value="{{ $up->name }}">
              </div>
</div>

<div class="col-md-3">
        <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $up->email }}">
              </div>
</div>
<input type="hidden" name="user_id" value="{{ $up->id }}" />
<div class="col-md-3">
        <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="" autocomplete="false">
              </div>
</div>
</div>

<div class="row">


        <div class="col-md-3">
                <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword">
                      </div>
        </div>
        <div class="col-md-3">

        <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control select2" style="width: 100%;">
                  <option <?php if($up->role == 1){ echo "selected"; } ?> value="1">Admin</option>
                  <option <?php if($up->role == 2){ echo "selected"; } ?> value="2">Editor</option>
                  <option <?php if($up->role == 3){ echo "selected"; } ?> value="3">Contributor</option>
                </select>
              </div>
        </div>

        <div class="col-md-3">
                <button type="submit" style="margin-top:24px;" class="btn btn-info">Update User</button>
                                </div>
        </div>
</form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->



<!-- users -->

<div class="box">
        <div class="box-header">
          <h3 class="box-title">Users</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                    <tr>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                        <td><a href="">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td><?php if($user->role == 1){ echo "Admin"; }elseif($user->role == 2){ echo "Editor"; }else { echo "Contributor"; } ?></td>
                        <td><a href="{{ route('edituser',['id' => $user->id]) }}"><i class="fa fa-pencil"></i></a> | <a href="{{ route('deleteuser',['id' => $user->id]) }}"><i class="fa fa-trash"></i></a></td>
                 </tr>
                @endforeach



            </tbody>
            <tfoot>
            <tr>
              <th>Full name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
