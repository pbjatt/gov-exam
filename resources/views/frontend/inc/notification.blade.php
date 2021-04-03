@extends('frontend.layout.master')
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
                                <span class="font-weight-bold">{{ $lists->vacancy_date }}</span><br>
                                <small>Issue Date</small>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bold">{{ $lists->form_start_date }}</span><br>
                                <small>Start Date</small>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bold">{{ $lists->form_end_date }}</span><br>
                                <small>End Date</small>
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
                            <a href="{{ $lists->url }}" target="_blank" title="{{ $lists->title }} Notification">{{ $lists->url }}</a>

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
                            @if($lists->exam_date != '')
                            {{ $lists->exam_date  }}
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
                                <div class="body" style="min-height: 325px;" id="exam-content">
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
                                <div class="body" style="min-height: 325px;" id="exam-content">
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
</section>

@stop