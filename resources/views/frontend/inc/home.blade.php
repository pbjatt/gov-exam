@extends('frontend.layout.master')
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12" id="exam_list">
                            <div class="card project_widget">
                                <div class="header p-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <h2>Exam lists</h2>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                                            <!-- <h2><a href="" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2> -->
                                            {{ $exams->count() }} records found
                                        </div>
                                    </div>
                                </div>
                                <hr class="m-0">
                                <div class="body p-4">
                                    @if(count($exams) != 0 )
                                    @foreach($exams as $key => $exam)
                                    @php
                                    $sn = $key + 1;
                                    @endphp
                                    <div>
                                        <div class="mb-0">
                                            <strong class="mr-2">{{ $sn++ }}.</strong>
                                            <strong>
                                                @if($exam->post_type == 'exam')
                                                <a href="{{ url('exam/'.$exam->slug) }}">{{ $exam->name }}</a>
                                                @endif
                                                @if($exam->post_type == 'notification')
                                                <a href="{{ url('notification/'.$exam->slug) }}">{{ $exam->name }}</a>
                                                @endif
                                            </strong>
                                        </div>
                                        <div class="col-md-3 col-6 b-r mb-0">
                                            <strong></strong>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    {{ $exams->links() }}
                                    @endif
                                    @if(count($exams) == 0 )
                                    No records found.
                                    @endif
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