@extends('layout')

@section('content')
  <h1>Edit Encounter</h1>

  {!! Form::open(['action' => ['EncountersController@update', $encounter->id], 'method' => 'POST'] ) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $encounter->title, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
          {{ Form::label('content', 'Content') }}
          {{ Form::textarea('content', $encounter->content, ['id' => 'article-ckeditor', 'class' => 'form-control']) }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}

@endsection