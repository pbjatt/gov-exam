@extends('frontend.layout.master')
@section('title', $exam->seo_title)
@section('keywords', $exam->seo_keywords)
@section('description', $exam->seo_description)
@section('image', url('images/exam/'.$exam->image))
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="m-b-20">
                    <div class="contact-grid">
                        <div class="profile-header bg-dark" style="min-height: 85px;">
                            <div class="user-name" style="padding-top: 15px;">{{ $exam->name }}</div>
                            <div class="name-center">{{ $exam->category->title }}</div>
                        </div>
                        <p>
                        </p>
                        <div class="row pt-2">
                            <div class="col-4">
                                <span class="font-weight-bold">
                                    @if ($notification != '')
                                    {{ $notification->posts }}
                                    @else
                                    Coming Soon...
                                    @endif
                                </span><br>
                                <small>Posts</small>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bold">
                                    @if ($notification != '')
                                    {{ date("d M, Y", strtotime($notification->vacancy_date)) }}
                                    @else
                                    Coming Soon...
                                    @endif
                                </span><br>
                                <small>Vacancy Date</small>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bold">
                                    @if ($notification != '')
                                    {{ date("d M, Y", strtotime($notification->form_start_date)) }}
                                    @else
                                    Coming Soon...
                                    @endif
                                </span><br>
                                <small>Form Start</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($exam->image != '')
            <div class="card project_widget">
                <div class="body">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ url('images/exam/'.$exam->image) }}" class="" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="card" style="min-height: 250px;">
                <div class="header">
                    <h6 class="mb-0">Details</h6>
                </div>
                <hr class="m-0">
                <div class="body">
                    <div class="contact-grid text-left">
                        <div class="row py-2">
                            <div class="col-6">
                                Age Limit :
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
                                <a class="nav-link active show" data-toggle="tab">{{ $exam->name }} Information</a>
                            </li>
                        </ul>
                        @if ($notification != '')
                        <a class="nav-link active show float-right" href="{{ url('notification/'.$notification->slug) }}">{{ $exam->name }} Notification</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card project_widget">
                                <div class="body" style="min-height: 320px;" id="exam-content">
                                    {!! $exam->description !!}
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