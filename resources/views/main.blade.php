<!DOCTYPE html>
<html>
<head>
@include('partials._head')

</head>
<body>

@include('partials._nav')

<div class="container">
	
	@include('partials._message')

	@yield('content')

    @yield('scripts')
</div> <!-- container ends here -->

@include('partials._scripts')
</body>
</html>