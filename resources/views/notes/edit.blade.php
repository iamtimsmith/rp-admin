@extends('layout')

@section('content')
  <h1 class="header">Edit Note</h1>
  

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
        {{ Form::textarea('content', $note->content, ['id'=>'content', 'class' => 'form-control', 'rows' => '5']) }}
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
  tinymce.init({
    selector: "textarea[name='content']",
    height:400,
    menubar:false,
    plugins:mcePlugins,
    toolbar1:mceButtons,
    statusbar: false
  });
</script>
@endsection