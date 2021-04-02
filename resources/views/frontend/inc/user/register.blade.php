<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    {{ HTML::style('assets/css/app.min.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('assets/css/pages/extra_pages.css') }}
</head>

<body class="login-page">
    <div class="limiter">
        <div class="container-login100 page-background">
            <div class="wrap-login100">
                {!! Form::open(['url' => route('account.register.post'), 'method' => 'post', 'class' => 'login100-form validate-form']) !!}

                {!! Form::token(); !!}
                {{ \Session::forget('success') }}
                @if(\Session::get('error'))
                <div class="text-white" role="alert">
                    {{ \Session::get('error') }}
                </div>
                @endif
                <span class="login100-form-title p-b-34 p-t-27">
                    Register
                </span>
                <div class="wrap-input100 validate-input" data-validate="Enter name">
                    {{ Form::text($name = 'name', $value = null, array_merge(['class' => 'input100', 'placeholder' => 'Name'])) }}
                    @if($errors->has('name'))
                    <div class="text-white">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">person</i>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter email">
                    {{ Form::text($name = 'email', $value = null, array_merge(['class' => 'input100', 'placeholder' => 'Email'])) }}
                    @if($errors->has('email'))
                    <div class="text-white">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">mail</i>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter phone">
                    {{ Form::text($name = 'mobile', $value = null, array_merge(['class' => 'input100', 'placeholder' => 'Mobile'])) }}
                    @if($errors->has('mobile'))
                    <div class="text-white">
                        {{ $errors->first('mobile') }}
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">phone</i>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    {{ Form::password($name = 'password', array_merge(['class' => 'input100', 'placeholder' => 'Password'])) }}
                    @if($errors->has('password'))
                    <div class="text-white">
                        {{ $errors->first('password') }}
                    </div>
                    @else
                    <div class="text-white">
                        Password must contain at least one number and both uppercase and lowercase letters and one symbol,<br> minimum 7 digits.
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">lock</i>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" value="Login">
                        Register
                    </button>
                </div>
                <div class="contact100-form-checkbox mt-4">
                    <div class="form-check">
                        <div class="row">
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <a class="txt1" href="{{ route('account.login') }}">
                                        You have an Account Login Here
                                    </a>
                                </div>
                            </div>
                        </div>
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