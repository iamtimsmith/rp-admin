@extends('layout')

@section('content')
  <h1 class="header">Edit Encounter</h1>

  {!! Form::open(['action' => ['EncountersController@update', $encounter->id], 'method' => 'POST', 'id' => 'form'] ) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $encounter->title, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('campaign', 'Campaign') }}
        {{ Form::text('campaign', $encounter->campaign, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Notes') }}
        {{ Form::textarea('content', $encounter->content, ['id'=>'content', 'class' => 'form-control', 'rows' => '5']) }}
      </div>
      
      <div class="form-group">
        {{ Form::label('monsters', 'Monsters') }}
        <small>List the monsters that will be in this location (names must be singular).</small>
        {{ Form::text('monsters', $encounter->monsters, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('images', 'Images') }}
        <image-handler :images="[{{ $encounter->images }}]"></image-handler>
        {{  Form::text('images', '', ['id'=>'inputMap', 'class'=>'d-none']) }}
      </div>
      
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
        <a href="/encounters/{{ $encounter->id }}" class="btn btn-default text-danger">Cancel</a>
  {!! Form::close() !!}

@endsection


@section('contentjs')
<script>
  tinymce.init({
    selector: "textarea[name='content']",
    height:400,
    menubar:false,
    plugins:"autolink autosave link image lists hr table textcolor contextmenu code",
    toolbar1:"formatselect fontselect forecolor backcolor bold italic underline strikethrough alignleft aligncenter alignright alignjustify link unlink image bullist numlist table code",
    statusbar: false
  });
</script>
@endsection