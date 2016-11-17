@extends('main')

@section('content')
	<div class="container">
		<div class="col-md-8 col-offset-md-2">

			@if(Auth::check())
				<h1>hello {{Auth::user()->name}} </h1>
			@endif

			@foreach($posts as $pst)
		        <div class="post">
		          <h3>{{$pst->title}}</h3>
		          <p>{{substr(strip_tags($pst->body), 0, 100)}} {{strlen(strip_tags($pst->body))>100?"..." : ""}} </p>
		          <a href="{{route('posts.show', $pst->id)}} " class="btn btn-primary">Read More</a>
		        </div> <hr>
	      	@endforeach
		</div>

	</div>
	
	
	
@endsection