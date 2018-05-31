@extends('layout')
@section('class', 'party')

@section('content')
  <h1 class="header">Edit Character</h1>

  <div class="card mt-3">
    <div class="card-body">

  {!! Form::open(['action' => ['PartyController@update', $char->id], 'method' => 'POST', 'class' => 'row', 'id' => 'form'] ) !!}
        <div class="form-group col-sm-12">
          {{ Form::label('name', 'Character Name') }}
          {{ Form::text('name', $char->name, ['class' => 'form-control', 'placeholder' => 'Character Name']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('player', 'Player Name') }}
          {{ Form::text('player', $char->player, ['class' => 'form-control', 'placeholder' => 'Player Name']) }}
        </div>
        <div class="form-group col-sm-6">
            {{ Form::label('active', 'Status') }}
            {{ Form::select('active', [
              'Active' => 'Active',
              'Inactive' => 'Inactive'
          ], $char->status, ['class' => 'form-control']) }}
            </div>
        <div class="form-group col-sm-6">
          {{ Form::label('ac', 'Armor Class') }}
          {{ Form::text('ac', $char->ac, ['class' => 'form-control', 'placeholder' => 'Armor Class']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('hp', 'Hit Points') }}
          {{ Form::text('hp', $char->hp, ['class' => 'form-control', 'placeholder' => 'Hit Points']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('pp', 'Passive Perception') }}
          {{ Form::text('pp', $char->pp, ['class' => 'form-control', 'placeholder' => 'Passive Perception']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::label('speed', 'Speed') }}
          {{ Form::text('speed', $char->speed, ['class' => 'form-control', 'placeholder' => 'Speed']) }}
        </div>

          {{-- Optional items if user wants detailed characters --}}
        @if ( $user->detail_level == 'detailed')
        <div class="col-sm-12 mb-3">
          <hr>
          <p class="h5">Ability Scores</p>
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('str', 'Strength') }}
          {{ Form::text('str', $char->str, ['class' => 'form-control', 'placeholder' => 'Strength']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('dex', 'Dexterity') }}
          {{ Form::text('dex', $char->dex, ['class' => 'form-control', 'placeholder' => 'Dexterity']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('con', 'Constitution') }}
          {{ Form::text('con', $char->con, ['class' => 'form-control', 'placeholder' => 'Constitution']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('int', 'Intelligence') }}
          {{ Form::text('int', $char->int, ['class' => 'form-control', 'placeholder' => 'Intelligence']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('wis', 'Wisdom') }}
          {{ Form::text('wis', $char->wis, ['class' => 'form-control', 'placeholder' => 'Wisdom']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::label('cha', 'Charisma') }}
          {{ Form::text('cha', $char->cha, ['class' => 'form-control', 'placeholder' => 'Charisma']) }}
        </div>
        <div class="col-sm-12 mb-4">
          <hr>
        </div>

        <div class="form-group col-sm-12">
          <p class="h5">Skills</p>
          {{ Form::text('skills', $char->skills, ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Saving Throws</p>
          {{ Form::text('saving_throws', $char->saving_throws, ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Damage Vulnerabilities</p>
          {{ Form::text('damage_vulnerabilities', $char->damage_vulnerabilities, ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Damage Resistance</p>
          {{ Form::text('damage_resistances', $char->damage_resistances, ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Condition Immunities</p>
          {{ Form::text('condition_immunities', $char->condition_immunities, ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="form-group col-sm-6">
          <p class="h5">Senses</p>
          {{ Form::text('senses', $char->senses, ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="col-md-6">
          <p class="h5">Languages</p>
          {{ Form::text('languages', $char->languages, ['class' => 'form-control mb-2']) }}
        </div>
        <div class="col-sm-12 mb-4">
          <hr>
          <p class="h5">Abilities</p>
          
          {{ Form::textarea('abilities', $char->abilities, ['id'=>'char-abilities', 'class' => 'form-control', 'rows' => '5']) }}
          <br>
        </div>
        <div class="col-sm-12 mb-4">
          <p class="h5">Actions</p>
          {{ Form::textarea('actions', $char->actions, ['class' => 'form-control', 'rows' => '5']) }}
        </div>
        <div class="col-md-12">
          <p class="h5">Equipment</p>
          {{ Form::textarea('equipment', $char->equipment, ['class' => 'form-control', 'rows' => '5']) }}
          <hr class="mt-5">
        </div>

        @endif


          <div class="form-group col-sm-12">
            {{ Form::label('notes', 'Notes') }}
            {{ Form::textarea('notes', $char->notes, ['id'=>'content', 'class' => 'form-control', 'rows' => '5']) }}
          </div>
          <div class="form-group col-sm-12">
            {{ Form::label('images', 'Images') }}
            <image-handler :images="[{{ $char->images }}]"></image-handler>
            {{  Form::text('images', '', ['id'=>'inputMap', 'class'=>'d-none']) }}
          </div>
          <div class="col-sm-12">
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
            <a href="/party/{{ $char->id }}" class="btn btn-default text-danger">Cancel</a>
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
      statusbar: false
    });
    tinymce.init({
      selector: "textarea[name='actions']",
      height:200,
      menubar:false,
      plugins:mcePlugins,
      toolbar1:mceButtons,
      statusbar: false
    });
    tinymce.init({
      selector: "textarea[name='equipment']",
      height:200,
      menubar:false,
      plugins:mcePlugins,
      toolbar1:mceButtons,
      statusbar: false
    });
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