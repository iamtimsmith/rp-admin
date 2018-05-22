@extends('layout')

@section('content')
  <h1 class="header">Edit Locations</h1>

  {!! Form::open(['action' => ['LocationsController@update', $location->id], 'method' => 'POST', 'id' => 'form'] ) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $location->title, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('monsters', 'Monsters') }}
        <small>List the monsters that will be in this location (names must be singular).</small>
        {{ Form::text('monsters', $location->monsters, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('encounters', 'Encounters') }}
        <small>List the encounters that will be in this location (names must match the encounter).</small>
        {{ Form::text('encounters', $location->encounters, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Content') }}
        <div id="location-notes">{!! $location->content !!}</div>
        {{ Form::text('content', '', ['class' => 'd-none', 'id' => 'content']) }}
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
  

</script>
@endsection