@extends('Frontend._Layout')
@section('content')
<style>

.tags {
  list-style: none;
  margin: 0;
  overflow: hidden;
  padding: 0;
}

.tags li {
  float: left;
}

.tag {
  background: #eee;
  border-radius: 3px 0 0 3px;
  color: #999;
  display: inline-block;
  height: 26px;
  line-height: 26px;
  padding: 0 20px 0 23px;
  position: relative;
  margin: 0 10px 10px 0;
  text-decoration: none;
  -webkit-transition: color 0.2s;
}

.tag::before {
  background: #fff;
  border-radius: 10px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
  content: '';
  height: 6px;
  left: 10px;
  position: absolute;
  width: 6px;
  top: 10px;
}

.tag::after {
  background: #fff;
  border-bottom: 13px solid transparent;
  border-left: 10px solid #eee;
  border-top: 13px solid transparent;
  content: '';
  position: absolute;
  right: 0;
  top: 0;
}

.tag:hover {
  background-color: crimson;
  color: white;
}

.tag:hover::after {
   border-left-color: crimson;
}

</style>
<!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

<div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
          </h2>
          <h3 class="post-subtitle">
          </h3>
        </a>
        @if(!empty($b->blog_image))
        <img src="{{ URL::asset('images/') }}/{{ $b->blog_image }}" class="img-responsive img-thumbnail" style="width:100%; height:300px;" />
        @endif
        <p style="word-break: break-all;">
         <?php echo $b->blog_description; ?>

        </p>
        <p class="post-meta">Posted by
          <a href="#">{{ $b->getAuthor() }}</a>
          on {{ $b->updated_at }}</p>

          <p class="post-meta" style="">Category
                <a href="{{ route('blogsbycategory',['id' => $b->cat_id]) }}">{{ $b->getBlogCategory() }}</a>
               </p>
      </div>

      <?php $exploded = explode(",",$b->tags); ?>
      <p  style="font-size:12px;margin:0px;">Tags:</p>
      <ul class="tags">
          @foreach ($exploded as $e)
          <li><a href="#" class="tag" style="font-size:12px;">{{ $e }}</a></li>
          @endforeach
          </ul>


          <!-- keywords -->

          <?php $exploded = explode(",",$b->keywords); ?>
          <p  style="font-size:12px;margin:0px;">Keywords:</p>
          <ul class="tags">
              @foreach ($exploded as $e)
              <li><a href="#" class="tag" style="font-size:12px;">{{ $e }}</a></li>
              @endforeach
              </ul>
      <hr>

      </div>
    </div>
  </div>

@endsection

