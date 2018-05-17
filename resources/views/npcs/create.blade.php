@extends('layout')
@section('class', 'npcs')

@section('content')
      <a href="/npcs">&lt;&lt; Back</a>
      <h1 class="header">Create an NPC</h1>
    
      {!! Form::open(['action' => 'NpcsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'row', 'id' => 'form'] ) !!}
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
          {{ Form::label('notes', 'Notes') }}
          <div id="npc-notes"></div>
          {{ Form::text('notes', '', ['class' => 'd-none', 'id' => 'content']) }}
        </div>
        <div class="form-group col-sm-12">
          {{  Form::file('portrait') }}
        </div>
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
        <a href="/npcs/" class="btn btn-default text-danger">Cancel</a>
      {!! Form::close() !!}



@endsection


@section('contentjs')
<script>
  var quill = new Quill('#npc-notes', {
    theme:'snow',
    modules: {
      toolbar: toolbarOptions
    }
  });
  
  var form = document.querySelector('#form');
  form.onsubmit = function() {
    var textarea = document.querySelector('#content');
    textarea.value = quill.root.innerHTML;
  }
  

</script>
@endsection