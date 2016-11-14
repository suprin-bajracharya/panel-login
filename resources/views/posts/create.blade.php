@extends('main')

@section('title' ,'|Register')

@section('content')

    <div class="well">

        <h3>Add Posts</h3>

        {!! Form::open(array('route' => 'posts.store')) !!}
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title Here">
            </div>

            <div class="form-group">
                <label>Slug:</label>
                <input type="text" name="slug" class="form-control" placeholder="Enter Slug Here">
            </div>

            <div class="form-group">
                <label>Body:</label>
                <textarea class="form-control"  name="body" placeholder="Your Article here" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Post</button>
        {!! Form::close() !!}
    </div><!-- well ends here -->

@endsection
