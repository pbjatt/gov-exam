@extends('frontend.layout.master')
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="m-b-20">
                    <div class="contact-grid">
                        <div class="profile-header bg-dark" style="min-height: 85px;">
                            <div class="user-name" style="padding-top: 25px;">{{ $exam->name }}</div>
                            <div class="name-center">{{ $exam->category->title }}</div>
                        </div>
                        <p>
                        </p>
                        <div class="row pt-2">
                            <div class="col-4">
                                <span class="font-weight-bold">sfgds</span><br>
                                <small>Products</small>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bold">sfgds</span><br>
                                <small>Start Date</small>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bold">sfgds</span><br>
                                <small>Users</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h6 class="mb-0">Details</h6>
                </div>
                <hr class="m-0">
                <div class="body">
                    <div class="contact-grid text-left">
                        <div class="row py-2">
                            <div class="col-6">
                                Age :
                            </div>
                            <div class="col-6">
                                {{ $exam->exam_age->age }}
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-6">
                                Qualification :
                            </div>
                            <div class="col-6">
                                {{ $exam->exam_qualification->title }}
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
                        <ul class="nav d-inline-block">
                            <li class="nav-item tab-all">
                                <a class="nav-link active show" href="#project" data-toggle="tab">{{ $exam->name }} Information</a>
                            </li>
                        </ul>
                        <a class="nav-link active show float-right" href="{{ url('notification/'.$notification->slug) }}">{{ $exam->name }} Notification</a>
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
                                    </div>
                                </div>
                                <div class="body" style="min-height: 320px;">
                                    {{ $exam->description }}
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
                                            <h2>Description</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="body" style="min-height: 320px;">
                                    <p class="m-t-30">
                                        {{ $exam->description }}
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