@extends('layout')

@section('content')
      <h1>User Settings</h1>

      {!! Form::open(['action' => ['UserController@update', $user], 'method' => 'POST'] ) !!}
          {{ csrf_field() }}
          {{ method_field('patch') }}
    
          <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" value="{{ $user->name }}" class="form-control">
            
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input name="email" type="email" value="{{ $user->email }}" class="form-control" disabled>
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control">
          </div>
          <div class="form-group">
              <label for="password_confirm">Password Confirmation</label>
              <input name="password_confirm" type="password" class="form-control">
          </div>
          <hr>
          <div class="form-group">
          <label for="theme">Theme</label>
          <select name="theme" class="form-control" value="{{ $user->theme }}">
            @if( $user->theme == 'dark')
            <option value="dark" selected>Dark</option>
            @else
            <option value="dark">Dark</option>
            @endif

            @if( $user->theme == 'red')
            <option value="red" selected>Red</option>
            @else
            <option value="red">Red</option>
            @endif

            @if( $user->theme == 'light')
            <option value="light" selected>Light</option>
            @else
            <option value="light">Light</option>
            @endif
          </select>
        </div>
        <div class="form-group">
            <label for="side_notes">Sidebar Notes</label><br>
            <small class="mb-5">These notes will be placed on the right hand side of each page and work as a good place for useful links, campaign notes, or helpful reminders.</small>
            <textarea name="side_notes" id="article-ckeditor" cols="30" rows="10" class="form-control">{{ $user->side_notes }}</textarea>
          </div>
            <input type="submit" value="Save" class="btn btn-primary">
      {!! Form::close() !!}

@endsection