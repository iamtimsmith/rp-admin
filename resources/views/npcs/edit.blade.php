@extends('layout')
@section('class', 'npcs')

@section('content')

      <h1 class="header">Edit Character</h1>

      {!! Form::open(['action' => ['NpcsController@update', $npc->id], 'method' => 'POST', 'class' => 'row', 'id' => 'form'] ) !!}
        <div class="form-group col-sm-12">
          {{ Form::label('name', 'Character Name') }}
          {{ Form::text('name', $npc->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('gender', 'Gender') }}
          {{ Form::text('gender', $npc->gender, ['class' => 'form-control', 'placeholder' => 'Gender']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('race', 'Race') }}
          {{ Form::text('race', $npc->race, ['class' => 'form-control', 'placeholder' => 'Race']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('class', 'Class') }}
          {{ Form::text('class', $npc->class, ['class' => 'form-control', 'placeholder' => 'Class']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('alignment', 'Alignment') }}
          {{ Form::text('alignment', $npc->alignment, ['class' => 'form-control', 'placeholder' => 'Alignment']) }}
        </div>
        <div class="form-group col-sm-12">
          {{ Form::label('affiliation', 'Affiliation') }}
          {{ Form::text('affiliation', $npc->affiliation, ['class' => 'form-control', 'placeholder' => 'Affiliation']) }}
        </div>
        <div class="form-group col-sm-12">
          {{ Form::label('notes', 'Notes') }}
          {{ Form::textarea('notes', $npc->notes, ['id'=>'content', 'class' => 'form-control', 'rows' => '5']) }}
        </div>
        <div class="form-group col-sm-12">
          {{ Form::label('images', 'Images') }}
          <image-handler :images="[{{ $npc->images }}]"></image-handler>
          {{  Form::text('images', '', ['id'=>'inputMap', 'class'=>'d-none']) }}
        </div>
        <div class="col-sm-12">
          {{ Form::hidden('_method', 'PUT') }}
          {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
          <a href="/npcs/{{ $npc->id }}" class="btn btn-default text-danger">Cancel</a>
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
    statusbar: false,
    content_css:mceCSS,
  });
</script>
@endsection