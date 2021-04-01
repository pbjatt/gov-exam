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
        {{Form::text('record[name]', '', ['class' => 'squareInput', 'placeholder'=>'Enter color name','required'=>'required'])}}
        {{Form::label('record[name]', 'Enter color name'), ['class' => 'active']}}
    </div>
    <div class="col-lg-6">
        {{Form::text('record[short_name]', '', ['class' => 'squareInput', 'placeholder'=>'Enter color short name','required'=>'required'])}}
        {{Form::label('record[short_name]', 'Enter color short name'), ['class' => 'active']}}
    </div>
    <!-- <div class="col-lg-6">
        {{Form::select('record[category_id]', $parentArr,'0', ['class' => 'squareInput des-select form-control'])}}
        {{Form::label('record[category_id]', 'Select category'), ['class' => 'active']}}
    </div> -->
    <div class="col-lg-6">
        {{Form::text('record[hex_code]', '', ['class' => 'squareInput', 'placeholder'=>'Enter hex code','required'=>'required'])}}
        {{Form::label('record[hex_code]', 'Enter hex code'), ['class' => 'active']}}
    </div>
</div>
