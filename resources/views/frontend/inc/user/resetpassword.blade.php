@extends('layouts.app')

@section('title')
Reset Password
@endsection

@section('content')
<div class="container">
  <h1>Reset Password</h1>
  {!! Form::open(['url' => route('account.resetpassword.post'), 'method' => 'post']) !!}
  {!! Form::token(); !!}
  <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-control">
          {!! Form::password($name = 'password'); !!}
          {!! Form::label('password', 'Password'); !!}
          @if($errors->has('password'))
          <div class="text-danger">
              {{ $errors->first('password') }}
          </div>
          @endif
      </div>
      <div class="form-control">
          {!! Form::password($name = 'password_confirmation'); !!}
          {!! Form::label('password', 'Confirm Password'); !!}
          @if($errors->has('password'))
          <div class="text-danger">
              {{ $errors->first('password') }}
          </div>
          @endif
      </div>
      <button class="btn" type="submit" value="Login">Reset Password</button>
      <p class="text">You have an account? <a href="{{ route('account.login') }}">Login Here</a></p>
  {!! Form::close() !!}
</div>

@endsection
