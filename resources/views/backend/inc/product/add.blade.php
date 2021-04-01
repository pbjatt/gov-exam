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
                        @if($guardData->role_id == '1')
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('admin.product.index') }}">Product</a>
                        </li>
                        @endif
                        @if($guardData->role_id == '2')
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('shop-home') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('shop.product.index') }}">Product</a>
                        </li>
                        @endif
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
                            <h2 class="pt-2"><b>Product Add</b></h2>
                            <h2 class="header-dropdown m-r--5" style="top:10px;"><a href="{{ url(env('ADMIN_DIR').'/product') }}" class="btn btn-primary" style="padding-top: 8px;">View Product</a></h2>
                        </div>
                        <hr> -->
                        <div class="formCard">
                            <div class="wrapper">
                                
                                <div class="number director-uploads-hidden" style="display: none;">
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
                                            {{Form::text('records[0][sale_price]', '', ['class' => 'app-file6 director_documents squareInput', 'placeholder'=>'Enter sale price','required'=>'required'])}}
                                            {{Form::label('records[sale_price]', 'Enter sale price'), ['class' => 'active']}}
                                        </div>
                                        <div class="removefield remove-btn">REMOVE</div>
                                    </div>
                                </div>
                                @if($guardData->role_id == '1')
                                {{ Form::open(['url' => route('admin.product.store'), 'method'=>'POST', 'files' => true, 'class' => 'user']) }}
                                @endif
                                @if($guardData->role_id == '2')
                                {{ Form::open(['url' => route('shop.product.store'), 'method'=>'POST', 'files' => true, 'class' => 'user']) }}
                                @endif
                                     @include('backend.inc.product._form')
                                  <div class="text-right">
                                    <input type="submit"class="btn btn-primary" name="save" value="Add"/>
                                  </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>



