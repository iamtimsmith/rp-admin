@extends('layout')
@section('class', 'notes')

@section('content')

<div class="row">
  <div class="col-sm-9">
    <div>
      <h1 class="float-left">Campaign Notes</h1>
      <a href="/notes/create" class="btn btn-default float-right">New</a>
    </div>

    <search></search>
    @if (count($notes) > 0)
      <ul class="list-group" id="list">
      @foreach($notes as $note)
        <li class="list-group-item"><a href="/notes/{{$note->id}}">{{ $note->title }}</a>
          {!! Form::open(['action' => ['NotesController@destroy', $note->id], 'method'=>'POST', 'class'=>'float-right']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em']) }}
          {!! Form::close() !!}
        </li>
      @endforeach
      </ul>
    @else
      <p>You don't have any notes yet. <a href="/notes/create">Click here to create one</a>.</p>
    @endif
  </div>
</div>
@endsection