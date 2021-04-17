@extends('frontend.layout.master')
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-xs-12 col-md-8">
            {{ Form::open(['url' => route('pdf'), 'method'=>'GET', 'files' => true, 'class' => 'user']) }}
            <div class="card">
                <div class="profile-tab-box">
                    <div class="p-l-10">
                        <ul class="nav">
                            <li class="nav-item tab-all">
                                <a class="nav-link active show">
                                    {{Form::select('year', $yearArr,'', ['class' => 'nav-select form-control currentsearch', 'id' => 'affairyear'])}}
                                </a>
                            </li>
                            <li class="nav-item tab-all p-l-20">
                                <a class="nav-link active show">
                                    {{Form::select('month', $monthArr,'', ['class' => 'nav-select form-control currentsearch', 'id' => 'affairmonth'])}}
                                </a>
                            </li>
                            <li class="nav-item tab-all p-l-20">
                                <a class="nav-link active show">
                                    {{Form::select('day', $dayArr,'', ['class' => 'nav-select form-control currentsearch', 'id' => 'affairday'])}}
                                </a>
                            </li>
                            <li class="nav-item tab-all p-l-20">
                                <a class="nav-link active show">
                                    {{Form::select('category_id', $currentaffaircategoryArr,'', ['class' => 'nav-select form-control currentsearch', 'id' => 'affaircategory'])}}
                                </a>
                            </li>
                            <span id="affairUrl" data-url="{{ route('search') }}"></span>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12" id="ca_list">
                            @include('frontend.template.currentaffair', compact('currentaffair'))
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card project_widget">
                <div class="header p-4">
                    <h2>Notification</h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    @php
                    $sn = 1
                    @endphp
                    @foreach($notification as $key => $exam)
                    <strong class="mr-2">{{ $sn++ }}.</strong>
                    <strong> <a href="{{ url('notification/'.$exam->slug) }}">{{ $exam->title }}</a></strong>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
</section>

@stop