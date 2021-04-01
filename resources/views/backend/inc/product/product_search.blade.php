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
                                <div class="card">
                                    <div class="header">
                                        <h2 class="pt-2"><b>Product</b></h2>
                                        <h2 class="header-dropdown m-r--5" style="top:10px;"><a href="{{ route('shop.product.create') }}" class="btn btn-primary" style="padding-top: 8px;">New Product</a></h2>
                                    </div>
                                    <hr>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="text" class="squareInput hsdafj" placeholder="Enter product name" required="required" autocomplete="off" data_url="{{ url('shop/ajax/search') }}">
                                                {{Form::label('record[name]', 'Enter product name'), ['class' => 'active']}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list_data">
                                    
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>