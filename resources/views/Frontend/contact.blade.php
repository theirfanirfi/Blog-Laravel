@extends('Frontend._Layout')
@section('content')

<!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
<?php echo $contact->contact_description; ?>

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

