@extends('layout')
@section('class', 'npcs')

@section('content')
      <a href="/npcs">&lt;&lt; Back</a>
      <h1 class="header">Create an NPC</h1>
    
      {!! Form::open(['action' => 'NpcsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'row', 'id' => 'form'] ) !!}
        <div class="form-group col-sm-12">
          {{ Form::label('title', 'Character Name') }}
          {{ Form::text('title', '', ['name' => 'name', 'class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('gender', 'Gender') }}
          {{ Form::text('gender', '', ['class' => 'form-control', 'placeholder' => 'Gender']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('race', 'Race') }}
          {{ Form::text('race', '', ['class' => 'form-control', 'placeholder' => 'Race']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('class', 'Class') }}
          {{ Form::text('class', '', ['class' => 'form-control', 'placeholder' => 'Class']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('alignment', 'Alignment') }}
          {{ Form::text('alignment', '', ['class' => 'form-control', 'placeholder' => 'Alignment']) }}
        </div>
        <div class="form-group col-sm-12">
          {{ Form::label('affiliation', 'Affiliation') }}
          {{ Form::text('affiliation', '', ['class' => 'form-control', 'placeholder' => 'Affiliation']) }}
        </div>
        <div class="form-group col-sm-12">
          {{ Form::label('notes', 'Notes') }}
          {{ Form::textarea('notes', '', ['id'=>'content', 'class' => 'form-control', 'rows' => '5']) }}
        </div>
        <div class="form-group col-sm-12">
          {{ Form::label('images', 'Images') }}
          <image-handler></image-handler>
          {{  Form::text('images', '', ['id'=>'inputMap', 'class'=>'d-none']) }}
        </div>
        <div class="col-sm-12">
          {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
          <a href="/npcs/" class="btn btn-default text-danger">Cancel</a>
        </div>
      {!! Form::close() !!}



@endsection


@section('contentjs')
<script>
  tinymce.init({
    selector: "textarea[name='notes']",
    height:400,
    menubar:false,
    plugins:mcePlugins,
    toolbar1:mceButtons,
    statusbar: false
  });
</script>
@endsection