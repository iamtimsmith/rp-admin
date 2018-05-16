@extends('layout')
@section('class', 'party')

@section('content')
  <h1>Edit Character</h1>



  {!! Form::open(['action' => ['PartyController@update', $char->id], 'method' => 'POST', 'class' => 'row'] ) !!}
        <div class="form-group col-sm-12">
          {{--{{ Form::label('title', 'Character Name') }}--}}
          {{ Form::text('title', $char->name, ['name' => 'name', 'class' => 'form-control', 'placeholder' => 'Character Name']) }}
        </div>
        <div class="form-group col-sm-12">
          {{--{{ Form::label('title', 'Player Name') }}--}}
          {{ Form::text('title', $char->player, ['name' => 'player', 'class' => 'form-control', 'placeholder' => 'Player Name']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'AC') }}--}}
          {{ Form::text('title', $char->ac, ['name' => 'ac', 'class' => 'form-control', 'placeholder' => 'Armor Class']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'HP') }}--}}
          {{ Form::text('title', $char->hp, ['name' => 'hp', 'class' => 'form-control', 'placeholder' => 'Hit Points']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'PP') }}--}}
          {{ Form::text('title', $char->pp, ['name' => 'pp', 'class' => 'form-control', 'placeholder' => 'Passive Perception']) }}
        </div>
        <div class="form-group col-sm-6">
          {{ Form::select('active', [
            'Active' => 'Active',
            'Inactive' => 'Inactive'
        ], $char->active, ['class' => 'form-control']) }}
          </div>
        <div class="form-group col-sm-12">
          {{--{{ Form::label('content', 'Notes') }}--}}
          {{ Form::textarea('content', $char->notes, ['name' => 'notes', 'id' => 'article-ckeditor', 'class' => 'form-control']) }}
        </div>
        {{--<div class="form-group col-sm-12">
          {{  Form::file('portrait') }}
        </div>--}}
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary ml-3']) }}
      {!! Form::close() !!}

@endsection