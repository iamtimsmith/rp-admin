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
        {{ Form::textarea('content', $location->content, ['id'=>'content', 'class' => 'form-control', 'rows' => '5']) }}
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