@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<img class="img-responsive" src="{!! url('image/large/' . $post->image) !!}" width="100%">
				<div class="panel-body">
					<h1 class="h3">{{ $post->title }}</h1>
					{!! $post->content !!}
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">New Post</div>
				<div class="panel-body">
					<div class="row">
						@foreach($posts as $post)
						<div class="col-sm-12">
							<div class="media">
								<div class="media-left">
									<a href="{{ url($post->id . '-' . str_slug($post->title)) }}">
										<img class="media-object thumbnail" src="{{ url('image/small/' . $post->image) }}" height="64" width="64">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">
										<a href="{{ url($post->id . '-' . str_slug($post->title)) }}">{{ $post->title }}</a>
									</h4>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection