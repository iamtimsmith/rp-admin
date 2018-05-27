@extends('layout')
@section('class', 'user')

@section('content')

<h1>Delete my Account</h1>
<div class="card">
  <div class="card-body">
      <p class="mt-5 h3">We're sorry to see you go!</p>
      <br>
      <p>If you delete your account, you'll lose all of your notes, locations, npcs, party, and settings. You won't be able to recover them. If you're sure you'd like to delete your account, please click the button below.</p>
      <br>
      {!! Form::open(['action' => ['UserController@destroy', $user], 'method'=>'POST', 'class'=>'text-center']) !!}
        {{ method_field('patch') }}
        {{ Form::submit('Delete', ['class'=>'btn btn-danger pt-2 pb-2 pl-5 pr-5 mb-0', 'style'=>'font-size:1em']) }}
      {!! Form::close() !!}
  </div>
</div>
@endsection