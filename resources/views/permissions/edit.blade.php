@extends('main')

@section('content')

	
	<div class="well">

        <h3>Edit permissions</h3>

        {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'PUT'])!!}
            {{Form::label('name','Title :')}}
				{{Form::text('name', null, ["class" => 'form-control'])}}
				
				{{Form::label('description','Description :', [])}}
				{{Form::textarea('description',null, ["class" => 'form-control'])}}

            <button type="submit" class="btn btn-primary">Edit permission</button>

        {!! Form::close() !!}

@endsection