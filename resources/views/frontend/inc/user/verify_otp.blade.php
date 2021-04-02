<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <h1>Please Verify Your Account</h1>
      <h1>Your Verification OTP</h1>
      @if (session('resent'))
      <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
      </div>
      @endif
      <a href="{{ route('account.verify', $otp_token) }}">Click Here</a>.
    </div>
  </body>
</html>
