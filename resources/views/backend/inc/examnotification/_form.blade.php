@if($message = Session::get('error'))
<div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">x</button>
  {{$message}}
</div>
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
  <div class="col-lg-6">
    {{Form::text('record[title]', '', ['class' => 'squareInput', 'placeholder'=>'Enter Title','required'=>'required'])}}
    {{Form::label('title', 'Enter Title'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::text('record[slug]', '', ['class' => 'squareInput', 'placeholder'=>'Enter slug'])}}
    {{Form::label('slug', 'Enter slug'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::select('record[exam_id]', $examArr,'0', ['class' => 'squareInput des-select form-control'])}}
    {{Form::label('record[exam_id]', 'Select Exam'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::text('record[url]', '', ['class' => 'squareInput', 'placeholder'=>'Enter Url' ])}}
    {{Form::label('url', 'Enter Url'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::file('image',['class'=>'form-control squareInput'])}}
    {{Form::label('image', 'Choose image'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::text('record[vacancy_date]', '', ['class' => 'squareInput datepicker', 'placeholder'=>'Enter Vacancy Date', 'autocomplete' => 'off' ])}}
    {{Form::label('vacancy_date', 'Enter Vacancy Date'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::text('record[form_start_date]', '', ['class' => 'squareInput datepicker', 'placeholder'=>'Enter Form Start Date', 'autocomplete' => 'off' ])}}
    {{Form::label('form_start_date', 'Enter Form Start Date'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::text('record[form_end_date]', '', ['class' => 'squareInput datepicker', 'placeholder'=>'Enter Form Last Date', 'autocomplete' => 'off' ])}}
    {{Form::label('form_end_date', 'Enter Form Last Date'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::text('record[exam_date]', '', ['class' => 'squareInput datepicker', 'placeholder'=>'Enter Exam Date', 'autocomplete' => 'off' ])}}
    {{Form::label('exam_date', 'Enter Exam Date'), ['class' => 'active']}}
  </div>
  <div class="col-lg-12">
    {{ Form::textarea('record[description]','', ['class'=>'squareInput des-textarea tinymce1', 'placeholder'=>'Enter Exam Notification description', 'id' => 'abctinymce1']) }}
    {{ Form::label('description', 'Enter Exam Notification description'), ['class' => 'active'] }}
  </div>
</div>