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

  <div class="col-lg-8">
    <div class="row">
      <div class="col-lg-6">
        {{Form::select('record[examnotification_id]', $examnotificationArr,'0', ['class' => 'squareInput des-select form-control','required'=>'required'])}}
        {{Form::label('record[examnotification_id]', 'Select Exam Notification'), ['class' => 'active']}}
      </div>
      <div class="col-lg-6">
        {{Form::select('record[info_type_id]', $infotypeArr,'0', ['class' => 'squareInput des-select form-control', 'id' => 'type', 'onchange' => 'cityChangedTrigger()','required'=>'required'])}}
        {{Form::label('record[info_type_id]', 'Select Info Type'), ['class' => 'active']}}
      </div>
      <div class="col-lg-12">
        {{Form::text('record[title]', '', ['class' => 'squareInput', 'placeholder'=>'Enter Title','required'=>'required'])}}
        {{Form::label('record[title]', 'Enter Title'), ['class' => 'active']}}
      </div>
      <div class="col-lg-12">
        {{ Form::textarea('record[short_description]','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter short description']) }}
        {{ Form::label('short_description', 'Enter short description'), ['class' => 'active'] }}
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="row">
      <div class="col-lg-12">
        {{Form::file('image',['class'=>'form-control squareInput'])}}
        {{Form::label('image', 'Choose image'), ['class' => 'active']}}
      </div>
      <div class="col-lg-12">
        {{Form::file('attachment',['class'=>'form-control squareInput'])}}
        {{Form::label('attachment', 'Choose Attachment'), ['class' => 'active']}}
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    {{ Form::textarea('record[description]','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter Exam Notification description']) }}
    {{ Form::label('description', 'Enter Exam Notification description'), ['class' => 'active'] }}
  </div>
</div>

<hr>
<div class="row">
  <div class="col-lg-6">
    {{Form::text('record[seo_title]', '', ['class' => 'squareInput', 'placeholder'=>'Enter seo title'])}}
    {{Form::label('seo_title', 'Enter seo title'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{ Form::text('record[seo_keywords]','', ['class'=>'squareInput', 'placeholder'=>'Enter seo keyword']) }}
    {{ Form::label('seo_keywords', 'Enter seo keyword'), ['class' => 'active'] }}
  </div>

  <div class="col-lg-12">
    {{ Form::textarea('record[seo_description]','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter seo description', 'row' => '4']) }}
    {{ Form::label('seo_description', 'Enter seo description'), ['class' => 'active'] }}
  </div>
</div>