@extends('layout') @section('content')
<h1>User Settings</h1>

{!! Form::open(['action' => ['UserController@update', $user], 'method' => 'POST', 'id' => 'form'] ) !!}
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
        {{ Form::select('theme', [ 'dark' => 'Dark', 'red' => 'Red', 'light' => 'Light' ], $user->theme, ['class' => 'form-control'])}}
      </div>
      <div class="col-sm-6 form-group">
        <label for="detail">Detail</label>
        {{ Form::select('detail', [ 'minimal' => 'Minimal', 'detailed' => 'Detailed' ], $user->detail_level, ['class' => 'form-control'])}}
      </div>
      <div class="col-sm-12 mt-5 form-group">
        <label for="side_notes">Sidebar Notes</label>
        <br>
        <small class="mb-5">These notes will be placed on the right hand side of each page and work as a good place for useful links, campaign
          notes, or helpful reminders.</small>
        {{ Form::textarea('side_notes', $user->side_notes, ['id'=>'sidebar-notes', 'class' => 'form-control', 'rows' => '5']) }}
        

      </div>
    </div>
  </div>
</div>
<input type="submit" value="Save" class="btn btn-primary mt-3"> {!! Form::close() !!}

<hr class="mt-5">
<div class="row">
  <div class="col-12 text-center">
    <a href="/settings/{{ $user_id }}/delete" class="btn btn-default text-danger">Delete my account</a>
  </div>
</div>

@endsection 



@section('contentjs')
<script>
  tinymce.init({
    selector: "#sidebar-notes",
    height:400,
    menubar:false,
    plugins:"autolink autosave link image lists hr table textcolor contextmenu code",
    toolbar1:"formatselect fontselect forecolor backcolor bold italic underline strikethrough alignleft aligncenter alignright alignjustify link unlink image bullist numlist table code",
    statusbar: false
  });
</script>
@endsection