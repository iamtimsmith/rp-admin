@extends('layout')

@section('content')
  <h1>Edit Locations</h1>

  {!! Form::open(['action' => ['LocationsController@update', $location->id], 'method' => 'POST'] ) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $location->title, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
          {{ Form::label('content', 'Content') }}
          {{ Form::textarea('content', $location->content, ['id' => 'article-ckeditor', 'class' => 'form-control']) }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}

@endsection