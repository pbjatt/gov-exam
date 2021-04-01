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
                                <h4 class="page-title">Order Detalis</h4>
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
                            <li class="breadcrumb-item active">Order Detalis</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="pt-2"><b>Order Detalis</b></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            @if($guardData->role_id == '1')
                                            <th>Shop Name</th>
                                            @endif
                                            <th>Unit</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $menus = $lists->ordermenu;
                                        @endphp
                                        @foreach($menus as $sn => $list)
                                        <tr>
                                            <td>{{ $sn+1 }}</td>
                                            <td>{{ $list->product->name }}</td>
                                            @if($guardData->role_id == '1')
                                            <td>{{ $list->shop->name }}</td>
                                            @endif
                                            <td>{{ $list->productvarient->color->name }}</td>
                                            <td>{{ $list->productvarient->size->name }}</td>
                                            <td>{{ $list->productvarient->unit->name }}</td>
                                            <td>{{ $list->qty }}</td>
                                            <td>{{ $list->price }} ₹</td>
                                            @if($guardData->role_id == '1')
                                            <td>{{ $list->status }}</td>
                                            @endif
                                            @if($guardData->role_id == '2')
                                            <td>
                                                @php
                                                    $statusArr = [
                                                      "inqueue" => "inqueue",
                                                      "accepted" => "accepted",
                                                      "preparing" => "preparing",
                                                      "on the way" => "on the way",
                                                      "delivered" => "delivered",
                                                      "canceled" => "canceled",
                                                    ];
                                                @endphp
                                                {{ Form::select('status', $statusArr, $list->status, ['id' => 'statuschange','dataid' => $list->id, 'dataurl' => url('shop/order/status'),'class' => 'squareInput des-select form-control','style'=> 'color:black; min-width: 118px;']) }}
                                            </td>
                                            @endif
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
