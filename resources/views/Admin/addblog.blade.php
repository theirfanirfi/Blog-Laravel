  @extends('Admin.AdminLayout')
  @section('content')
  <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Blog Post
        <small></small>
      </h1>
      <ol class="breadcrumb">
            <form action="{{ route('publishblog') }}" method="post" enctype="multipart/form-data">
                @csrf
            <button type="submit" name="publish" class="btn btn-primary">Publish Post</button>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('Admin.includes.alert')
    <div class="row">
<div class="col-md-6">
<div class="box">
        <div class="box-header">
          <h3 class="box-title">Blog Post</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

                    <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Blog Post title" name="blog_title">
                          </div>

                          <div class="form-group">
                            <label for="blog_excerpt">Blog Excerpt</label>
                  <textarea class="form-control" name="blog_excerpt" id="blog_excerpt"></textarea>
                              </div>

                              <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="blog_image">
                                  </div>
                              <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" placeholder="Slugs" name="blog_slugs">
                                  </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</div>

<div class="col-md-6">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <div class="form-group">
                            <label for="cat">Category</label>
                            <select name="cat_id" class="form-control" id="cat">
                                <option value="0">Default</option>
                                @foreach ($cats as $c)
                                <option value="{{ $c->cat_id }}">{{ $c->cat_title }}</option>
                                @endforeach
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" id="tags" placeholder="Tags, must be separated by comma (,)" name="blog_tags">

                              </div>
                              <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <input type="text" class="form-control" id="keywords" placeholder="Keywords, must be separated by comma (,)" name="keywords">
                                  </div>




            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>

</div>


<div class="row">
    <div class="col-md-12">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Description</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

                        <textarea name="blog_description" class="textarea" placeholder="Place some text here"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                  <div class="form-group pull-right">
                                        <button type="submit" name="publish" class="btn btn-primary">Publish Post</button>
                                                   </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</div>
</div>
</div>
</form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @endsection
