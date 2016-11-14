@extends('main')

@section('title', '|Edit Role')


@section('content')

	<div class="well">

        <h3>Edit Roles</h3>

        {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT'])!!}
            {{Form::label('name','Title :')}}
				{{Form::text('name', null, ["class" => 'form-control'])}}

				
				{{Form::label('description','Description:', [])}}
				{{Form::textarea('description',null, ["class" => 'form-control'])}}

            <button type="submit" class="btn btn-primary">Edit Role</button>

        {!! Form::close() !!}
    </div><!-- well ends here -->


@endsection