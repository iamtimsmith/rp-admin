@extends('layout')
@section('class', 'npcs')

@section('content')

      <div class="clearfix">
        <h1 class="float-left">NPCs</h1>
        <a href="/npcs/create" class="btn btn-default float-right">New</a>
      </div>
    @if(count($npcs) > 0)
    <table class="table mt-4">
      <tr>
        <th>Name</th>
        <th>Race</th>
        <th>Class</th>
        <th>Gender</th>
        <th>Affiliation</th>
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
  
  

@endsection