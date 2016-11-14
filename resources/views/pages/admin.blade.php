@extends('main')

@section('content')

	<table class="table table-striped">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>User</th>
			<th>Super Admin</th>
			<th>Admin</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					
					{!!Form::open(['route'=>['admin.assign', $user->id], 'method'=>'post'] ) !!}
						<td>{{ $user->name}} </td>
						<td>{{ $user->email}} </td>

						<td>
							<input type="checkbox" {{$user->hasRole('User')? 'checked': ''}} name="role_user">
						</td>
						<td>
							<input type="checkbox" {{$user->hasRole('Super Admin')? 'checked': ''}} name="role_super_admin">
						</td>
						<td>
							<input type="checkbox" {{$user->hasRole('Admin')? 'checked' : ''}} name="role_admin">
						</td>
						<td><button class="btn btn-sm btn-info">Assign Roles</button> </td>
					{!!Form::close()!!}
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection