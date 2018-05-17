@extends('layout')
@section('class', 'encounter')

@section('content')
<div class="d-flex mb-4">
  <a href="/encounters">&lt;&lt; Back</a>
  <div class="ml-auto">
      <a href="/encounters/{{$encounter->id}}/edit" class="btn btn-default pt-0 pb-0 mb-0">Edit</a>
      {!! Form::open(['action' => ['NotesController@destroy', $encounter->id], 'method'=>'POST', 'class'=>'float-right']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em']) }}
      {!! Form::close() !!}
  </div>
</div>
<h1 class="header">{{ $encounter->title }}</h1>

<hr>

<div>
  {!! $encounter->content !!}
</div>
@endsection