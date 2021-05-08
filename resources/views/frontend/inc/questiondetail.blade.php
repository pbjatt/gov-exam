@extends('frontend.layout.master')
@section('title', $question->question)
@section('keywords', '')
@section('description', $question->question)
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-xs-12 col-md-8" id="listdetail">
            <div class="row">

                <form action="" method="POST">
                    @csrf
                    <div class="col-12">
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>{{ $question->question }}</h2>
                            </div>
                            <div class="body">
                                <input type="hidden" id="correct_{{ $question->id }}" value="{{ $question->correct_answer }}">
                                <div class="form-check form-check-radio row">
                                    <label class="col-12">
                                        <div class="row">
                                            <span class="col-1">A</span>
                                            <input name="qagroup1[{{$question->id}}]" type="radio" value="{{ $question->option_1 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_1" />
                                            <span class="col-10 qares">{{ $question->option_1 }} &nbsp; &nbsp;</span>
                                        </div>
                                    </label>
                                    <label class="col-12">
                                        <div class="row">
                                            <span class="col-1">B</span>
                                            <input name="qagroup1[{{$question->id}}]" type="radio" value="{{ $question->option_2 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_2" />
                                            <span class="col-10 qares">{{ $question->option_2 }} &nbsp; &nbsp;</span>
                                        </div>
                                    </label>
                                    @if($question->option_3)
                                    <label class="col-12">
                                        <div class="row">
                                            <span class="col-1">C</span>
                                            <input name="qagroup1[{{$question->id}}]" type="radio" value="{{ $question->option_3 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_3" />
                                            <span class="col-10 qares">{{ $question->option_3 }} &nbsp; &nbsp;</span>
                                        </div>
                                    </label>
                                    @endif
                                    @if($question->option_4)
                                    <label class="col-12">
                                        <div class="row">
                                            <span class="col-1">D</span>
                                            <input name="qagroup1[{{$question->id}}]" type="radio" value="{{ $question->option_4 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_4" />
                                            <span class="col-10 qares">{{ $question->option_4 }} &nbsp; &nbsp;</span>
                                        </div>
                                    </label>
                                    @endif
                                    @if($question->option_5)
                                    <label class="col-12">
                                        <div class="row">
                                            <span class="col-1">E</span>
                                            <input name="qagroup1[{{$question->id}}]" type="radio" value="{{ $question->option_5 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_5" />
                                            <span class="col-10 qares">{{ $question->option_5 }} &nbsp; &nbsp;</span>
                                        </div>
                                    </label>
                                    @endif

                                    <!-- <hr>
                                    <div class="p-3 mt-2">
                                        <h2 class="text-center mb-4"> Solution </h2>
                                        {!! $question->description !!}
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="questioncomment">
                @include('frontend.template.questioncomment', compact('comments','question'))
            </div>
        </div>
        <div class="col-lg-4 col-md-4" id="listside">
            @include('frontend.template.questionfilter')
            <div class="card project_widget list_notify">
                <div class="header p-4">
                    <h2>Releted Questions</h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    @if(count($releted) != 0)
                    @foreach($releted as $key => $question)
                    @php
                    $sn = $key + 1;
                    @endphp
                    <div class="row">
                        <div class="col-2 pr-0">
                            <strong class="mr-2">{{ $sn++ }}.</strong>
                        </div>
                        <div class="col-10 p-0">
                            <strong> <a href="{{ route('questiondetail', $question->slug) }}">{{ $question->question }}</a></strong>
                        </div>
                        <hr>

                    </div>
                    @endforeach
                    @else
                    <div class="text-center p-4">No Records Found.</div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</section>

@stop