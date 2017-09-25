@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">List All Post</div>
				<div class="panel-body">
					<div class="row">
						@foreach($posts as $post)
						<div class="col-sm-6">
							<div class="media">
								<div class="media-left">
									<a href="{{ url($post->id . '-' . str_slug($post->title)) }}">
										<img class="media-object thumbnail" src="{{ url('image/small/' . $post->image) }}" alt="...">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">
										<a href="{{ url($post->id . '-' . str_slug($post->title)) }}">{{ $post->title }}</a>
									</h4>
									<p>{!! str_limit(strip_tags($post->content), 120) !!}</p>
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