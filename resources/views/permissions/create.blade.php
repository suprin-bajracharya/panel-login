@extends('main')

@section('content')

	<div class="well">

        <h3>Add permissions</h3>

        {!! Form::open(array('route' => 'permissions.store')) !!}
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Title Here">
            </div>

            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" class="form-control" placeholder="Enter Description Here"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add permission</button>
        {!! Form::close() !!}
    </div><!-- well ends here -->

@endsection