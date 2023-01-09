@extends('share.master')
@section('title','| All Post');
@section('content')
<div class="row">
    <div class="col-md-10">
        <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New Post</a>
    </div>
    <div class="col-md-12">

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Details</th>
                <th>Created At</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <th>
                            {{ $item->id }}
                        </th>
                        <th>
                            {{ $item->title }}
                        </th>
                        <th class="fw-normal">
                            {{ substr($item->message,0,50)}} {{ strlen($item->message) > 50 ? '...' : ''}}
                        </th>
                        <th class="fw-italic">
                            {{date('M j,Y h:ia',strtotime($item->created_at))}}
                        </th>
                        <th>
                           <a href="{{ route('posts.show', $item->id) }}" class="btn btn-default">View</a> 
                           <a href="{{ route('posts.edit', $item->id) }}" class="btn btn-default">Edit</a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!! $posts->links(); !!}
        </div>
    </div>
</div>
@endsection