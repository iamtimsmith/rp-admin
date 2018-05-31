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
    {{ Form::label('campaign', 'Campaign') }}
    {{ Form::text('campaign', '', ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', '', ['id'=>'content', 'class' => 'form-control', 'rows' => '5']) }}
  </div>

  <div class="form-group">
    {{ Form::label('monsters', 'Monsters') }}
    <small class="text-secondary">List the monsters that will be in this location (names must be singular and match a monster in the SRD material).</small>
    {{ Form::text('monsters', '', ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('encounters', 'Encounters') }}
    <small class="text-secondary">List the encounters that will be in this location (names must match encounter name).</small>
    {{ Form::text('encounters', '', ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('images', 'Images') }}
    <image-handler></image-handler>
    {{  Form::text('images', '', ['id'=>'inputMap', 'class'=>'d-none']) }}
  </div>
    {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
    <a href="/locations/" class="btn btn-default text-danger">Cancel</a>
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