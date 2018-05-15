@extends('layout')
@section('class', 'npcs')

@section('content')
<div class="row"></div>
  <div class="col-md-9">

      <a href="/npcs">&lt;&lt; Back</a>
      <h1>Create an NPC</h1>
    
      {!! Form::open(['action' => 'NpcsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'row'] ) !!}
        <div class="form-group col-sm-12">
          {{--{{ Form::label('title', 'Character Name') }}--}}
          {{ Form::text('title', '', ['name' => 'name', 'class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'Player Name') }}--}}
          {{ Form::text('title', '', ['name' => 'gender', 'class' => 'form-control', 'placeholder' => 'Gender']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'AC') }}--}}
          {{ Form::text('title', '', ['name' => 'race', 'class' => 'form-control', 'placeholder' => 'Race']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'HP') }}--}}
          {{ Form::text('title', '', ['name' => 'class', 'class' => 'form-control', 'placeholder' => 'Class']) }}
        </div>
        <div class="form-group col-sm-6">
          {{--{{ Form::label('title', 'PP') }}--}}
          {{ Form::text('title', '', ['name' => 'alignment', 'class' => 'form-control', 'placeholder' => 'Alignment']) }}
        </div>
        <div class="form-group col-sm-12">
          {{--{{ Form::label('title', 'PP') }}--}}
          {{ Form::text('title', '', ['name' => 'affiliation', 'class' => 'form-control', 'placeholder' => 'Affiliation']) }}
        </div>
        <div class="form-group col-sm-12">
          {{ Form::label('content', 'Notes') }}
          {{ Form::textarea('content', '', ['name' => 'notes', 'id' => 'article-ckeditor', 'class' => 'form-control']) }}
        </div>
        <div class="form-group col-sm-12">
          {{  Form::file('portrait') }}
        </div>
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
      {!! Form::close() !!}
  </div>
</div>


@endsection