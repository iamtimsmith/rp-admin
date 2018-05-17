@extends('layout')

@section('content')
      <h1>User Settings</h1>

      {!! Form::open(['action' => ['UserController@update', $user], 'method' => 'POST'] ) !!}
          {{ csrf_field() }}
          {{ method_field('patch') }}
    
          <div class="card mt-5">
              <div class="card-body">
                    <p class="h4">Account Settings</p>
                    <hr>
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
              </div>
          </div>
          
          <div class="card mt-5">
                <div class="card-body">
          <p class="h4">User Settings</p>
          <hr>
          <div class="row">
          <div class="col-sm-6 form-group">
          <label for="theme">Theme</label>
          {{ Form::select('theme', [
              'dark' => 'Dark',
              'red' => 'Red',
              'light' => 'Light'
          ], $user->theme, ['class' => 'form-control'])}}
        </div>
        <div class="col-sm-6 form-group">
                <label for="detail">Detail</label>
                {{ Form::select('detail', [
                    'minimal' => 'Minimal',
                    'detailed' => 'Detailed'
                ], $user->detail_level, ['class' => 'form-control'])}}
              </div>
        <div class="col-sm-12 mt-5 form-group">
            <label for="side_notes">Sidebar Notes</label><br>
            <small class="mb-5">These notes will be placed on the right hand side of each page and work as a good place for useful links, campaign notes, or helpful reminders.</small>
            <textarea name="side_notes" id="article-ckeditor" cols="30" rows="10" class="form-control">{{ $user->side_notes }}</textarea>
          </div>
        </div>
        </div>
    </div>
            <input type="submit" value="Save" class="btn btn-primary mt-3">
      {!! Form::close() !!}

@endsection