@extends('layout')
@section('class', 'party')

@section('content')

      <a href="/party">&lt;&lt; Back</a>
      <h1>Create a Character</h1>
    
      {!! Form::open(['action' => 'PartyController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'row mt-5'] ) !!}
      <div class="form-group col-sm-12">
          {{--{{ Form::label('title', 'Character Name') }}--}}
          {{ Form::text('title', '', ['name' => 'name', 'class' => 'form-control', 'placeholder' => 'Character Name']) }}
        </div>
        <div class="form-group col-sm-12">
          {{--{{ Form::label('title', 'Player Name') }}--}}
          {{ Form::text('title', '', ['name' => 'player', 'class' => 'form-control', 'placeholder' => 'Player Name']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'AC') }}--}}
          {{ Form::text('title', '', ['name' => 'ac', 'class' => 'form-control', 'placeholder' => 'Armor Class']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'HP') }}--}}
          {{ Form::text('title', '', ['name' => 'hp', 'class' => 'form-control', 'placeholder' => 'Hit Points']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'PP') }}--}}
          {{ Form::text('title', '', ['name' => 'pp', 'class' => 'form-control', 'placeholder' => 'Passive Perception']) }}
        </div>
        <div class="form-group col-sm-6">
                {{ Form::select('active', [
                  'Active' => 'Active',
                  'Inactive' => 'Inactive'
              ], 'Active', ['class' => 'form-control']) }}
        </div>

        {{-- Optional items if user wants detailed characters --}}
        @if ( $user->detail_level == 'detailed')
        <div class="col-sm-12 mb-3">
          <hr>
          <p class="h5">Ability Scores</p>
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::text('str', '', ['class' => 'form-control', 'placeholder' => 'Strength']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::text('dex', '', ['class' => 'form-control', 'placeholder' => 'Dexterity']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::text('con', '', ['class' => 'form-control', 'placeholder' => 'Constitution']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::text('int', '', ['class' => 'form-control', 'placeholder' => 'Intelligence']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::text('wis', '', ['class' => 'form-control', 'placeholder' => 'Wisdom']) }}
        </div>
        <div class="form-group col-sm-3 col-md-2">
          {{ Form::text('cha', '', ['class' => 'form-control', 'placeholder' => 'Charisma']) }}
        </div>
        <div class="col-sm-12 mb-4">
          <hr>
        </div>

        <div class="form-group col-sm-12">
          <p class="h5">Saving Throws</p>
          {{ Form::text('saving_throws', '', ['class' => 'form-control mb-2']) }}
          <br>
          <p class="h5">Skills</p>
          {{ Form::text('skills', '', ['class' => 'form-control mb-2']) }}
          <br>
          <p class="h5">Damage Vulnerabilities</p>
          {{ Form::text('damage_vulnerabilities', '', ['class' => 'form-control mb-2']) }}
          <br>
          <p class="h5">Damage Resistance</p>
          {{ Form::text('damage_resistances', '', ['class' => 'form-control mb-2']) }}
          <br>
          <p class="h5">Condition Immunities</p>
          {{ Form::text('condition_immunities', '', ['class' => 'form-control mb-2']) }}
          <br>
          <p class="h5">Senses</p>
          {{ Form::text('senses', '', ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="col-md-6">
          <p class="h5">Languages</p>
          {{ Form::text('languages', '', ['class' => 'form-control mb-2']) }}
          <br>
        </div>
        <div class="col-md-6">
          <p class="h5">Challenge Rating</p>
          {{ Form::text('challenge_rating', '', ['class' => 'form-control mb-2']) }}
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
          <hr class="mt-5">
        </div>

        @endif

        <div class="form-group col-sm-12">
          <p class="h5">Notes</p>
          {{--{{ Form::label('content', 'Notes') }}--}}
          {{ Form::textarea('content', '', ['name' => 'notes', 'id' => 'article-ckeditor', 'class' => 'form-control']) }}
        </div>
        <div class="form-group col-sm-12">
          {{  Form::file('portrait') }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary ml-3']) }}
      {!! Form::close() !!}

      <script>
          CKEDITOR.replace( 'abilities' );
      </script>

@endsection