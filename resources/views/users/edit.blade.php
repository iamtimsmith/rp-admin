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
          <select name="theme" id="" class="form-control">
            <option value="dark">Dark</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
          </select>
        </div>
        <div class="form-group">
            <textarea name="side_notes" id="article-ckeditor" cols="30" rows="10" class="form-control">{{ $user->side_notes }}</textarea>
          </div>
            <input type="submit" value="Save" class="btn btn-primary">
      {!! Form::close() !!}

@endsection