@extends('layout')
@section('class', 'dashboard')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Dashboard</h1>
            <div class="d-flex">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <span>You are logged in!</span>
                <span class="ml-auto"><a href="{{ url('/logout') }}">Logout</a></span>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <a href="/notes" class="card bg-dark text-center" style="height:250px; display:flex; justify-content:center;"><span class="text-white h3">My<br>Notes</span></a>
        </div>
        <div class="col-3">
                <a href="" class="card bg-dark text-center" style="height:250px; display:flex; justify-content:center;"><span class="text-white h3">My<br>Monsters</span></a>
        </div>
        <div class="col-3">
                <a href="" class="card bg-dark text-center" style="height:250px; display:flex; justify-content:center;"><span class="text-white h3">My<br>NPCs</span></a>
        </div>
        <div class="col-3">
                <a href="/locations" class="card bg-dark text-center" style="height:250px; display:flex; justify-content:center;"><span class="text-white h3">My<br>Locations</span></a>
        </div>
    </div>

@endsection
