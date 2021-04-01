@php
    $guardData = Auth::guard()->user();
@endphp
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Product Add</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('shop-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('shop.product.index') }}">Product</a>
                        </li>
                        <li class="breadcrumb-item active">Product Add</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- <div class="card">
                    <div class="body">
                        <div class="header">
                            <h2 class="pt-2"><b>Product Edit</b></h2>
                            <h2 class="header-dropdown m-r--5" style="top:10px;"><a href="{{ url(env('ADMIN_DIR').'/product') }}" class="btn btn-primary" style="padding-top: 8px;">View Product</a></h2>
                        </div>
                        <hr> -->
                        <div class="formCard">
                            <div class="wrapper">
                                <div class="number director-uploads-hidden" style="display: none;">
                                    <div class="row">
                                        <div class="col-lg-2" style="display: none;">
                                            {{Form::text('records[0][id]', '', ['class' => 'app-file7 director_documents val_null squareInput', 'placeholder'=>'Enter id'])}}
                                            {{Form::label('records[qty]', 'Enter id'), ['class' => 'active']}}
                                        </div>
                                        <div class="col-lg-2 size_require">
                                            {{Form::select('records[0][size_id]', $sizeArr,'0', ['class' => 'app-file1 director_documents val_null squareInput des-select form-control'])}}
                                            {{Form::label('records[size_id]', 'Select size'), ['class' => 'active']}}
                                        </div>
                                        <div class="col-lg-2 color_require">
                                            {{Form::select('records[0][color_id]', $colorArr,'0', ['class' => 'app-file2 director_documents val_null squareInput des-select form-control'])}}
                                            {{Form::label('records[color_id]', 'Select color'), ['class' => 'active']}}
                                        </div>
                                        <div class="col-lg-2">
                                            {{Form::text('records[0][qty]', '', ['class' => 'app-file3 director_documents val_null squareInput', 'placeholder'=>'Enter quantity','required'=>'required'])}}
                                            {{Form::label('records[qty]', 'Enter quantity'), ['class' => 'active']}}
                                        </div>
                                        <div class="col-lg-2">
                                            {{Form::select('records[0][unit_id]', $unitArr,'0', ['class' => 'app-file4 director_documents val_null squareInput des-select form-control'])}}
                                            {{Form::label('records[unit_id]', 'Select Unit'), ['class' => 'active']}}
                                        </div>
                                        <div class="col-lg-2">
                                            {{Form::text('records[0][regular_price]', '', ['class' => 'app-file5 director_documents val_null squareInput', 'placeholder'=>'Enter regular price','required'=>'required'])}}
                                            {{Form::label('records[regular_price]', 'Enter regular price'), ['class' => 'active']}}
                                        </div>
                                        <div class="col-lg-2">
                                            {{Form::text('records[0][sale_price]', '', ['class' => 'app-file6 director_documents val_null squareInput', 'placeholder'=>'Enter sale price','required'=>'required'])}}
                                            {{Form::label('records[sale_price]', 'Enter sale price'), ['class' => 'active']}}
                                        </div> 
                                        <div class="removefield remove-btn">REMOVE</div>
                                    
                                    </div>
                                </div>
                                {{ Form::open(['url' => url('shop/products/store',$product->id), 'method'=>'Post','files' => true, 'class' => 'user']) }}
                                
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
								<div class="card">
								    <div class="header">
								        <h2 class="pt-2"><b>Product</b></h2>
								        <h2 class="header-dropdown m-r--5" style="top:10px;"><a href="{{ url('shop/product') }}" class="btn btn-primary" style="padding-top: 8px;">View Product</a></h2>
								    </div>
								    <hr>
								    <div class="body">
								        <div class="row">
								            <div class="col-lg-12">
								                {{Form::text('record[name]', '', ['class' => 'squareInput', 'placeholder'=>'Enter product name','required'=>'required','disabled'=>'true','style'=>'background:antiquewhite; color:black;'])}}
								                {{Form::label('record[name]', 'Enter product name'), ['class' => 'active']}}
								            </div>
								            <div class="col-lg-6">
								                {{Form::text('record[short_name]', '', ['class' => 'squareInput', 'placeholder'=>'Enter product short name','required'=>'required','disabled'=>'true','style'=>'background:antiquewhite; color:black;'])}}
								                {{Form::label('record[short_name]', 'Enter product short name'), ['class' => 'active']}}
								            </div>
								            <div class="col-lg-6">
								                {{ Form::text('record[hsn_code]','', ['class'=>'squareInput', 'placeholder'=>'Enter HSN code','disabled'=>'true','style'=>'background:antiquewhite; color:black;']) }}
								                {{ Form::label('record[hsn_code]', 'Enter HSN code'), ['class' => 'active'] }}
								            </div>
								            <div class="col-lg-6">
								                {{Form::select('record[category_id]', $parentArr,'0', ['class' => 'squareInput des-select form-control','disabled'=>'true','style'=>'background:antiquewhite; color:black;'])}}
								                {{Form::label('record[category_id]', 'Select category'), ['class' => 'active']}}
								            </div>
								            <div class="col-lg-6">
								                {{Form::select('record[brand_id]', $brandArr,'0', ['class' => 'squareInput des-select form-control','disabled'=>'true','style'=>'background:antiquewhite; color:black;'])}}
								                {{Form::label('record[brand_id]', 'Select brand'), ['class' => 'active']}}
								            </div>
								            <div class="col-lg-6">
								                {{Form::select('record[gst_id]', $gstArr,'0', ['class' => 'squareInput des-select form-control','disabled'=>'true','style'=>'background:antiquewhite; color:black;'])}}
								                {{Form::label('record[gst_id]', 'Select GST'), ['class' => 'active']}}
								            </div>
								            <div class="col-lg-6">
								                {{Form::file('image',['class'=>'form-control squareInput','disabled'=>'true','style'=>'background:antiquewhite; color:black;'])}}
								                {{Form::label('image', 'Choose image'), ['class' => 'active']}}
								            </div>
								            <div class="col-lg-6">
								                {{ Form::textarea('record1[description]','', ['class'=>'squareInput des-textarea', 'placeholder'=>'Enter description','disabled'=>'true','style'=>'background:antiquewhite; color:black;']) }}
								                {{ Form::label('record1[description]', 'Enter description'), ['class' => 'active'] }}
								            </div>
								        </div>
								    </div>
								</div>
								<div class="card">
								    <div class="header">
								        <div class="row">
								            <div class="col-lg-3">
								                <h2 class="pt-2"><b>Product Varients</b></h2>
								            </div>
								            <div class="col-lg-6 pt-2">
								                <div class="row">
								                    <div class="col-2">
								                        <input type="checkbox" class="custom-box" id="size_check" checked="checked">
								                        <span>Size</span>
								                    </div>
								                    <div class="col-2">
								                        <input type="checkbox" class="custom-box" id="color_check" checked="checked">
								                        <span>Color</span>
								                    </div>
								                </div>
								            </div>   
								            <div class="col-lg-3">
								                <button type="button" class="btn btn-primary header-dropdown m-r--5" id="add-director" style="top: 0;">Add More</button>
								            </div>
								        </div>
								        <!-- <h2 class="pt-2"><b>Product Varients</b></h2> -->
								        <!-- <h2 class="header-dropdown m-r--5" style="top:10px;"><a id="add-director" class="btn btn-primary" style="padding-top: 8px;">Add More</a></h2> -->
								        <!-- <button type="button" class="btn btn-primary header-dropdown m-r--5" id="add-director">Add More</button> -->
								    </div>
								    <hr>
								    <div class="body">
								        <div class="director-uploads number" id="director-uploads1" data-number="0" data-changed="0">
								            <div class="row">
								                    <div class="col-lg-2 size_require">
								                        {{Form::select('records[0][size_id]', $sizeArr,'0', ['class' => 'app-file1 director_documents squareInput des-select form-control'])}}
								                        {{Form::label('records[size_id]', 'Select size'), ['class' => 'active']}}
								                    </div>
								                    <div class="col-lg-2 color_require">
								                        {{Form::select('records[0][color_id]', $colorArr,'0', ['class' => 'app-file2 director_documents squareInput des-select form-control'])}}
								                        {{Form::label('records[color_id]', 'Select color'), ['class' => 'active']}}
								                    </div>
								                    <div class="col-lg-2">
								                        {{Form::text('records[0][qty]', '', ['class' => 'app-file3 director_documents squareInput', 'placeholder'=>'Enter quantity','required'=>'required'])}}
								                        {{Form::label('records[qty]', 'Enter quantity'), ['class' => 'active']}}
								                    </div>
								                    <div class="col-lg-2">
								                        {{Form::select('records[0][unit_id]', $unitArr,'0', ['class' => 'app-file4 director_documents squareInput des-select form-control'])}}
								                        {{Form::label('records[unit_id]', 'Select Unit'), ['class' => 'active']}}
								                    </div>
								                    <div class="col-lg-2">
								                        {{Form::text('records[0][regular_price]', '', ['class' => 'app-file5 director_documents squareInput', 'placeholder'=>'Enter regular price','required'=>'required'])}}
								                        {{Form::label('records[regular_price]', 'Enter regular price'), ['class' => 'active']}}
								                    </div>
								                    <div class="col-lg-2">
								                        {{Form::text('records[0][sale_price]', '', ['class' => 'app-file5 director_documents squareInput', 'placeholder'=>'Enter sale price','required'=>'required'])}}
								                        {{Form::label('records[sale_price]', 'Enter sale price'), ['class' => 'active']}}
								                    </div>
								                </div>
								        </div>
								    </div>
								</div>
                                <div class="text-right">
                                    <input type="submit"class="btn btn-primary" name="edit_product" value="Add"/>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    <!-- </div>
                </div> -->
            </div>
        </div>
    </div>
</section>