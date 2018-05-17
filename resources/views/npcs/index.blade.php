@extends('layout')
@section('class', 'npcs')

@section('content')

      <div class="clearfix">
        <h1 class="float-left header">NPCs</h1>
        <a href="/npcs/create" class="btn btn-default float-right">New</a>
      </div>
      <div class="card mt-4">
        <div class="card-body">

    @if(count($npcs) > 0)
    <table class="table">
      <tr>
        <th class="border-0">Name</th>
        <th class="border-0">Race</th>
        <th class="border-0">Class</th>
        <th class="border-0">Gender</th>
        <th class="border-0">Affiliation</th>
      </tr>
      @foreach($npcs as $npc)
      <tr>
        <td><a href="/npcs/{{ $npc->id }}">{{ $npc->name }}</a></td>
        <td>{{ $npc->race }}</td>
        <td>{{ $npc->class }}</td>
        <td>{{ $npc->gender }}</td>
        <td>{{ $npc->affiliation }}</td>
      </tr>
      @endforeach
    </table>

      @else
      <p>You don't have any NPCs yet.</p>
      @endif
  
    </div>
  </div>
  

@endsection