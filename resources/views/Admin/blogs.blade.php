  @extends('Admin.AdminLayout')
  @section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blogs
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('Admin.includes.alert')




<!-- users -->

<div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                    <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Published on</th>
                            <th>Action</th>
                          </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $b)
                <tr>
                        <td><a href="{{ route('editblog',['id' => $b->id]) }}">{{ $b->blog_title }}</a></td>
                        <td>{{ $b->getBlogCategory() }}</td>
                        <td>{{ $b->created_at }}</td>
                        @if($user->role == 1)
                        <td><a href="{{ route('editblog',['id' => $b->id]) }}"><i class="fa fa-pencil"></i></a> | <a href="{{ route('deleteblog',['id' => $b->id]) }}"><i class="fa fa-trash"></i></a></td>
                        @endif
                    </tr>
                @endforeach



            </tbody>
            <tfoot>
            <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Published on</th>
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
