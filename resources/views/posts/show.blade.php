@extends('share.master')
@section('title','| View Post');
@section('content')
<h1>{{ $post->title }}</h1>
<p class="fw-light">{{ $post->message }}</p>
<p class="text-muted">
   Posted:  {{date('M j,Y h:ia',strtotime($post->created_at)) }}
  </p>
  <p class="text-muted">
    Post Updated:  {{date('M j,Y h:ia',strtotime($post->updated_at)) }}
   </p>
   <div class="row">
    <div class="col-md-3">
        {!! Html::linkRoute('posts.edit','Edit',array($post->id)) !!}
    </div>
    <div class="col-md-3">
        {!! Html::linkRoute('posts.destroy','Remove',array($post->id)) !!}
    </div>
   </div>
</div>
@endsection