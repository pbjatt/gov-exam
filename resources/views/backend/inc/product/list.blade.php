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
                                <h4 class="page-title">Product List</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                @if($guardData->role_id == '1')
                                <a href="{{ route('admin-home') }}">
                                    <i class="fas fa-home"></i> Home</a>
                                @endif
                                @if($guardData->role_id == '2')
                                <a href="{{ route('shop-home') }}">
                                    <i class="fas fa-home"></i> Home</a>
                                @endif
                            </li>
                            <li class="breadcrumb-item active">Product List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <h2 class="pt-2"><b>Product List</b></h2>
                                </div>
                                <!-- <div class="col-sm-6 col-md-3">
                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                        <label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                                    </div>
                                </div> -->
                                <div class="col-sm-6 col-md-4" style="height: 10px;">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                        @if($guardData->role_id == '1')
                                        {!! Form::open(['url' => route('admin.product.index'), 'method' => 'GET']) !!}
                                        @endif
                                        @if($guardData->role_id == '2')
                                        {!! Form::open(['url' => route('shop.product.index'), 'method' => 'GET']) !!}
                                        @endif
                                            <label style="display: inline-flex;">Search:<input type="search" class="form-control form-control-sm" name="search" placeholder="product name" aria-controls="DataTables_Table_0" style="margin-left: 10px; height: 25px; font-size: 14px;"></label>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    @if($guardData->role_id == '1')
                                    <h2 class="m-r--5 text-right"><a href="{{ route('admin.product.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Product</a></h2>
                                    @endif
                                    @if($guardData->role_id == '2')
                                    <h2 class="m-r--5 text-right"><a href="{{ url('/').'/shop/products/search' }}" class="btn btn-primary" style="padding-top: 8px;">Add Product</a></h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="body" style="padding-top: 0;" id="listing">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Short Name</th>
                                            <th>HSN Code</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Brand</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            <th>Varients</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sn = $lists->firstItem();
                                        @endphp
                                        @foreach($lists as $list)
                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->short_name }}</td>
                                            <td>{{ $list->hsn_code }}</td>
                                            <td>{{ $list->category->name }}</td>
                                            <td class="table-img" style="width: 10%;">
                                                <img src="{{ url('/').'/images/product/'. $list->productdata->image }}" alt="">
                                            </td>
                                            <td>{{ $list->brand->name }}</td>
                                            <td>{{ $list->productdata->description }}</td>
                                            <!-- <td>
                                                <span class="label l-bg-purple shadow-style">In Stock</span>
                                            </td> -->
                                            <td>
                                                <button class="btn tblActnBtn">
                                                    @if($guardData->role_id == '1')
                                                    <a href="{{ route('admin.product.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                                    @endif
                                                    @if($guardData->role_id == '2')
                                                    <a href="{{ route('shop.product.edit',$list->id) }}" style="color: black;"><i class="material-icons">mode_edit</i></a>
                                                    @endif
                                                </button>
                                                @if($guardData->role_id == '1')
                                                {{ Form::open(array('url' => route('admin.product.destroy',$list->id), 'class' => 'btn tblActnBtn')) }}
                                                @endif
                                                @if($guardData->role_id == '2')
                                                {{ Form::open(array('url' => route('shop.product.destroy',$list->id), 'class' => 'btn tblActnBtn')) }}
                                                @endif
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    <button class="btn tblActnBtn">
                                                    <a style="color: black;"><i class="material-icons">delete</i></a>
                                                </button>
                                                {{ Form::close() }}
                                            </td>
                                            <td>
                                                @if($guardData->role_id == '1')
                                                <a href="{{ route('admin.product.show',$list->id) }}"><button class="btn btn-primary">Varients</button></a>
                                                @endif
                                                @if($guardData->role_id == '2')
                                                <a href="{{ route('shop.product.show',$list->id) }}"><button class="btn btn-primary">Varients</button></a>
                                                @endif
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
