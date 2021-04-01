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
                                <h4 class="page-title">Order List</h4>
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
                            <li class="breadcrumb-item active">Order List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="pt-2"><b>Order List</b></h2>
                            <!-- <h2 class="header-dropdown m-r--5"><a href="{{ route('shop.team.create') }}" class="btn btn-primary" style="padding-top: 8px;">Add Order</a></h2> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Billing Address</th>
                                            <th>Shipping Address</th>
                                            <th>Payment type</th>
                                            <th>Payment status</th>
                                            <th>Total Amount</th>
                                            <th>Notes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sn = $lists->firstItem();
                                        @endphp
                                        @foreach($lists as $list)
                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $list->user->name }}</td>
                                            <td>
                                                {{ $list->orderaddress->billing_house_no }}, {{ $list->orderaddress->billing_landmark }}, {{ $list->orderaddress->billing_address }}
                                            </td>
                                            <td>
                                                @if($list->orderaddress->shippinging_address != '')
                                                {{ $list->orderaddress->shippinging_house_no }}, {{ $list->orderaddress->shippinging_landmark }}, {{ $list->orderaddress->shippinging_address }}
                                                @else
                                                null
                                                @endif
                                            </td>
                                            <td>{{ $list->payment_type }}</td>
                                            <td>{{ $list->payment_status }}</td>
                                            <td>{{ $list->total_amount }}</td>
                                            <td>
                                                @if($list->notes != '')
                                                    {{ $list->notes }}
                                                @else
                                                    null
                                                @endif
                                            </td>
                                            @if($guardData->role_id == 1)
                                            <td><button class="btn"><a href="{{ route('admin.order.show',$list->id) }}" style="color: black;"><b>Details</b></a></button></td>
                                            @endif
                                            @if($guardData->role_id == 2)
                                            <td><button class="btn"><a href="{{ route('shop.order.show',$list->id) }}" style="color: black;"><b>Details</b></a></button></td>
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
