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
    {{Form::text('title', '', ['class' => 'squareInput', 'placeholder'=>'Enter site name','required'=>'required'])}}
    {{Form::label('title', 'Enter site name'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::text('tagline', '', ['class' => 'squareInput', 'placeholder'=>'Enter tagline','required'=>'required'])}}
    {{Form::label('tagline', 'Enter tagline'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::text('mobile', '', ['class' => 'squareInput', 'placeholder'=>'Enter mobile number','required'=>'required'])}}
    {{Form::label('mobile', 'Enter mobile number'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::text('email', '', ['class' => 'squareInput', 'placeholder'=>'Enter email','required'=>'required'])}}
    {{Form::label('email', 'Enter email'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::file('logo',['class'=>'form-control squareInput'])}}
    {{Form::label('logo', 'Choose logo'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::file('favicon',['class'=>'form-control squareInput'])}}
    {{Form::label('favicon', 'Choose favicon'), ['class' => 'active']}}
  </div>
</div>

<hr>
<div class="row">
  <div class="col-lg-6">
    {{Form::text('home_seo_title', '', ['class' => 'squareInput', 'placeholder'=>'Enter home seo title'])}}
    {{Form::label('seo_title', 'Enter home seo title'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{ Form::textarea('home_seo_keywords','', ['class'=>'squareInput', 'placeholder'=>'Enter home seo keyword']) }}
    {{ Form::label('seo_keywords', 'Enter home seo keyword'), ['class' => 'active'] }}
  </div>

  <div class="col-lg-12">
    {{ Form::textarea('home_seo_description','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter home seo description', 'row' => '4']) }}
    {{ Form::label('seo_description', 'Enter home seo description'), ['class' => 'active'] }}
  </div>
</div>

<hr>
<div class="row">
  <div class="col-lg-6">
    {{Form::text('exam_seo_title', '', ['class' => 'squareInput', 'placeholder'=>'Enter exam seo title'])}}
    {{Form::label('seo_title', 'Enter exam seo title'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{ Form::textarea('exam_seo_keywords','', ['class'=>'squareInput', 'placeholder'=>'Enter exam seo keyword']) }}
    {{ Form::label('seo_keywords', 'Enter exam seo keyword'), ['class' => 'active'] }}
  </div>

  <div class="col-lg-12">
    {{ Form::textarea('exam_seo_description','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter exam seo description', 'row' => '4']) }}
    {{ Form::label('seo_description', 'Enter exam seo description'), ['class' => 'active'] }}
  </div>
</div>

<hr>
<div class="row">
  <div class="col-lg-6">
    {{Form::text('ca_seo_title', '', ['class' => 'squareInput', 'placeholder'=>'Enter current affair seo title'])}}
    {{Form::label('seo_title', 'Enter current affair seo title'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{ Form::textarea('ca_seo_keywords','', ['class'=>'squareInput', 'placeholder'=>'Enter current affair seo keyword']) }}
    {{ Form::label('seo_keywords', 'Enter current affair seo keyword'), ['class' => 'active'] }}
  </div>

  <div class="col-lg-12">
    {{ Form::textarea('ca_seo_description','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter current affair seo description', 'row' => '4']) }}
    {{ Form::label('seo_description', 'Enter current affair seo description'), ['class' => 'active'] }}
  </div>
</div>

<hr>
<div class="row">
  <div class="col-lg-6">
    {{Form::text('notification_seo_title', '', ['class' => 'squareInput', 'placeholder'=>'Enter notification seo title'])}}
    {{Form::label('seo_title', 'Enter notification seo title'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{ Form::textarea('notification_seo_keywords','', ['class'=>'squareInput', 'placeholder'=>'Enter notification seo keyword']) }}
    {{ Form::label('seo_keywords', 'Enter notification seo keyword'), ['class' => 'active'] }}
  </div>

  <div class="col-lg-12">
    {{ Form::textarea('notification_seo_description','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter notification seo description', 'row' => '4']) }}
    {{ Form::label('seo_description', 'Enter notification seo description'), ['class' => 'active'] }}
  </div>
</div>