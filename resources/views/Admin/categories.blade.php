  @extends('Admin.AdminLayout')
  @section('content')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog Categories
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Category</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

            <div class="col-md-6">
            <form action="{{ route('addcategory') }}" method="post">
                <input type="text" name="cat_title" placeholder="Category Name" class="form-control" />
@csrf
            </div>

<div class="col-md-1">
    <button type="submit" class="btn btn-primary">Add</button>
</div>
</form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->


      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="cat_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th>Name</th>
                        <th>Blogs</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach ($cats as $c)
                    <td>{{ $c->cat_title }}</td>
                    <td>{{ $c->getBlogsCountForCat() }}</td>
                    <td><a href="{{ route('editcat',['id' => $c->cat_id]) }}"><i class="fa fa-pencil"></i></a> | <a href="{{ route('deletecat',['id' => $c->cat_id]) }}"><i class="fa fa-trash"></i></a></td>
                    @endforeach
                </tr>

                </tbody>
        <tfoot>
        <tr>
                <th>Name</th>
                <th>Blogs</th>
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
