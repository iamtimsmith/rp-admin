@extends('layout')
@section('class', 'locations')

@section('content')
  <h1 class="header">Edit Locations</h1>

  {!! Form::open(['action' => ['LocationsController@update', $location->id], 'method' => 'POST', 'id' => 'form'] ) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $location->title, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('campaign', 'Campaign') }}
        {{ Form::text('campaign', $location->campaign, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Content') }}
        <div id="location-notes">{!! $location->content !!}</div>
        {{ Form::text('content', '', ['class' => 'd-none', 'id' => 'content']) }}
      </div>

      <div class="form-group">
          {{ Form::label('monsters', 'Monsters') }}
          <small class="text-secondary">List the monsters that will be in this location (names must be singular and match a monster in the SRD material).</small>
          {{ Form::text('monsters', $location->monsters, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('encounters', 'Encounters') }}
          <small class="text-secondary">List the encounters that will be in this location (names must match the encounter).</small>
          {{ Form::text('encounters', $location->encounters, ['class' => 'form-control']) }}
        </div>

      <div class="form-group">
        {{ Form::label('images', 'Images') }}
        <image-handler :images="[{{ $location->images }}]"></image-handler>
        {{  Form::text('images', '', ['id'=>'inputMap', 'class'=>'d-none']) }}
      </div>
        
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
        <a href="/locations/{{ $location->id }}" class="btn btn-default text-danger">Cancel</a>
  {!! Form::close() !!}

@endsection


@section('contentjs')
<script>
  var quill = new Quill('#location-notes', {
    theme:'snow',
    modules: {
      toolbar: toolbarOptions
    }
  });
  
  var form = document.querySelector('#form');
  form.onsubmit = function() {
    var textarea = document.querySelector('#content');
    textarea.value = quill.root.innerHTML;
  }
  

  // Thumbnail
  var thumbnail = document.getElementByClassName('thumbnail')[0];
  var input = document.querySelector('#inputMap');
  function removePhoto() {
    input.value = "noimage.png";
    
  }

</script>
@endsection