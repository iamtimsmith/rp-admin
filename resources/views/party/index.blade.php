@extends('layout')
@section('class', 'party')

@section('content')

<div class="row"></div>
  <div class="col-md-9">
      <div class="clearfix">
        <h1 class="float-left">Party</h1>
        <a href="/party/create" class="btn btn-default float-right">New</a>
      </div>
    @if(count($party) > 0)
    <table class="table mt-4">
      <tr>
        <th>Name</th>
        <th>Player</th>
        <th>AC</th>
        <th>HP</th>
        <th>PP</th>
      </tr>
      @foreach($party as $char)
      <tr>
        <td><a href="/party/{{ $char->id }}">{{ $char->name }}</a></td>
        <td>{{ $char->player }}</td>
        <td>{{ $char->ac }}</td>
        <td>{{ $char->hp }}</td>
        <td>{{ $char->pp }}</td>
      </tr>
      @endforeach
    </table>

      @else
      <p>You don't have any characters in your party.</p>
      @endif
  
  </div>
  <div class="col-md-3"></div>
</div>

@endsection