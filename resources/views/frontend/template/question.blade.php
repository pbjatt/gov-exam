<div class="card project_widget">
    <div class="header p-4">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2>Questions</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                <!-- <h2><a href="" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2> -->
                {{ $question->count() }} records found
            </div>
        </div>
    </div>
</div>

@php
$sn = 1;
@endphp
@if(count($question) != 0 )
<div class="row">
    <form action="" method="POST">
        @csrf
        @foreach($question as $key => $q)
        <div class="col-12">
            <div class="card">
                <div class="header bg-cyan">
                    <a href="{{ route('questiondetail', $q->slug) }}">
                        <div class="row">
                            <h2 class="col-1">{{ $sn++ }}</h2>
                            <h2 class="col-10 question-title">{{ $q->question }}</h2>
                        </div>
                    </a>
                    <ul class="header-dropdown" style="top: 16px;">
                        <li>
                            <a href="{{ route('questiondetail', $q->slug) }}">
                                <i class="material-icons">remove_red_eye</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <input type="hidden" id="correct_{{ $q->id }}" value="{{ $q->correct_answer }}">
                    <div class="form-check form-check-radio row">
                        <label class="col-12">
                            <div class="row">
                                <span class="col-1">A</span>
                                <input name="qagroup1[{{$q->id}}]" type="radio" value="{{ $q->option_1 }}" class="qanswer" data-ques="{{ $q->id }}" id="qanswer_{{ $q->id }}_1" />
                                <span class="col-10 qares">{{ $q->option_1 }} &nbsp; &nbsp;</span>
                            </div>
                        </label>
                        <label class="col-12">
                            <div class="row">
                                <span class="col-1">B</span>
                                <input name="qagroup1[{{$q->id}}]" type="radio" value="{{ $q->option_2 }}" class="qanswer" data-ques="{{ $q->id }}" id="qanswer_{{ $q->id }}_2" />
                                <span class="col-10 qares">{{ $q->option_2 }} &nbsp; &nbsp;</span>
                            </div>
                        </label>
                        @if($q->option_3)
                        <label class="col-12">
                            <div class="row">
                                <span class="col-1">C</span>
                                <input name="qagroup1[{{$q->id}}]" type="radio" value="{{ $q->option_3 }}" class="qanswer" data-ques="{{ $q->id }}" id="qanswer_{{ $q->id }}_3" />
                                <span class="col-10 qares">{{ $q->option_3 }} &nbsp; &nbsp;</span>
                            </div>
                        </label>
                        @endif
                        @if($q->option_4)
                        <label class="col-12">
                            <div class="row">
                                <span class="col-1">D</span>
                                <input name="qagroup1[{{$q->id}}]" type="radio" value="{{ $q->option_4 }}" class="qanswer" data-ques="{{ $q->id }}" id="qanswer_{{ $q->id }}_4" />
                                <span class="col-10 qares">{{ $q->option_4 }} &nbsp; &nbsp;</span>
                            </div>
                        </label>
                        @endif
                        @if($q->option_5)
                        <label class="col-12">
                            <div class="row">
                                <span class="col-1">E</span>
                                <input name="qagroup1[{{$q->id}}]" type="radio" value="{{ $q->option_5 }}" class="qanswer" data-ques="{{ $q->id }}" id="qanswer_{{ $q->id }}_5" />
                                <span class="col-10 qares">{{ $q->option_5 }} &nbsp; &nbsp;</span>
                            </div>
                        </label>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </form>
</div>
@else
<div class="ml-2">
    No records found.
</div>
@endif