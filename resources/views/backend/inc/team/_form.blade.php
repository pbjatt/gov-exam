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
        {{Form::text('record[name]', '', ['class' => 'squareInput', 'placeholder'=>'Enter team name','required'=>'required'])}}
        {{Form::label('record[name]', 'Enter team name'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::text('record[email]', '', ['class' => 'squareInput', 'placeholder'=>'Enter email','required'=>'required'])}}
        {{Form::label('record[email]', 'Enter email'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::text('record[password1]', '', ['class' => 'squareInput', 'placeholder'=>'Enter password'])}}
        {{Form::label('record[password1]', 'Enter password'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::select('record1[role_id]', $roleArr,'0', ['class' => 'squareInput des-select form-control', 'required'=>'required'])}}
        {{Form::label('record1[role_id]', 'Select role'), ['class' => 'active']}}
    </div>
</div>
