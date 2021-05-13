@php
$setting = App\Model\Setting::first();
@endphp
@extends('frontend.layout.master')
@section('title', $setting->notification_seo_title)
@section('keywords', $setting->notification_seo_keywords)
@section('description', $setting->notification_seo_description)
@section('image', $lists->image ? url('images/examnotification/'.$lists->image) : url('/public/images/logo/'.$setting->logo))
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="m-b-20">
                    <div class="contact-grid">
                        <div class="profile-header bg-dark" style="min-height: 85px;">
                            <div class="user-name" style="padding-top: 25px;"><a href="{{ $lists->url }}" class="text-white" title="{{ $lists->title }} Notification" target="_blank">{{ $lists->title }}</a></div>
                            <div class="name-center">{{ $lists->posts }} Posts</div>
                        </div>
                        <div style="position: absolute; top: -10px; left: -10px; color:white; background: #e05b48; padding: 6px 6px 0px; border-radius: 100%;">
                            <i class="material-icons m-0 p-0" style="font-size: 18px;" title="{{ $lists->title }} Notification">notifications</i>
                        </div>
                        <p>
                        </p>
                        <div class="row pt-2">
                            <div class="col-4">
                                <span class="font-weight-bold">
                                    {{ date("d M, Y", strtotime($lists->vacancy_date)) }}</span><br>
                                <small>Issue Date</small>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bold">
                                    {{ date("d M, Y", strtotime($lists->form_start_date)) }}</span><br>
                                <small>Start Date</small>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bold">
                                    {{ date("d M, Y", strtotime($lists->form_end_date)) }}</span><br>
                                <small>End Date</small>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            @if($lists->image != '')
            <div class="card project_widget">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ url('images/examnotification/'.$lists->image) }}" class="" alt="{{ $lists->title }}">
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="card project_widget">
                <div class="body">
                    <div class="row">
                        <div class="col-md-6 col-6 one-line">
                            <i class="fas fa-link"></i>&nbsp; Url
                        </div>
                        <div class="col-md-6 col-6">
                            <a href="{{ $lists->url }}" class="one-line" target="_blank" title="{{ $lists->title }} Notification">{{ $lists->url }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-6 one-line">
                            <i class="fas fa-calendar"></i>&nbsp; Vacancy Date
                        </div>
                        <div class="col-md-6 col-6">
                            {{ date("d M, Y", strtotime($lists->vacancy_date)) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-6 one-line">
                            <i class="fas fa-calendar"></i>&nbsp; Start Date
                        </div>
                        <div class="col-md-6 col-6">
                            {{ date("d M, Y", strtotime($lists->form_start_date)) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-6 one-line">
                            <i class="fas fa-calendar"></i>&nbsp; Form End Date
                        </div>
                        <div class="col-md-6 col-6">
                            {{ date("d M, Y", strtotime($lists->form_end_date)) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-6 one-line">
                            <i class="fas fa-calendar"></i>&nbsp; Exam Date
                        </div>
                        <div class="col-md-6 col-6">
                            @if($lists->exam_date != '')
                            {{ date("d M, Y", strtotime($lists->exam_date)) }}
                            @endif
                            @if($lists->exam_date == '')
                            Coming Soon...
                            @endif
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
                                <div class="body" style="height: 320px; overflow: hidden;" id="exam-content">
                                    {!! $info->short_description !!}
                                    <div>
                                        <a class="read_more" href="{{ url('notification/'.$lists->slug.'/'.$info->infotype->slug) }}">Read More...</a>
                                    </div>
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
                                <div class="body" style="height: 320px; overflow: hidden;" id="exam-content">
                                    {!! $info->short_description !!}
                                    <div>
                                        <a class="read_more" href="{{ url('notification/'.$lists->slug.'/'.$info->infotype->slug) }}">Read More...</a>
                                    </div>
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
</section>

@stop