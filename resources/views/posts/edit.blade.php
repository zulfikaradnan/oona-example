@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('flash_message'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="clearfix">
                        <div class="pull-left">Edit Post</div>
                        <div class="pull-right">
                            {{ link_to('post', 'Back to list', ['class' => 'btn btn-xs btn-default']) }}
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    {{ Form::open(['url' => 'post/' . $post->id, 'method' => 'put', 'files' => true]) }}
                        {!! method_field('PUT') !!}

                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
                            {{ Form::text('title', old('title', @$post->title), ['class' => 'form-control']) }}

                            @if ($errors->has('title'))
                                <div class="help-block">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            {{ Form::label('image', 'Image', ['class' => 'control-label']) }}
                            {{ Form::file('image') }}

                            @if ($errors->has('image'))
                                <div class="help-block">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                            {{ Form::label('content', 'Content', ['class' => 'control-label']) }}
                            {{ Form::textarea('content', old('content', @$post->content), ['class' => 'form-control']) }}

                            @if ($errors->has('content'))
                                <div class="help-block">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
                            {{ link_to('post', 'Back to list', ['class' => 'btn btn-default']) }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
