@extends('layout')

@section('content')
  <h1 class="header">Edit Post</h1>
  

  {!! Form::open(['action' => ['NotesController@update', $note->id], 'method' => 'POST', 'id' => 'form'] ) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $note->title, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('campaign', 'Campaign') }}
        {{ Form::text('campaign', $note->campaign, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('content', 'Content') }}
        <div id="note-body">{!! $note->content !!}</div>
        {{ Form::text('content', '', ['class' => 'd-none', 'id' => 'content']) }}
      </div>
      <div class="form-group">
        {{ Form::label('images', 'Images') }}
        <image-handler :images="[{{ $note->images }}]"></image-handler>
        {{  Form::text('images', '', ['id'=>'inputMap', 'class'=>'d-none']) }}
      </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
        <a href="/notes/{{ $note->id }}" class="btn btn-default text-danger">Cancel</a>
  {!! Form::close() !!}

@endsection



@section('contentjs')
<script>
  var quill = new Quill('#note-body', {
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