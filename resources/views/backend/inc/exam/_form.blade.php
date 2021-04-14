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
        {{Form::text('record[name]', '', ['class' => 'squareInput', 'placeholder'=>'Enter Exam name','required'=>'required'])}}
        {{Form::label('name', 'Enter Exam name'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::text('record[slug]', '', ['class' => 'squareInput', 'placeholder'=>'Enter slug'])}}
        {{Form::label('slug', 'Enter slug'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::select('record[age]', $ageArr,'0', ['class' => 'squareInput des-select form-control'])}}
        {{Form::label('record[age]', 'Select Age'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::select('record[category_id]', $examcategoryArr,'0', ['class' => 'squareInput des-select form-control'])}}
        {{Form::label('record[category_id]', 'Select Exam Category'), ['class' => 'active']}}
    </div>

    <div class="col-lg-6">
        {{Form::select('record[qualification]', $qualificationArr,'0', ['class' => 'squareInput des-select form-control'])}}
        {{Form::label('record[qualification]', 'Select qualification'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::file('image',['class'=>'form-control squareInput'])}}
        {{Form::label('image', 'Choose image'), ['class' => 'active']}}
    </div>
    <div class="col-lg-12">
        {{ Form::textarea('record[short_description]','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter short description']) }}
        <!-- {{ Form::label('short_description', ''), ['class' => 'active'] }} -->
    </div>
    <div class="col-lg-12">
        {{ Form::textarea('record[description]','', ['class'=>'squareInput des-textarea tinymce', 'placeholder'=>'Enter description']) }}
        <!-- {{ Form::label('description', 'Enter description'), ['class' => 'active'] }} -->
    </div>
</div>
<!-- <hr>
<div class="row">
   <div class="col-lg-12">
        {{Form::text('record[seo_title]', '', ['class' => 'squareInput', 'placeholder'=>'Enter seo title','required'=>'required'])}}
        {{Form::label('seo_title', 'Enter seo title'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{ Form::textarea('record[seo_keywords]','', ['class'=>'squareInput des-textarea', 'placeholder'=>'Enter seo keyword', 'row' => '4']) }}
        {{ Form::label('seo_keywords', 'Enter seo keyword'), ['class' => 'active'] }}
    </div>
    
    <div class="col-lg-6">
        {{ Form::textarea('record[seo_description]','', ['class'=>'squareInput des-textarea', 'placeholder'=>'Enter seo description', 'row' => '4']) }}
        {{ Form::label('seo_description', 'Enter seo description'), ['class' => 'active'] }}
    </div>
</div> -->