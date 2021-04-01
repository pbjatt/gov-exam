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
                            <h4 class="page-title">Exam Notification
                            </h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">Master Notification
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-sm-12 col-md-6 col-lg-3">
                <a href="{{ route('admin.examnotification.create') }}">
                    <div class="card text-center">
                        <div class="header" style="background-color: #5783c7;">
                            <h2 class="text-white"><b>Exam Notification</b></h2>
                        </div>
                        <div class=" body">
                            <div>
                                Add Exam Notification
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-3 col-sm-12 col-md-6 col-lg-3">
                <a href="{{ route('admin.examnotification.index') }}">
                    <div class="card text-center">
                        <div class="header" style="background-color: #5783c7;">
                            <h2 class="text-white"><b>Exam Notification</b></h2>
                        </div>
                        <div class=" body">
                            <div>
                                View Exam Notification
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-3 col-sm-12 col-md-6 col-lg-3">
                <a href="{{ route('admin.notification.submaster') }}">
                    <div class="card text-center">
                        <div class="header" style="background-color: #5783c7;">
                            <h2 class="text-white"><b>Notification Information</b></h2>
                        </div>
                        <div class=" body">
                            <div>
                                Notification Information
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>