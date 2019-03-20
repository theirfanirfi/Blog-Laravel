  @extends('Admin.AdminLayout')
  @section('content')
  <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            @include('Admin.includes.alert')


      <div class="box">
            <div class="box-header">
              <h3 class="box-title">About Us Page Description</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('saveabout') }}" method="POST">
                    <textarea name="about_description" class="textarea" placeholder="Place some text here"
                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    <div class="form-group pull-right">
                            <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
                                       </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @endsection
