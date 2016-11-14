@extends('main')

@section('title' ,'|Create New Role')

@section('content')

    <div class="well">

        <h3>Add Roles</h3>

        {!! Form::open(array('route' => 'roles.store')) !!}
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Title Here">
            </div>

            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" class="form-control" placeholder="Enter Description Here"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Role</button>
        {!! Form::close() !!}
    </div><!-- well ends here -->

@endsection
