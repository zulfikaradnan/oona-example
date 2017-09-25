@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="clearfix">
                        <div class="pull-left">Post</div>
                        <div class="pull-right">
                            {{ link_to('post/create', 'Add New', ['class' => 'btn btn-xs btn-success']) }}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <th class="text-center" width="50">ID</th>
                            <th class="text-left">Title</th>
                            <th class="text-left" width="120">Last Modified</th>
                            <th class="text-center" width="120" colspan="2">Action</th>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="text-center">{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <time class="timeago" datetime="{{ $post->updated_at->toIso8601String() }}" title="{{ $post->updated_at->toDayDateTimeString() }}">
                                        {{ $post->updated_at->diffForHumans() }}
                                    </time>
                                </td>
                                <td width="60" class="text-center">
                                    {{ link_to(route('post.edit', $post->id), 'Edit', ['class' => 'btn btn-xs btn-primary']) }}
                                </td>
                                <td width="60">
                                    {{ Form::open(['url' => 'post/' . $post->id, 'method' => 'post']) }}
                                    {!! method_field('DELETE') !!}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $posts->appends(request()->except('post'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
