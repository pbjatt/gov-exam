<!DOCTYPE html>
<html>

<head>
    <base href="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->title }} - {{ $title }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ url('extraimage/exam1.png') }}" type="image/x-icon"> {{ HTML::style('assets/css/app.min.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('assets/css/pages/extra_pages.css') }}
</head>

<body class="login-page">
    <div class="limiter">
        <div class="container-login100 page-background">
            <div class="wrap-login100">
                {!! Form::open(['url' => route('account.register.post'), 'method' => 'post', 'class' => 'login100-form validate-form']) !!}

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
                <span class="login100-form-title">
                    {{ $title }}
                </span>
                <div class="wrap-input100 validate-input" data-validate="Enter name" style="margin-bottom: 23px;">
                    {{ Form::text($name = 'name', $value = null, array_merge(['class' => 'input100', 'placeholder' => 'Name'])) }}
                    @if($errors->has('name'))
                    <div class="text-white">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">person</i>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter email" style="margin-bottom: 23px;">
                    {{ Form::text($name = 'email', $value = null, array_merge(['class' => 'input100', 'placeholder' => 'Email'])) }}
                    @if($errors->has('email'))
                    <div class="text-white">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">mail</i>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter phone" style="margin-bottom: 23px;">
                    {{ Form::text($name = 'mobile', $value = null, array_merge(['class' => 'input100', 'placeholder' => 'Mobile'])) }}
                    @if($errors->has('mobile'))
                    <div class="text-white">
                        {{ $errors->first('mobile') }}
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">phone</i>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password" style="margin-bottom: 23px;" data-toggle="tooltip" data-placement="bottom" title="Password must contain at least one number and both uppercase and lowercase letters and one symbol, minimum 7 digits.">
                    {{ Form::password($name = 'password', array_merge(['class' => 'input100', 'placeholder' => 'Password'])) }}
                    @if($errors->has('password'))
                    <div class="text-white">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">lock</i>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="contact100-form-checkbox p-0" style="padding-bottom: 0px;">
                        <div class="text-left">
                            <a class="txt1 align-middle" href="{{ route('account.login') }}">
                                <h4 style="padding-top: 11px;">
                                    Login Here
                                </h4>
                            </a>
                        </div>
                    </div>
                    <div class="p-0">
                        <button type="submit" class="login100-form-btn" value="Login">
                            Register
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{ HTML::script('assets/js/app.min.js') }}
    {{ HTML::script('assets/js/pages/examples/pages.js') }}

</body>

</html>