@extends('layout')
@section('class', 'dashboard')

@section('content')

<div class="row">
    <div class="col-md-9">
        <h1>Dashboard</h1>
        <div class="row mb-5">
            <div class="col-3">
                <a href="/notes" class="card bg-dark text-center" style="height:225px; display:flex; justify-content:center;"><span class="text-white h3">My<br>Notes</span></a>
            </div>
            <div class="col-3">
                <a href="/locations" class="card bg-dark text-center" style="height:225px; display:flex; justify-content:center;"><span class="text-white h3">My<br>Locations</span></a>
            </div>
            <div class="col-3">
                <a href="/npcs" class="card bg-dark text-center" style="height:225px; display:flex; justify-content:center;"><span class="text-white h3">My<br>NPCs</span></a>
            </div>
            <div class="col-3">
                <a href="/encounters" class="card bg-dark text-center" style="height:225px; display:flex; justify-content:center;"><span class="text-white h3">My<br>Encounters</span></a>
            </div>
        </div>
        <p class="h4">Your Party</p>
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
    <div class="col-md-3 timeline">
        <p class="h4 text-center">Timeline</p>
        <div class="line"></div>
        <ul>
            <li class="card mt-5 text-center bg-white"><div class="card-body">PCs arrived at lorendale and met with Valerin. <hr><small>05-09-2018</small></div></li>
            <li class="card mt-5 text-center bg-white"><div class="card-body">Defeated the dark lord, Malumet, and completed the quest for Sylvana. Given the compass after defeating the demon lord.<hr><small>05-09-2018</small></div></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>

@endsection
