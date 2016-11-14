@extends('main')

@section('title', '|Edit Post')


@section('content')

	<div class="well">

        <h3>Edit Posts</h3>

        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'])!!}
            {{Form::label('title','Title :')}}
				{{Form::text('title', null, ["class" => 'form-control'])}}

				{{Form::label('slug','Slug :', [])}}
				{{Form::text('slug', null, ["class" => 'form-control input-lg'])}}
				
				{{Form::label('body','Body :', [])}}
				{{Form::textarea('body',null, ["class" => 'form-control'])}}

            <button type="submit" class="btn btn-primary">Edit Post</button>

        {!! Form::close() !!}
    </div><!-- well ends here -->


@endsection