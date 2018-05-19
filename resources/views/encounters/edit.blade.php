@extends('layout')

@section('content')
  <h1 class="header">Edit Encounter</h1>

  {!! Form::open(['action' => ['EncountersController@update', $encounter->id], 'method' => 'POST', 'id' => 'form'] ) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $encounter->title, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('monsters', 'Monsters') }}
        <small>List the monsters that will be in this location (names must be singular).</small>
        {{ Form::text('monsters', $encounter->monsters, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Notes') }}
        <div id="encounter-notes">{!! $encounter->content !!}</div>
        {{ Form::text('content', '', ['class' => 'd-none', 'id' => 'content']) }}
      </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
        <a href="/encounters/{{ $encounter->id }}" class="btn btn-default text-danger">Cancel</a>
  {!! Form::close() !!}

@endsection


@section('contentjs')
<script>
  var quill = new Quill('#encounter-notes', {
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