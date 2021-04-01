@php
$setting = App\Model\Setting::find(1);
$guardData = Auth::guard()->user();
if($guardData->role_id == '2') {
$shopertor = App\Model\Operator::where('user_id', $guardData->id)->first();
$shopData = App\Model\Shop::find($shopertor->shop_id);
}
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ url('extraimage/exam1.png') }}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <!-- {{ HTML::style('assets/css/app.min.css') }} -->
    <!-- {{Html::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css')}} -->
    {{ HTML::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css') }}
    {{ HTML::style('assets/css/form.min.css') }}
    {{ HTML::style('assets/css/app.css') }}
    {{ HTML::style('assets/css/styles/all-themes.css') }}
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('assets/js/bundles/multiselect/css/multi-select.css') }}
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
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
                <a class="navbar-brand" href="{{ url('admin') }}">
                    <!-- <img src="{{ url('extraimage/admin_dash.png') }}" width="20%" alt="" /> -->
                    <span class="logo-name">{{ $setting->title }}</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-left">
                    <li>
                        <a href="#" onClick="return false;" class="sidemenu-collapse">
                            <i class="material-icons">reorder</i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Full Screen Button -->
                    <!-- <li class="fullscreen">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li> -->
                    <!-- #END# Full Screen Button -->
                    <!-- #START# Notifications-->
                    <!-- <li class="dropdown">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                            role="button">
                            <i class="far fa-bell"></i>
                            <span class="label-count bg-orange"></span>
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{ url('assets/images/user/user1.jpg') }}" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Sarah Smith</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{ url('assets/images/user/user2.jpg') }}" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Airi Satou</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="{{ url('assets/images/user/user3.jpg') }}" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">John Doe</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="../../assets/images/user/user4.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Ashton Cox</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="../../assets/images/user/user5.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Cara Stevens</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="../../assets/images/user/user6.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">Charde Marshall</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">
                                            <span class="table-img msg-user">
                                                <img src="../../assets/images/user/user7.jpg" alt="">
                                            </span>
                                            <span class="menu-info">
                                                <span class="menu-title">John Doe</span>
                                                <span class="menu-desc">
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </span>
                                                <span class="menu-desc">Please check your email.</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#" onClick="return false;">View All Notifications</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- #END# Notifications-->
                    <li class="dropdown user_profile">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <img src="{{ url('extraimage/images.jpg') }}" width="32" height="32" alt="User">
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>@if($guardData->role_id == '1')
                                        <a href="{{ url('admin/profile') }}">
                                            <i class="material-icons">person</i>Profile
                                        </a>
                                        @endif
                                        @if($guardData->role_id == '2')
                                        <a href="{{ url('shop/profile') }}">
                                            <i class="material-icons">person</i>Profile
                                        </a>
                                        @endif
                                    </li>
                                    <!-- <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">feedback</i>Feedback
                                        </a>
                                    </li> -->
                                    <!-- <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">help</i>Help
                                        </a>
                                    </li> -->
                                    <li>
                                        @if($guardData->role_id == '1')
                                        <a href="{{ url(env('ADMIN_DIR').'/logout') }}">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                        @endif
                                        @if($guardData->role_id == '2')
                                        <a href="{{ url('shop/logout') }}">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right pr-3">
                        <!-- <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true"> -->
                        @if($guardData->role_id == '1')
                        <a href="{{ url(env('ADMIN_DIR').'/setting') }}">
                            <i class="fas fa-cog"></i>
                        </a>
                        @endif
                        <!-- @if($guardData->role_id == '2')
                        <a href="{{ url('shop/setting') }}">
                            <i class="fas fa-cog"></i>
                        </a>
                        @endif -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->