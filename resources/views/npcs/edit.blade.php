@extends('layout')
@section('class', 'npcs')

@section('content')

      <h1>Edit Character</h1>

      {!! Form::open(['action' => ['NpcsController@update', $npc->id], 'method' => 'POST', 'class' => 'row'] ) !!}
        <div class="form-group col-sm-12">
          {{--{{ Form::label('title', 'Character Name') }}--}}
          {{ Form::text('title', $npc->name, ['name' => 'name', 'class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'Player Name') }}--}}
          {{ Form::text('title', $npc->gender, ['name' => 'gender', 'class' => 'form-control', 'placeholder' => 'Gender']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'AC') }}--}}
          {{ Form::text('title', $npc->race, ['name' => 'race', 'class' => 'form-control', 'placeholder' => 'Race']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'HP') }}--}}
          {{ Form::text('title', $npc->class, ['name' => 'class', 'class' => 'form-control', 'placeholder' => 'Class']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'PP') }}--}}
          {{ Form::text('title', $npc->alignment, ['name' => 'alignment', 'class' => 'form-control', 'placeholder' => 'Alignment']) }}
        </div>
        <div class="form-group col-sm-12">
          {{--{{ Form::label('title', 'PP') }}--}}
          {{ Form::text('title', $npc->affiliation, ['name' => 'affiliation', 'class' => 'form-control', 'placeholder' => 'Affiliation']) }}
        </div>
        <div class="form-group col-sm-12">
          {{ Form::label('content', 'Notes') }}
          {{ Form::textarea('content', $npc->notes, ['name' => 'notes', 'id' => 'article-ckeditor', 'class' => 'form-control']) }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
      {!! Form::close() !!}

@endsection