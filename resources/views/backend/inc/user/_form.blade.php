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
        {{Form::text('record[name]', '', ['class' => 'squareInput', 'placeholder'=>'Enter city name','required'=>'required'])}}
        {{Form::label('record[name]', 'Enter city name'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::text('record[short_name]', '', ['class' => 'squareInput', 'placeholder'=>'Enter city short name','required'=>'required'])}}
        {{Form::label('record[short_name]', 'Enter city short name'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::select('record[state_id]', $stateArr,'0', ['class' => 'squareInput des-select form-control'])}}
        {{Form::label('record[state_id]', 'Select state'), ['class' => 'active']}}
    </div>
</div>
