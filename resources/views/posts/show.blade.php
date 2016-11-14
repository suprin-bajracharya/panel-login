@extends('main')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>{{ $post->title }} </h1>
			<p class="lead">{!! $post->body !!} </p>
		</div>
	</div>
		

@endsection