@extends('layout')
@section('class', 'npcs')

@section('content')

      <h1 class="header">Edit Character</h1>

      {!! Form::open(['action' => ['NpcsController@update', $npc->id], 'method' => 'POST', 'class' => 'row', 'id' => 'form'] ) !!}
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
          {{ Form::label('notes', 'Notes') }}
          <div id="npc-notes">{!! $npc->notes !!}</div>
          {{ Form::text('notes', '', ['class' => 'd-none', 'id' => 'content']) }}
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