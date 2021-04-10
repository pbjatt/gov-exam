<section class="content">
    <div class="container-fluid">
        @include('frontend.template.user.flash-message')
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">{{ isset($question) ? 'Edit Question' : 'Add Question' }}</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('user.dashboard') }}">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('user.question.index') }}">Question</a>
                        </li>
                        <li class="breadcrumb-item active">{{ isset($question) ? 'Edit Question' : 'Add Question' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="header">
                            <h2 class="pt-2"><b>{{ isset($question) ? 'Edit Question' : 'Add Question' }}</b></h2>
                        </div>
                        <hr>
                        <div class="formCard">
                            <div class="wrapper">
                                @if(isset($question))
                                {{ Form::open(['url' => route('user.question.update', $question->id), 'method'=>'PUT', 'files' => false, 'class' => 'user']) }}
                                @else
                                {{ Form::open(['url' => route('user.question.store'), 'method'=>'POST', 'files' => false, 'class' => 'user']) }}
                                @endif
                                @if(count($errors->all()))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-12">
                                        {{ Form::textarea('question[question]','', ['class'=>'squareInput des-textarea editor', 'placeholder'=>'Enter Your Question']) }}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('question[option_1]', '', ['class' => 'squareInput', 'placeholder'=>'Enter 1st Option','required'=>'required'])}}
                                        {{Form::label('name', 'Enter 1st Option'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('question[option_2]', '', ['class' => 'squareInput', 'placeholder'=>'Enter 2nd Option','required'=>'required'])}}
                                        {{Form::label('name', 'Enter 2nd Option'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('question[option_3]', '', ['class' => 'squareInput', 'placeholder'=>'Enter 3rd Option'])}}
                                        {{Form::label('name', 'Enter 3rd Option'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('question[option_4]', '', ['class' => 'squareInput', 'placeholder'=>'Enter 4th Option'])}}
                                        {{Form::label('name', 'Enter 4th Option'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('question[option_5]', '', ['class' => 'squareInput', 'placeholder'=>'Enter 5th Option'])}}
                                        {{Form::label('name', 'Enter 5th Option'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-6">
                                        {{Form::text('question[correct_answer]', '', ['class' => 'squareInput', 'placeholder'=>'Enter Correct Answer'])}}
                                        {{Form::label('name', 'Enter Correct Answer'), ['class' => 'active']}}
                                    </div>

                                    <div class="col-lg-12">
                                        {{Form::select('question[category_id]', $difficulty,'0', ['class' => 'squareInput des-select form-control'])}}
                                        {{Form::label('record[category_id]', 'Select Question Category'), ['class' => 'active']}}
                                    </div>

                                </div>
                                <div class="text-right">
                                    <input type="submit" class="btn btn-primary" name="save" value="{{ isset($question) ? 'Update' : 'Add' }}" />
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>