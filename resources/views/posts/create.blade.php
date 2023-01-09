@extends('share.master')
@section('title','| Add New Post');
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Add New Post</h1>
        {!! Form::open(['route' => 'posts.store']) !!}
            {{ Form::label('title','Title:') }}
            {{ Form::text('title',null,array('class' => 'form-control')) }}
            {{ Form::label('message','Details:') }}
            {{ Form::textarea('message',null,array('class' => 'form-control')) }}
            {{ Form::submit('Add Post',array('class' => 'btn btn-success', 'style' => 'margin-top: 10px')) }}
        {!! Form::close() !!}   
    </div>
</div>
@endsection