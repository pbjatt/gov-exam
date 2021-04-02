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
                {!! Form::open(['url' => route('account.login.post'), 'method' => 'post', 'class' => 'login100-form validate-form']) !!}

                {!! Form::token(); !!}
                {{ \Session::forget('success') }}
                @if(\Session::get('error'))
                <div class="text-white text-center" role="alert">
                    {{ \Session::get('error') }}
                </div>
                @endif
                <span class="login100-form-title p-b-34 p-t-27">
                    Log in
                </span>
                <div class="wrap-input100 validate-input" data-validate="Enter email">
                    {{ Form::text($name = 'login', $value = null, array_merge(['class' => 'input100', 'placeholder' => 'Email or Phone'])) }}
                    @if($errors->has('login'))
                    <div class="text-white">
                        {{ $errors->first('login') }}
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">person</i>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    {{ Form::password($name = 'password', array_merge(['class' => 'input100', 'placeholder' => 'Password'])) }}
                    @if($errors->has('password'))
                    <div class="text-white">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                    <i class="material-icons focus-input1001">lock</i>
                </div>
                <div class="contact100-form-checkbox">
                    <div class="form-check">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value=""> Remember me
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label> -->
                            </div>
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <a class="txt1" href="{{ route('account.forgetpassword') }}">
                                        Forgot Password?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" value="Login">
                        Login
                    </button>
                </div>
                <div class="contact100-form-checkbox mt-4">
                    <div class="form-check">
                        <div class="row">
                            </div>
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <a class="txt1" href="{{ route('account.register') }}">
                                    You Don't have an Account Register Here
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