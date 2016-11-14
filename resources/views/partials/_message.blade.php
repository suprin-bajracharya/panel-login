@if(Session::has('Success'))
	<div class="alert alert-success">
		<strong>Success:</strong>
		{{Session::get('Success')}}
	</div>
@endif

@if(Session::has('Error'))
	<div class="alert alert-danger">
		<strong>Error:</strong>
		{{Session::get('Error')}}
	</div>
@endif

@if(count($errors)>0)
	<div class="alert alert-danger">
		<strong>You have encountered the following problems:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}} </li>
			
			@endforeach
		</ul>
	</div>
@endif