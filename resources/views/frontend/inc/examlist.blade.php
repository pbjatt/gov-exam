@extends('frontend.layout.master')
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="profile-tab-box">
                    <div class="p-l-10">
                        <ul class="nav">
                            <li class="nav-item tab-all">
                                <a class="nav-link active show">
                                    {{Form::select('age', $ageArr,'0', ['class' => 'nav-select form-control searchExam', 'id' => 'age'])}}
                                </a>
                            </li>
                            <li class="nav-item tab-all p-l-20">
                                <a class="nav-link active show">
                                    {{Form::select('category', $categoryArr,'0', ['class' => 'nav-select form-control searchExam', 'id' => 'category'])}}
                                </a>
                            </li>
                            <li class="nav-item tab-all p-l-20">
                                <a class="nav-link active show">
                                    {{Form::select('qualification', $qualificationArr,'0', ['class' => 'nav-select form-control searchExam', 'id' => 'qualification'])}}
                                </a>
                            </li>
                            <span id="baseUrl" data-url="{{ url('/examsearch') }}"></span>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12" id="exam_list">
                            @include('frontend.template.exam_list', compact('exams'))
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card project_widget">
                <div class="header p-4">
                    <h2>Notification</h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    @foreach($notification as $key => $exam)
                    @php
                    $sn = $key + 1;
                    @endphp
                    <strong class="mr-2">{{ $sn++ }}.</strong>
                    <strong> <a href="{{ url('notification/'.$exam->slug) }}">{{ $exam->title }}</a></strong>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@stop