@extends('share.master')
@section('content')
<div class="row" style="margin-top: 10px">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Custom jumbotron</h1>
          <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
          <button class="btn btn-primary btn-lg" type="button">Read more</button>
        </div>
      </div>
</div>
@foreach ($posts as $item)
<div class="row">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $item->title }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ substr($item->message,0,50)}} {{ strlen($item->message) > 50 ? '...' : ''}}</h6>
          <p class="card-text">{{ substr($item->message,0,100)}} {{ strlen($item->message) > 100 ? '...' : ''}}</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
    <hr>
</div>
@endforeach

@endsection