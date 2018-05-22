@extends('layout')

@section('content')
  <a href="/locations">&lt;&lt; Back</a>
  <h1 class="header">Create Campaign Location</h1>

  {!! Form::open(['action' => 'LocationsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'form'] ) !!}
  <div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', '', ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('monsters', 'Monsters') }}
    <small>List the monsters that will be in this location (names must be singular).</small>
    {{ Form::text('monsters', '', ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('encounters', 'Encounters') }}
    <small>List the encounters that will be in this location (names must match encounter name).</small>
    {{ Form::text('encounters', '', ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('content', 'Content') }}
    <div id="location-notes"></div>
    {{ Form::text('content', '', ['class' => 'd-none', 'id' => 'content']) }}
  </div>
    <div class="form-group">
      {{  Form::file('map') }}
    </div>
    {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
    <a href="/locations/" class="btn btn-default text-danger">Cancel</a>
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