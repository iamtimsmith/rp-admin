@extends('layout')
@section('class', 'location')

@section('content')
<div class="d-flex mb-4">
    <a href="/locations">&lt;&lt; Back</a>
    <div class="ml-auto">
        <a href="/locations/{{$location->id}}/edit" class="btn btn-default pt-0 pb-0 mb-0">Edit</a>
        {!! Form::open(['action' => ['LocationsController@destroy', $location->id], 'method'=>'POST', 'class'=>'float-right']) !!}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Delete', ['class'=>'btn btn-link text-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em']) }}
        {!! Form::close() !!}
    </div>
  </div>

  <h1>{{ $location->title }}</h1>
  
  <hr>

  @if ($location->map !== 'noimage.jpg')
  <img src="/storage/maps/{{ $location->map }}" alt="{{ $location->title }}" class="col-sm-12 mb-3">
  @endif
  
  <div>
    {!! $location->content !!}
  </div>
@endsection