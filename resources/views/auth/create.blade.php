@extends('main')

@section('title','|Register')

@section('content')
		
	{!! Form::open() !!}

		<div class="form-group" >
			<label for="name">Full Name</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
		</div>

		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="Password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>
		
		
		<button type="submit" class="btn btn-default">Submit</button>

	{!! Form::close() !!}


@endsection