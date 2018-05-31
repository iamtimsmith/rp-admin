@extends('layout')

@section('content')
  <a href="/notes">&lt;&lt; Back</a>
  <h1 class="header">Create Campaign Note</h1>

  {!! Form::open(['action' => 'NotesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'form'] ) !!}
  <div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', '', ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('campaign', 'Campaign') }}
    {{ Form::text('campaign', '', ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', '', ['id'=>'content', 'class' => 'form-control', 'rows' => '5']) }}
  </div>
  <div class="form-group">
    {{ Form::label('images', 'Images') }}
    <image-handler></image-handler>
    {{  Form::text('images', '', ['id'=>'inputMap', 'class'=>'d-none']) }}
  </div>
    {{ Form::submit('Submit',['class' => 'btn btn-primary']) }}
    <a href="/notes/" class="btn btn-default text-danger">Cancel</a>
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
    statusbar: false,
    content_css:mceCSS,
  });
</script>
@endsection