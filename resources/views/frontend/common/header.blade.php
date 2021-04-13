<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gov Exam</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ url('extraimage/exam1.png') }}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <!-- {{ HTML::style('assets/css/app.min.css') }} -->
    {{ HTML::style('assets/css/form.min.css') }}
    {{ HTML::style('assets/css/app.css') }}
    {{ HTML::style('assets/css/styles/all-themes.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('css/style.css') }}
</head>

<body class="light">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <!-- <img class="loading-img-spin" src="{{ url('assets/images/loading.png') }}" width="20" height="20" alt="admin"> -->
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar active" style="background-color: #353c48 !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ url('extraimage/exam1.png') }}" alt="" style="width: 40px;">
                    <h2 class="d-inline-block">Gov Exam</h2>
                </div>
                <div class="col-md-6 text-center">
                    <input type="text" class="form-control bg-white mt-3 pl-2 pr-2" style="height: 30px; align-items: center; border: 0;">
                </div>
                <div class="col-md-3 text-right">
                    <i class="material-icons">menu</i>
                </div>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->