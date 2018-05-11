@extends('layout')
@section('class', 'note')

@section('content')
<div class="d-flex mb-4">
  <a href="/notes">&lt;&lt; Back</a>
  <div class="ml-auto">
      <a href="/notes/{{$note->id}}/edit" class="btn btn-default pt-0 pb-0 mb-0">Edit</a>
      {!! Form::open(['action' => ['NotesController@destroy', $note->id], 'method'=>'POST', 'class'=>'float-right']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class'=>'btn btn-link text-secondary pt-0 pb-0 mb-0', 'style'=>'font-size:1em']) }}
      {!! Form::close() !!}
  </div>
</div>
<h1>{{ $note->title }}</h1>

<hr>

<div>
  {!! $note->content !!}
</div>

@endsection