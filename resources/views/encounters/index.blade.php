@extends('layout')
@section('class', 'encounters')

@section('content')
    <div>
      <h1 class="float-left header">Encounters</h1>
      <a href="/encounters/create" class="btn btn-default float-right">New</a>
    </div>

    <search></search>
    @if (count($encounters) > 0)
      <ul class="list-group" id="list">
      @foreach($encounters as $encounter)
        <li class="list-group-item"><a href="/encounters/{{$encounter->id}}">{{ $encounter->title }}</a>
          {!! Form::open(['action' => ['NotesController@destroy', $encounter->id], 'method'=>'POST', 'class'=>'float-right']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em']) }}
          {!! Form::close() !!}
        </li>
      @endforeach
      </ul>
    @else
      <p>You don't have any encounters yet. <a href="/encounters/create">Click here to create one</a>.</p>
    @endif
@endsection