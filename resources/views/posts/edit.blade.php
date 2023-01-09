@extends('share.master')
@section('title','| Edit Post');
@section('content')
<div class="row">
    {!! Form::model($post,['route'=> ['posts.update', $post->id], 'method' => 'PUT']) !!}
    <div class="col-md-8">
        {{ Form::text('title',null,["class"=>'form-control']) }}
        {{ Form::textarea('message',null,["class"=>'form-control']) }}
    </div>
    <h1></h1>
<p class="text-muted">
   Posted:  {{date('M j,Y h:ia',strtotime($post->created_at)) }}
  </p>
  <p class="text-muted">
    Post Updated:  {{date('M j,Y h:ia',strtotime($post->updated_at)) }}
   </p>
   <div class="row">
    <div class="col-sm-3">
        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
    </div>
    <div class="col-sm-3">
        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
    </div>
   </div>
</div>
</div>
@endsection