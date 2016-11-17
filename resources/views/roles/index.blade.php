@extends('main')

@section('title', '|Roles')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h3>All Roles</h3>
		</div>
		<div class="col-md-2">
			<a class="btn btn-warning" href="{{route('roles.create')}} ">
				New Roles
			</a>
		</div>
	</div>

	<div class="row">
		<table class="table table-striped">
			<thead>
				
				<th>Title</th>
				
				<th>Description</th>
				<th>Assign Permission</th>
				<th colspan="3" style="text-align: center;">Actions</th>
			</thead>
			<tbody>
				@foreach($roles as $role)
				<tr>
					
					<td>{{$role->name}}</td>
					<td>{{$role->description}} </td>
					<td>
						<select name="permission" id="permission">
							@foreach($permissions as $permission)
								<option value="{{$permission->name}}"  name="{{$permission->name}}">{{$permission->name}} </option>
							@endforeach
						</select>
					</td>

					<td>
					{{-- @can('update', $post) --}}
						<a href="" class="btn btn-info btn-sm">Assign Permissions</a>
					{{-- @endcan --}}
					</td>
					
					<td>
					{{-- @can('update', $post) --}}
						<a href="{{route('roles.edit', $role->id)}}" class="btn btn-sm btn-primary">Edit</a> 
					{{-- @endcan --}}
					</td>
					
					<td>
					{{-- @can('destroy', $post) --}}
						{!!Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE'])!!}
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