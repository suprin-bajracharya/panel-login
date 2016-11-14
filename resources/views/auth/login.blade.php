@extends('main')

@section('title', '|Login')

@section('content')
	
	{!! Form::open() !!}

		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="Password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>
				
		<button type="submit" class="btn btn-primary btn-block">Login</button>

	{!! Form::close() !!}

@endsection