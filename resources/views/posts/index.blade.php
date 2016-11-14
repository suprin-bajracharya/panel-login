@extends('main')

@section('title', '|Posts')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h3>All Posts</h3>
		</div>
		<div class="col-md-2">
			<a class="btn btn-warning" href="{{route('posts.create')}} ">
				New Posts
			</a>
		</div>
	</div>

	<div class="row">
		<table class="table table-striped">
			<thead>
				
				<th>Title</th>
				<th>Slug</th>
				<th>Body</th>
				<th>Created At</th>
				<th colspan="3" style="text-align: center;">Actions</th>
			</thead>
			<tbody>
				@foreach($posts as $post)
				<tr>
					
					<td>{{ $post->title }}</td>
					<td>{{ $post->slug }} </td>
					<td>{{substr(strip_tags($post->body), 0, 50)}}
							{{strlen(strip_tags($post->body))>50?"...":""}}</td>
					<td>{{ $post->created_at }} </td>
					<td>
					@can('update', $post)
						<a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-primary">Edit</a> 
					@endcan
					</td>
					<td>
					<a href="{{route('posts.show' ,$post->id)}}" class="btn btn-sm btn-default">View</a>
					</td>
					<td>
					@can('destroy', $post)
						{!!Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE'])!!}
						<button class="btn btn-danger btn-sm">Delete</button>

						{!!Form::close()!!}
					@endcan
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	


@endsection