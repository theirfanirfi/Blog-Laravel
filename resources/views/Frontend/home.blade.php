@extends('Frontend._Layout')
@section('content')

<!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

@foreach ($blogs as $b)
<div class="post-preview">
        <a href="{{ route('blog',['id' => $b->id]) }}">
          <h2 class="post-title">
           {{ $b->blog_title }}
          </h2>
          <h3 class="post-subtitle">

          </h3>
        </a>

        @if(!empty($b->blog_image))
        <img src="{{ URL::asset('images/') }}/{{ $b->blog_image }}" class="img-responsive img-thumbnail" style="width:100%; height:300px;" />
        @endif

        <?php if(!empty($b->blog_excerpt)){ ?>

            {{ $b->blog_excerpt }}
           <?php } else {

               echo substr($b->blog_description,0,300). " ...";
            } ?>
            <br/>
        <a class="btn-sm btn-info" style="color:white;" href="{{ route('blog',['id' => $b->id]) }}">Read more</a>
        <p class="post-meta">Posted by
          <a href="#">{{ $b->getAuthor() }}</a>
          on {{ $b->updated_at }}</p>
      </div>
      <hr>
@endforeach

      </div>
      <div class="col-lg-2 col-md-2 mx-auto">
          <h6>Categories</h6>
        <ul>
            @foreach ($cats as $c)
           <p> <li style="list-style-type: none;font-size:14px;"><a href="{{ route('blogsbycategory',['id' => $c->cat_id]) }}"> {{ $c->cat_title }} </a></li>
           </p>
            @endforeach
        </ul>
      </div>
    </div>
  </div>

@endsection

