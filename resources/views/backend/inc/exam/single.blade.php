@php
$guardData = Auth::guard()->user();
@endphp
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
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
        </div>
        <!-- Your content goes here  -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="m-b-20">
                        <div class="contact-grid">
                            <div class="profile-header bg-dark">
                                <div class="user-name" style="padding-top: 25px;">{{ $lists->name }}</div>
                                <!-- <div class="name-center">Software Engineer</div> -->
                            </div>
                            <img src="{{ url('/').'/images/shop/'.$lists->image }}" class="user-img" alt="">
                            <p>
                            </p>
                            <div>
                                <span class="phone">
                                    <i class="material-icons">phone</i>{{ $lists->mobile }}</span>
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
                                    <a class="nav-link active show" href="#project" data-toggle="tab">{{ $lists->name }} Information</a>
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
                                        <h2>Details</h2>
                                    </div>
                                    <div class="body" style="min-height: 320px;" id="exam-content">
                                        <div class="row">
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Age</strong>
                                                <br>
                                                <p class="text-muted">{{ $lists->exam_age->age }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Qualification</strong>
                                                <br>
                                                <p class="text-muted">{{ $lists->exam_qualification->title }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Category</strong>
                                                <br>
                                                <p class="text-muted">{{ $lists->category->title }}</p>
                                            </div>
                                        </div>
                                        <p class="m-t-30">
                                            <strong>Description</strong><br>
                                            {!! $lists->description !!}
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
    </div>
</section>