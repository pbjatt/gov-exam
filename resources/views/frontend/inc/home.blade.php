@extends('frontend.layout.master')
@section('contant')

    <section class="container" style="margin-top: 80px;">
        <!-- <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Exam Details</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ url('admin/shop') }}" onClick="return false;">Exam</a>
                        </li>
                        <li class="breadcrumb-item active">Exam Details</li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- Your content goes here  -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="m-b-20">
                        <div class="contact-grid">
                            <div class="profile-header bg-dark">
                                <div class="user-name" style="padding-top: 25px;">Exam List</div>
                                <!-- <div class="name-center">Software Engineer</div> -->
                            </div>
                            <img src="{{ url('/').'/images/shop/' }}" class="user-img" alt="">
                            <p>
                            </p>
                            <div>
                                <span class="phone">
                                    <i class="material-icons">phone</i>345456</span>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5></h5>
                                    <small>Products</small>
                                </div>
                                <div class="col-4">
                                    <h5></h5>
                                    <small>Orders</small>
                                </div>
                                <div class="col-4">
                                    <h5>565</h5>
                                    <small>Users</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="profile-tab-box">
                        <div class="p-l-20">
                            <ul class="nav ">
                                <li class="nav-item tab-all">
                                    <a class="nav-link active show" href="#project" data-toggle="tab">About Me</a>
                                </li>
                                <li class="nav-item tab-all p-l-20">
                                    <a class="nav-link" href="#usersettings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <h2>Details</h2>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                                                <h2><a href="" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body" style="min-height: 320px;">
                                        <div class="row">
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Age</strong>
                                                <br>
                                                <p class="text-muted">20</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Qualification</strong>
                                                <br>
                                                <p class="text-muted">bca</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Category</strong>
                                                <br>
                                                <p class="text-muted">dfgfdf</p>
                                            </div>
                                        </div>
                                        <p class="m-t-30">
                                            <strong>Description</strong><br>
                                            drtgrfgtry
                                        </p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="usersettings" aria-expanded="true">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <h2>Abrtyhtrfyhrtout</h2>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                                                <h2><a href="" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body" style="min-height: 320px;">
                                        <div class="row">
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">787463464565</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">admin@gmail.com</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Web Url</strong>
                                                <br>
                                                <p class="text-muted"></p>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <strong>Location</strong>
                                                <br>
                                                <p class="text-muted"></p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Pan Number</strong>
                                                <br>
                                                <p class="text-muted"></p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>GST Number</strong>
                                                <br>
                                                <p class="text-muted"></p>
                                            </div>
                                        </div>
                                        <p class="m-t-30">
                                            <strong>Description</strong><br>
                                            rtyhthghng
                                        </p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop