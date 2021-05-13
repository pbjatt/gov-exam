@php
$setting = App\Model\Setting::first();
@endphp
@extends('frontend.layout.master')
@section('title', $setting->home_seo_title)
@section('keywords', $setting->home_seo_keywords)
@section('description', $setting->home_seo_description)
@section('image', url('/public/images/logo/'.$setting->logo))
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-xs-12 col-md-8">
            <div class="card filtertab">
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
                    <h2>Latest Notifications (नई भर्तियां) </h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    @php
                    $sn = $exams->firstItem();
                    @endphp
                    @foreach($notification as $key => $exam)
                    <strong class="mr-2">{{ $sn++ }}.</strong>
                    <strong> <a href="{{ url('notification/'.$exam->slug) }}">{{ $exam->title }}</a></strong>
                    <hr>
                    @endforeach
                </div>
            </div>

            <div class="card project_widget list_notify">
                <div class="header p-4">
                    <h2>Today Current Affair</h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    @if(count($currentaffair) != 0)
                    @foreach($currentaffair as $key => $ca)
                    @php
                    $sn = $key + 1;
                    @endphp
                    <div class="row">
                        <div class="col-2 pr-0">
                            <strong class="mr-2">{{ $sn++ }}.</strong>
                        </div>
                        <div class="col-10 p-0">
                            <strong> <a href="{{ url('currentaffair/detail/'.$ca->slug) }}">{{ $ca->title }}</a></strong>
                        </div>
                        <hr>

                    </div>
                    <hr>
                    @endforeach
                    @else
                    <div class="text-center p-4">No Records Found.</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="scrolling-pagination">
                <div class="blog-heading px-4 py-3">
                    Disscussion Points (विचार-विमर्श के विषय) -
                </div>
                @include('frontend.template.blog_list', compact('blogs'))
            </div>
            <div class="ajax-load text-center" style="display:none">
                <p><img class="scroll-loader" src="{{ url('/public/images/logo/'.$setting->logo) }}"></p>
            </div>
        </div>

</section>

<!-- Filter Exam -->
<div class="modal fade" id="examlistModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <form class="" action="" onsubmit="return false;" id="applyExamModal" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="formCard">
                    <div class="wrapper">
                        <div class="row mt-4 examData">
                            <div class="col-md-6 mb-3">
                                {{Form::select('age', $ageArr,'0', ['class' => 'squareInput des-select form-control currentsearch age'])}}
                                {{Form::label('record[age]', 'Select Age'), ['class' => 'active']}}
                            </div>
                            <div class="col-md-6 mb-3">
                                {{Form::select('qualification', $qualificationArr,'0', ['class' => 'squareInput des-select form-control currentsearch qualification'])}}
                                {{Form::label('record[qualification]', 'Select Qualification'), ['class' => 'active']}}
                            </div>
                            <div class="col-md-6 mb-3">
                                {{Form::select('category', $categoryArr,'0', ['class' => 'squareInput des-select form-control currentsearch category'])}}
                                {{Form::label('record[category]', 'Select Exam Category'), ['class' => 'active']}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" id="examform">
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    function examlist() {
        $('#examlistModal').modal('show')
    }
</script>


@stop