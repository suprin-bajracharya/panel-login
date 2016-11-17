@extends('main')

@section('content')

	<table class="table table-striped">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Roles</th>
			
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					
					{!!Form::open(['route'=>['admin.assign', $user->id], 'method'=>'post'] ) !!}
						<td>{{ $user->name}} </td>
						<td>{{ $user->email}} </td>
							<td>
							<select name="role" id="role">
								@foreach($roles as $role)
									<option value="{{$role->id}}" name="{{$role->name}}">{{$role->name}} </option>
								@endforeach
							</select>
						</td>
						<td><button class="btn btn-sm btn-info">Assign Roles</button> </td>
					{!!Form::close()!!}
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection