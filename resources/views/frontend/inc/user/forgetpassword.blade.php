<!DOCTYPE html>
<html>

<head>
  <base href="{{ url('/') }}">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $setting->title }} - {{ $title }}</title>
  <!-- Favicon-->
  <link rel="icon" href="{{ url('extraimage/exam1.png') }}" type="image/x-icon">
  {{ HTML::style('assets/css/app.min.css') }}
  {{ HTML::style('assets/css/style.css') }}
  {{ HTML::style('assets/css/pages/extra_pages.css') }}
</head>

<body class="login-page">
  <div class="limiter">
    <div class="container-login100 page-background">
      <div class="wrap-login100">
        {!! Form::open(['url' => route('account.forgetpassword.post'), 'method' => 'post', 'class' => 'login100-form validate-form']) !!}

        {!! Form::token(); !!}
        @if(\Session::get('error'))
        <div class="text-white" role="alert">
          {{ \Session::get('error') }}
        </div>
        @endif
        @if(\Session::get('success'))
        <div class="text-white text-center" role="alert">
          {{ \Session::get('success') }}
        </div>
        @endif
        <span class="login100-form-title p-b-34 p-t-27">
          {{ $title }}
        </span>

        <div class="wrap-input100 validate-input" data-validate="Enter email">
          {{ Form::text($name = 'email', $value = null, array_merge(['class' => 'input100', 'placeholder' => 'Email'])) }}
          @if($errors->has('email'))
          <div class="text-white">
            {{ $errors->first('email') }}
          </div>
          @endif
          <i class="material-icons focus-input1001">mail</i>
        </div>

        <div class="container-login100-form-btn">
          <button type="submit" class="login100-form-btn" value="Login">
            Send Password Reset Link
          </button>
        </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>

  {{ HTML::script('assets/js/app.min.js') }}
  {{ HTML::script('assets/js/pages/examples/pages.js') }}

</body>

</html>