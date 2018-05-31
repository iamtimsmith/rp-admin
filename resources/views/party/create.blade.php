@extends('layout')
@section('class', 'party')

@section('content')

      <a href="/party">&lt;&lt; Back</a>
      <h1 class="header">Create a Character</h1>
    <div class="card mt-3">
      <div class="card-body">
      {!! Form::open(['action' => 'PartyController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'row', 'id' => 'form'] ) !!}
        <div class="form-group col-sm-12">
          {{ Form::label('name', 'Character Name') }}
          {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Character Name']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('player', 'Player Name') }}
          {{ Form::text('player', '', ['class' => 'form-control', 'placeholder' => 'Player Name']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('active', 'Status') }}
            {{ Form::select('active', [
              'Active' => 'Active',
              'Inactive' => 'Inactive'
          ], 'Active', ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('class', 'Class') }}
          {{ Form::text('class', '', ['class' => 'form-control', 'placeholder' => 'Class']) }}
        </div>
        <div class="form-group col-sm-4">
          {{ Form::label('race', 'Race') }}
          {{ Form::text('race', '', ['class' => 'form-control', 'placeholder' => 'Race']) }}
        </div>
        <div class="form-group col-sm-2">
          {{ Form::label('level', 'Level') }}
          {{ Form::text('level', '', ['class' => 'form-control', 'placeholder' => 'Level']) }}
        </div>
        <div class="col-12">
          <hr class="pb-3">
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('ac', 'Armor Class') }}
          {{ Form::text('ac', '', ['class' => 'form-control', 'placeholder' => 'Armor Class']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('hp', 'Hit Points') }}
          {{ Form::text('hp', '', ['class' => 'form-control', 'placeholder' => 'Hit Points']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('pp', 'Passive Perception') }}
          {{ Form::text('pp', '', ['class' => 'form-control', 'placeholder' => 'Passive Perception']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('speed', 'Speed') }}
          {{ Form::text('speed', '', ['class' => 'form-control', 'placeholder' => 'Speed']) }}
        </div>

        {{-- Optional items if user wants detailed characters --}}
        @if ( $user->detail_level == 'detailed')
        <div class="col-sm-12 mb-3">
          <hr>
          <p class="h5">Ability Scores</p>
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('str', 'STR') }}
          {{ Form::text('str', '', ['class' => 'form-control', 'placeholder' => 'Strength']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('dex', 'DEX') }}
          {{ Form::text('dex', '', ['class' => 'form-control', 'placeholder' => 'Dexterity']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('con', 'CON') }}
          {{ Form::text('con', '', ['class' => 'form-control', 'placeholder' => 'Constitution']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('int', 'INT') }}
          {{ Form::text('int', '', ['class' => 'form-control', 'placeholder' => 'Intelligence']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('wis', 'WIS') }}
          {{ Form::text('wis', '', ['class' => 'form-control', 'placeholder' => 'Wisdom']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('cha', 'CHA') }}
          {{ Form::text('cha', '', ['class' => 'form-control', 'placeholder' => 'Charisma']) }}
        </div>
        <div class="col-sm-12 mb-4">
          <hr>
        </div>

        <div class="form-group col-sm-12">
          <p class="h5">Skills</p>
          {{ Form::text('skills', '', ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Saving Throws</p>
          {{ Form::text('saving_throws', '', ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Damage Vulnerabilities</p>
          {{ Form::text('damage_vulnerabilities', '', ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Damage Resistance</p>
          {{ Form::text('damage_resistances', '', ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Condition Immunities</p>
          {{ Form::text('condition_immunities', '', ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Senses</p>
          {{ Form::text('senses', '', ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="col-md-6">
          <p class="h5">Languages</p>
          {{ Form::text('languages', '', ['class' => 'form-control mb-2']) }}
        </div>
        <div class="col-sm-12 mb-4">
          <hr>
          <p class="h5">Abilities</p>
          {{ Form::textarea('abilities', '', ['class' => 'form-control', 'rows' => '5']) }}
          <br>
        </div>
        <div class="col-sm-12 mb-4">
          <p class="h5">Actions</p>
          {{ Form::textarea('actions', '', ['class' => 'form-control', 'rows' => '5']) }}
        </div>
        <div class="col-md-12">
          <p class="h5">Equipment</p>
          {{ Form::textarea('equipment', '', ['class' => 'form-control', 'rows' => '5']) }}
          <hr class="mt-5">
        </div>

        @endif

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
          <a href="/party/" class="btn btn-default text-danger">Cancel</a>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection


@section('contentjs')
<script>
  tinymce.init({
    selector: "textarea[name='abilities']",
    height:200,
    menubar:false,
    plugins:mcePlugins,
    toolbar1:mceButtons,
    statusbar: false,
    content_css:mceCSS,
  });
  tinymce.init({
    selector: "textarea[name='actions']",
    height:200,
    menubar:false,
    plugins:mcePlugins,
    toolbar1:mceButtons,
    statusbar: false,
    content_css:mceCSS,
  });
  tinymce.init({
    selector: "textarea[name='equipment']",
    height:200,
    menubar:false,
    plugins:mcePlugins,
    toolbar1:mceButtons,
    statusbar: false,
    content_css:mceCSS,
  });
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