@extends('layout')

@section('content')
  <a href="/encounters">&lt;&lt; Back</a>
  <h1 class="header">Create Encounters</h1>

  {!! Form::open(['action' => 'EncountersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'form'] ) !!}
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
    {{ Form::label('content', 'Notes') }}
    <div id="encounter-notes"></div>
    {{ Form::text('content', '', ['class' => 'd-none', 'id' => 'content']) }}
  </div>
    <div class="form-group">
      {{  Form::file('featured_image') }}
    </div>
    {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
    <a href="/encounters/" class="btn btn-default text-danger">Cancel</a>
{!! Form::close() !!}

@endsection


@section('contentjs')
<script>
  var quill = new Quill('#encounter-notes', {
    theme:'snow',
    modules: {
      toolbar: toolbarOptions,
    }
  });
  
  var form = document.querySelector('#form');
  form.onsubmit = function() {
    var textarea = document.querySelector('#content');
    textarea.value = quill.root.innerHTML;
  }
  

</script>
@endsection