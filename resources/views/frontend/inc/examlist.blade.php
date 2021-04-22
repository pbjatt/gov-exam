@extends('frontend.layout.master')
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
                    <h2>Notification</h2>
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
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="">
                @if(count($blogs) != 0 )
                @foreach($blogs as $key => $blog)
                <div class="card project_widget">
                    <div class="body p-0">
                        <div class="row p-4">
                            <div class="col-10 blog-title">
                                <!-- <a href="#">
                                    <img src="http://localhost/gov-exam/extraimage/images.jpg" alt="user image" style="border-radius: 100%;" width="24" height="24" class="d-inline-block" title="pbjatt">
                                </a> -->
                                @if($blog->post_type == 'notification')
                                <span><a href="{{ url('notification/'.$blog->blog_slug) }}">{{ $blog->blog_title }}</a></span>
                                @endif
                                @if($blog->post_type == 'blog')
                                <span><a href="{{ url('blog/'.$blog->blog_slug) }}">{{ $blog->blog_title }}</a></span>
                                @endif
                            </div>
                            <div class="col-2 text-right"><i class="fas fa-ellipsis-v"></i></div>
                        </div>
                        <div class="card-image">
                            @if($blog->post_type == 'notification')
                            <a href="{{ url('notification/'.$blog->blog_slug) }}">
                                <img src="{{ url('storage/notification/'.$blog->blog_image) }}" alt="{{ $blog->blog_image }}" width="100%">
                            </a>
                            @endif
                            @if($blog->post_type == 'blog')
                            <a href="{{ url('blog/'.$blog->blog_slug) }}">
                                <img src="{{ url('storage/blog/'.$blog->blog_image) }}" alt="{{ $blog->blog_image }}" width="100%">
                            </a>
                            @endif
                        </div>
                        <hr class="m-0 p-0">
                        <div class="description">
                            <div class="three-line" style="height: 65px; overflow: hidden; margin: 20px">{{ $blog->blog_short_desc }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
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