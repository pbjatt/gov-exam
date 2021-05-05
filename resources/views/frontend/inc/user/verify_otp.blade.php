<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <!-- <h1>Please Verify Your Account</h1> -->
      <p style="color: #555;">Hello! Just need you to verify that this is your email address.</p>
      @if (session('resent'))
      <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
      </div>
      @endif
      <button style="color: #fff;background-color: #3498DB;font-size:17px;padding: 5px 10px;border: 1px solid #3498DB;"><a  style="color:#fff;" href="{{ route('account.verify', $otp_token) }}">click here to verify</a>.</button>
    </div>
  </body>
</html>
