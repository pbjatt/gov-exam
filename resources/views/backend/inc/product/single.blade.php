@php
    $guardData = Auth::guard()->user();
@endphp
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Product Detalis</h4>
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
                            <li class="breadcrumb-item active">Product Detalis</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="pt-2"><b>Product Detalis</b></h2>
                            <h2 class="header-dropdown m-r--5">
                                @if($guardData->role_id == '1')
                                <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-primary" style="padding-top: 8px;">Edit Product</a>
                                @endif
                                @if($guardData->role_id == '2')
                                <a href="{{ route('shop.product.edit',$product->id) }}" class="btn btn-primary" style="padding-top: 8px;">Edit Product</a>
                                @endif
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Unit</th>
                                            <th>Regular Price</th>
                                            <th>Sale Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sn = 1;
                                        @endphp
                                        @foreach($lists as $list)
                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $product->name }}</td>
                                            <!-- <td>
                                                <span class="label l-bg-purple shadow-style">In Stock</span>
                                            </td> -->
                                            <td>{{ $list->color->name }}</td>
                                            <td>{{ $list->size->name }}</td>
                                            <td>{{ $list->qty }} {{ $list->unit->name }}</td>
                                            <td>{{ $list->regular_price }} ₹</td>
                                            <td>{{ $list->sale_price }} ₹</td>
                                            <td>
                                                @if($guardData->role_id == '1')
                                                {{ Form::open(array('url' => route('admin.product.destroy',$product->id), 'class' => 'btn tblActnBtn')) }}
                                                @endif
                                                @if($guardData->role_id == '2')
                                                {{ Form::open(array('url' => route('shop.product.destroy',$product->id), 'class' => 'btn tblActnBtn')) }}
                                                @endif
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    <button class="btn tblActnBtn">
                                                    <a style="color: black;"><i class="material-icons">delete</i></a>
                                                </button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
