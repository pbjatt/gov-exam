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
