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
    {{Form::select('record[examnotification_id]', $examnotificationArr,'0', ['class' => 'squareInput des-select form-control'])}}
    {{Form::label('record[examnotification_id]', 'Select Exam Notification'), ['class' => 'active']}}
  </div>
  <div class="col-lg-6">
    {{Form::select('record[info_type_id]', $infotypeArr,'0', ['class' => 'squareInput des-select form-control', 'id' => 'type', 'onchange' => 'cityChangedTrigger()'])}}
    {{Form::label('record[info_type_id]', 'Select Info Type'), ['class' => 'active']}}
  </div>

  <div class="col-lg-8">
    <div class="row">
      <div class="col-lg-12">
        {{ Form::textarea('record[description]','', ['class'=>'squareInput des-textarea tinymce1', 'placeholder'=>'Enter Exam Notification description', 'id' => 'abctinymce1']) }}
        {{ Form::label('description', 'Enter Exam Notification description'), ['class' => 'active'] }}
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