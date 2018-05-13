@extends('layout')
@section('class', 'party')

@section('content')
<div class="row"></div>
  <div class="col-md-9">

      <a href="/party">&lt;&lt; Back</a>
      <h1>Create a Character</h1>
    
      {!! Form::open(['action' => 'PartyController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'] ) !!}
        <div class="form-group">
          {{--{{ Form::label('title', 'Character Name') }}--}}
          {{ Form::text('title', '', ['name' => 'name', 'class' => 'form-control', 'placeholder' => 'Character Name']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('title', 'Player Name') }}--}}
          {{ Form::text('title', '', ['name' => 'player', 'class' => 'form-control', 'placeholder' => 'Player Name']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('title', 'AC') }}--}}
          {{ Form::text('title', '', ['name' => 'ac', 'class' => 'form-control', 'placeholder' => 'Armor Class']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('title', 'HP') }}--}}
          {{ Form::text('title', '', ['name' => 'hp', 'class' => 'form-control', 'placeholder' => 'Hit Points']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('title', 'PP') }}--}}
          {{ Form::text('title', '', ['name' => 'pp', 'class' => 'form-control', 'placeholder' => 'Passive Perception']) }}
        </div>
        <div class="form-group">
          {{--{{ Form::label('content', 'Notes') }}--}}
          {{ Form::textarea('content', '', ['name' => 'notes', 'id' => 'article-ckeditor', 'class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{  Form::file('portrait') }}
        </div>
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
      {!! Form::close() !!}
  </div>
</div>


@endsection