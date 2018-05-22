@extends('layout')
@section('class', 'user')

@section('content')

<h1>Delete my Account</h1>
<p class="mt-5 h3">We're sorry to see you go!</p>
<p>If you delete your account, you'll lose all of your notes, locations, npcs, party, and settings. You won't be able to recover them. If you're sure you'd like to delete your account, please click the button below.</p>

{!! Form::open(['action' => ['UserController@destroy', $user], 'method'=>'POST']) !!}
  {{ Form::hidden('_method', 'DELETE') }}
  {{ Form::submit('Delete', ['class'=>'btn btn-danger pt-0 pb-0 mb-0', 'style'=>'font-size:1em']) }}
{!! Form::close() !!}
@endsection