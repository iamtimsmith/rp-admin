@extends('layout')
@section('class', 'party')

@section('content')
  <h1>Edit Character</h1>



  {!! Form::open(['action' => ['PartyController@update', $char->id], 'method' => 'POST'] ) !!}
        <div class="form-group">
          {{--{{ Form::label('title', 'Character Name') }}--}}
          {{ Form::text('title', $char->name, ['name' => 'name', 'class' => 'form-control', 'placeholder' => 'Character Name']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('title', 'Player Name') }}--}}
          {{ Form::text('title', $char->player, ['name' => 'player', 'class' => 'form-control', 'placeholder' => 'Player Name']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('title', 'AC') }}--}}
          {{ Form::text('title', $char->ac, ['name' => 'ac', 'class' => 'form-control', 'placeholder' => 'Armor Class']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('title', 'HP') }}--}}
          {{ Form::text('title', $char->hp, ['name' => 'hp', 'class' => 'form-control', 'placeholder' => 'Hit Points']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('title', 'PP') }}--}}
          {{ Form::text('title', $char->pp, ['name' => 'pp', 'class' => 'form-control', 'placeholder' => 'Passive Perception']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('content', 'Notes') }}--}}
          {{ Form::textarea('content', $char->notes, ['name' => 'notes', 'id' => 'article-ckeditor', 'class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{  Form::file('portrait') }}
        </div>
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
      {!! Form::close() !!}

@endsection