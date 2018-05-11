@extends('layout')
@section('class', 'locations')

@section('content')

<div>
  <h1 class="float-left">Location Notes</h1>
  <a href="/locations/create" class="btn btn-default float-right">New</a>
</div>

<search></search>
@if (count($locations) > 0)
<ul class="list-group" id="list">
  @foreach($locations as $location)
    <li class="list-group-item d-flex"><a href="/locations/{{$location->id}}">{{ $location->title }}</a>
      {!! Form::open(['action' => ['LocationsController@destroy', $location->id], 'method'=>'POST', 'class'=>'ml-auto']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em']) }}
      {!! Form::close() !!}
    </li>
  @endforeach
</ul>
@else
  <p>You don't have any locations yet. <a href="/locations/create">Click here to create one</a>.</p>
@endif

@endsection