@extends('layouts/app')
@section('class', 'homepage')

@section('content')

<div class="container">
  <h1>Contact Us</h1>
  <br>
  <div class="row">
    <div class="col-md">
      <p>If you have any questions or suggestions, don't hesitate to reach out! I'm always open to suggestions on how to make RP Admin better or help with anything you run into.</p>
      <br>
      <p>If you're trying to figure out how to do something in the tool, you can also try checking the <a href="/documentation">documentation</a> which explains how to do everything.</p>
    </div>
    {!! Form::open(['class'=>'col-md']) !!}
      <div class="form-group">
          {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Name']) }}
      </div>
      <div class="form-group">
          {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) }}
      </div>
      <div class="form-group">
          {{ Form::textarea('message', '', ['class'=>'form-control', 'placeholder'=>'Message']) }}
      </div>
      <div class="form-group">
        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
      </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection