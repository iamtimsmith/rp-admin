@extends('layout')
@section('class', 'dashboard')

@section('content')
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

        <div class="card">
            <div class="card-body">
        @if(count($party) > 0)
    <table class="table">
      <tr>
        <th class="border-0">Name</th>
        <th class="border-0">Player</th>
        <th class="border-0">AC</th>
        <th class="border-0">HP</th>
        <th class="border-0">PP</th>
      </tr>
      @foreach($party as $char)
        @if($char->active == 'Active')
        <tr>
            <td><a href="/party/{{ $char->id }}">{{ $char->name }}</a></td>
            <td>{{ $char->player }}</td>
            <td>{{ $char->ac }}</td>
            <td>{{ $char->hp }}</td>
            <td>{{ $char->pp }}</td>
        </tr>
        @endif
      @endforeach
    </table>

      @else
      <p>You don't have any characters in your party.</p>
      @endif

    </div>
</div>

@endsection
