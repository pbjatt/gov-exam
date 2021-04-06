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
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="{{ url('assets/images/loading.png') }}" width="20" height="20" alt="admin">
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
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
                    <form action="{{ url('/examlist') }}">
                        <input type="text" name="s" autocomplete="off" class="form-control bg-white mt-3 pl-2 pr-2 masterSearch" data-url="{{ url('/ajex/search') }}" data-baseurl="{{ url('/') }}" style="height: 30px; align-items: center; border: 0; border-radius: 4px;">
                        <div class="search-result" style="display: block;">
                            <ul style="width: 550px;" class="listing m-0 p-0">
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 text-right">
                    @if(auth()->user())
                    <img src="{{ url('extraimage/images.jpg') }}" alt="user image" width="32" height="32" class="d-inline-block" title="{{ auth()->user()->name }}">
                    @endif
                    <div class="d-inline-block">
                        <div>
                            <i class="material-icons" onclick="openNav()">menu</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="menu menu1" id="mySidenav">
            <div>
                <ul>
                    <li> <a href="">Home</a></li>
                    <li> <a href="">Result</a></li>
                    <li> <a href="">Exams</a></li>
                    <li> <a href="">Notification</a></li>
                </ul>
            </div>
        </section>
    </nav>
    <!-- #Top Bar -->