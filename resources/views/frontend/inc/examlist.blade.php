@extends('frontend.layout.master')
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="profile-tab-box">
                    <div class="p-l-10">
                        <!-- {{ Form::open(['url' => url('examlist'), 'method'=>'GET', 'id' => 'filterexam']) }} -->
                        <ul class="nav ">
                            <li class="nav-item tab-all">
                                <a class="nav-link active show">
                                    {{Form::select('age', $ageArr,'0', ['class' => 'nav-select form-control', 'id' => 'category'])}}
                                </a>
                            </li>
                            <li class="nav-item tab-all p-l-20">
                                <a class="nav-link active show">
                                    {{Form::select('category', $categoryArr,'0', ['class' => 'nav-select form-control', 'id' => 'examcategory'])}}
                                </a>
                            </li>
                            <li class="nav-item tab-all p-l-20">
                                <a class="nav-link active show">
                                    {{Form::select('qualification', $qualificationArr,'0', ['class' => 'nav-select form-control', 'id' => 'qualification'])}}
                                </a>
                            </li>
                        </ul>
                        <!-- {{ Form::close() }} -->
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card project_widget">
                                <div class="header p-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <h2>Exam lists</h2>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                                            <!-- <h2><a href="" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2> -->
                                            {{ $exams->count() }} records found
                                            <div id="clearFilter">clear filter</div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="m-0">
                                <div class="body p-4">
                                    @foreach($exams as $key => $exam)
                                    @php
                                    $sn = $key + 1;
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-1 col-6 b-r mb-0">
                                            <strong>{{ $sn++ }}.</strong>
                                        </div>
                                        <div class="col-md-8 col-6 b-r mb-0">
                                            <strong> <a href="{{ url('exam/'.$exam->slug) }}">{{ $exam->name }}</a></strong>
                                        </div>
                                        <div class="col-md-3 col-6 b-r mb-0">
                                            <strong>{{ $exam->start_date }}</strong>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                </div>
                            </div>
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