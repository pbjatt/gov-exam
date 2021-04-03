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
                            <h4 class="page-title">Notification Details</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('admin.notificationinfo.index') }}">Notification List</a>
                        </li>
                        <li class="breadcrumb-item active">Notification Details</li>
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
                            <div class="profile-header bg-dark" style="min-height: 85px;">
                                <div class="user-name" style="padding-top: 25px;">{{ $lists->title }}</div>
                                <!-- <div class="name-center">Software Engineer</div> -->
                            </div>
                            <p>
                            </p>
                            <div>
                                <span class="phone">
                                    <i class="material-icons"></i>{{ $lists->mobile }}</span>
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
                <div class="card project_widget">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-5">
                                Url :
                            </div>
                            <div class="col-md-7">
                                {{ $lists->url }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                Vacancy Date :
                            </div>
                            <div class="col-md-7">
                                {{ $lists->vacancy_date }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                Form Start Date :
                            </div>
                            <div class="col-md-7">
                                {{ $lists->form_start_date }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                Form End Date :
                            </div>
                            <div class="col-md-7">
                                {{ $lists->form_end_date }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                Exam Date :
                            </div>
                            <div class="col-md-7">
                                {{ $lists->exam_date }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="profile-tab-box">
                        <div class="p-l-20">
                            <ul class="nav">
                                @foreach($lists->infodata as $key => $info)
                                @if($key == 0)
                                <li class="nav-item tab-all">
                                    <a class="nav-link active show" href="#{{ $info->infotype->slug }}" data-toggle="tab">{{ $info->infotype->name }}</a>
                                </li>
                                @endif
                                @if($key != 0)
                                <li class="nav-item tab-all p-l-20">
                                    <a class="nav-link" href="#{{ $info->infotype->slug }}" data-toggle="tab">{{ $info->infotype->name }}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    @foreach($lists->infodata as $key => $info)
                    @if($key == 0)
                    <div role="tabpanel" class="tab-pane active" id="{{ $info->infotype->slug }}" aria-expanded="true">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card project_widget">
                                    <div class="body" style="min-height: 320px;">
                                        {!! $info->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($key != 0)
                    <div role="tabpanel" class="tab-pane" id="{{ $info->infotype->slug }}" aria-expanded="true">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card project_widget">
                                    <div class="body" style="min-height: 320px;">
                                        {!! $info->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>