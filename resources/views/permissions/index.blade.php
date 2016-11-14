@extends('main')

@section('content')
	
	<div class="row">
		<div class="col-md-10">
			<h3>All permissions</h3>
		</div>
		<div class="col-md-2">
			<a class="btn btn-warning" href="{{route('permissions.create')}} ">
				New permissions
			</a>
		</div>
	</div>

	<div class="row">
		<table class="table table-striped">
			<thead>
				
				<th>Title</th>
				
				<th>Description</th>
				<th>Created At</th>
				<th colspan="3" style="text-align: center;">Actions</th>
			</thead>
			<tbody>
				@foreach($permissions as $permission)
				<tr>
					
					<td>{{$permission->name}}</td>
					<td>{{$permission->description}} </td>
					<td>{{$permission->created_at}} </td>
					
					<td>
					{{-- @can('update', $post) --}}
						<a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-sm btn-primary">Edit</a> 
					{{-- @endcan --}}
					</td>
					
					<td>
					{{-- @can('destroy', $post) --}}
						{!!Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'DELETE'])!!}
						<button class="btn btn-danger btn-sm">Delete</button>

						{!!Form::close()!!}
					{{-- @endcan --}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	



@endsection