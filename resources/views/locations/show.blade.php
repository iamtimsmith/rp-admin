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


  <div class="row">
    <div class="col-md-10" id="show-details">
        <div class="card">
            <div class="card-body">
        <h1 class="header">{{ $location->title }}</h1>
  
        <hr>

        <div>
          {!! $location->content !!}
        </div>
    </div>
  </div>
</div>
<div class="col-md-2">
    <affix class="" relative-element-selector="#show-details" style="width:200px" :offset="{top:50, bottom:20}">
        
        @if ($location->map !== 'noimage.jpg')
          <p class="h5 header">Maps</p>
          <thumbnails image="/storage/maps/{{$location->map}}"></thumbnails>
        @endif
      </affix>
</div>
  </div>

  
@endsection