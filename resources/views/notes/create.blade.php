@extends('layout')

@section('content')
  <a href="/notes">&lt;&lt; Back</a>
  <h1>Create Campaign Note</h1>

  {!! Form::open(['action' => 'NotesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'] ) !!}
  <div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', '', ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', '', ['id' => 'article-ckeditor', 'class' => 'form-control']) }}
  </div>
    <div class="form-group">
      {{  Form::file('featured_image') }}
    </div>
    {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
{!! Form::close() !!}

@endsection