<section class="content">
    <div class="container-fluid">
        @include('frontend.template.user.flash-message')
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('user.dashboard') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('user.question.index') }}">Question</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Your content goes here  -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="m-b-20">
                        <div class="contact-grid">
                            <div class="profile-header bg-dark">
                                <div class="user-name" style="padding: 25px;">{{ $question->question }}</div>
                                <!-- <div class="name-center">Software Engineer</div> -->
                            </div>
                            <div class="row">
                                <div class="body" style="padding: 25px;">
                                    <input type="hidden" id="correct_{{ $question->id }}" value="{{ $question->correct_answer }}">
                                    <div class="form-check form-check-radio row">
                                        <label class="col-12">
                                            <div class="row">
                                                <span class="col-1">A</span>
                                                <input name="qagroup1[{{$question->id}}]" style="opacity: 0;" type="radio" value="{{ $question->option_1 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_1" />
                                                <span class="col-10 qares">{{ $question->option_1 }} &nbsp; &nbsp;</span>
                                            </div>
                                        </label>
                                        <label class="col-12">
                                            <div class="row">
                                                <span class="col-1">B</span>
                                                <input name="qagroup1[{{$question->id}}]" style="opacity: 0;" type="radio" value="{{ $question->option_2 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_2" />
                                                <span class="col-10 qares">{{ $question->option_2 }} &nbsp; &nbsp;</span>
                                            </div>
                                        </label>
                                        @if($question->option_3)
                                        <label class="col-12">
                                            <div class="row">
                                                <span class="col-1">C</span>
                                                <input name="qagroup1[{{$question->id}}]" style="opacity: 0;" type="radio" value="{{ $question->option_3 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_3" />
                                                <span class="col-10 qares">{{ $question->option_3 }} &nbsp; &nbsp;</span>
                                            </div>
                                        </label>
                                        @endif
                                        @if($question->option_4)
                                        <label class="col-12">
                                            <div class="row">
                                                <span class="col-1">D</span>
                                                <input name="qagroup1[{{$question->id}}]" style="opacity: 0;" type="radio" value="{{ $question->option_4 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_4" />
                                                <span class="col-10 qares">{{ $question->option_4 }} &nbsp; &nbsp;</span>
                                            </div>
                                        </label>
                                        @endif
                                        @if($question->option_5)
                                        <label class="col-12">
                                            <div class="row">
                                                <span class="col-1">E</span>
                                                <input name="qagroup1[{{$question->id}}]" style="opacity: 0;" type="radio" value="{{ $question->option_5 }}" class="qanswer" data-ques="{{ $question->id }}" id="qanswer_{{ $question->id }}_5" />
                                                <span class="col-10 qares">{{ $question->option_5 }} &nbsp; &nbsp;</span>
                                            </div>
                                        </label>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <h2>Details</h2>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                                                <h2><a href="{{ route('user.question.edit',$question->id) }}" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body" style="min-height: 320px;">
                                        <div class="row">
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Category</strong>
                                                <br>
                                                <p class="text-muted">{{ $question->category->title }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Difficulty</strong>
                                                <br>
                                                <p class="text-muted">{{ $question->difficulty }}</p>
                                            </div>
                                        </div>
                                        <p class="m-t-30">
                                            <strong>Solution</strong><br>
                                            {!! $question->description !!}
                                        </p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>