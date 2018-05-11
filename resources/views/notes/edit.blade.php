@extends('layout')

@section('content')
  <h1>Edit Post</h1>

  {!! Form::open(['action' => ['NotesController@update', $note->id], 'method' => 'POST'] ) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $note->title, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
          {{ Form::label('content', 'Content') }}
          {{ Form::textarea('content', $note->content, ['id' => 'article-ckeditor', 'class' => 'form-control']) }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}

@endsection