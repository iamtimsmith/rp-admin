<?php 
use App\User;

$user_id = auth()->user()->id;
$user = User::find($user_id);

?>

@extends('layout')
@section('class', 'settings')

@section('content')

<div class="row">
  <div class="col-sm-9">
    <h1>Settings</h1>
  </div>
</div>

@endsection