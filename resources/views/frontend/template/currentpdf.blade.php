<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Current Affair PDF</title>

    <style>
        table {
            width: 200px;
            height: 200px;
            position: relative;
        }

        table::after {
            background-image: url("{{ public_path('images/logo/'.$setting->logo ) }}");
            opacity: 0.05;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
        }

        table {
            width: 100%;
            display: table;
            border-collapse: collapse;
            border-spacing: 0;
        }

        thead,
        tr {
            border-bottom: 2px solid rgba(0, 0, 0, 0.12);
            padding-bottom: 20px !important;
        }


        td,
        th {
            display: table-cell;
            text-align: left;
            vertical-align: middle;
            border-radius: 2px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 400;
            line-height: 1.3;
        }

        h3 {
            font-size: 27px;
            margin: 0px !important;
        }

        h4 {
            font-size: 14px;
            line-height: 110%;
            margin: 1.52rem 0 .912rem 0;
        }

        h5 {
            font-size: 16px;
            line-height: 110%;
            margin: 1.0933333333rem 0 .656rem 0;
        }

        span {
            font-size: 14px;
        }

        .ibox-title {
            background-color: #fff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 3px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 0px 15px 7px;
            min-height: 48px;
        }

        .ibox-content {
            background-color: #fff;
            color: inherit;
            padding: 15px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }


        .ibox-content .shoping-cart-table {
            margin-bottom: 20px;
        }

        .ibox-content .shoping-cart-table tr {
            padding-bottom: 20px !important;
            border-bottom: 2px solid rgba(0, 0, 0, 0.12) !important;
        }

        .ibox-content .shoping-cart-table tr td {
            text-align: right;
        }

        .ibox-content .shoping-cart-table tr td.desc {
            text-align: left;
        }

        .ibox-content .shoping-cart-table tr td:first-child {
            text-align: left;
            width: 180px;
        }

        .ibox-content .shoping-cart-table tr td:last-child {
            width: 50px;
            text-align: center;
        }

        .ibox-content .shoping-cart-table .text-price {
            text-decoration: line-through;
        }

        .table-bordered {
            border-top: 1px solid #eee
        }

        .table-bordered tbody tr td,
        .table-bordered tbody tr th {
            padding: 12px 10px 12px 5px;
            border-bottom: 1px solid #eee;
        }

        .table-bordered thead tr th {
            padding: 12px 10px 12px 5px;
            border-bottom: 1px solid #eee;
            background-color: #ebf0f7
        }
    </style>

    <!-- Custom Css -->

</head>

<body>

    <div>
        <div style="display: flex;">
            <div >
                <img src="{{ public_path('images/logo/'.$setting->logo ) }}" width="60">
            </div>
            <div style="padding-left: 70px; ">
                <h1>{{$setting->title}}</h1>
            </div>
        </div>
        <div class="ibox-title">
            <span style="float: right; margin-top: 14px;">(<strong>{{ $currentaffair->count() }}</strong>) records</span>
            <h5>Current Affair List</h5>
        </div>
        <div class="ibox-content">
            <div>
                <table class="shoping-cart-table table-bordered">
                    <thead>
                        <tr style="margin-bottom: 14px; border-bottom: 2px solid #000;">
                            <th>Image</th>
                            <th>Title & Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($currentaffair) != 0 )
                        @foreach($currentaffair as $key => $ca)
                        <tr style="margin-bottom: 200px; border-bottom: 2px solid #000;">
                            <td>
                                @if($ca->image)
                                <div>
                                    <img src="{{ public_path('storage/currentaffair/' . $ca->image) }}" width="160">
                                </div>
                                @else
                                <div>
                                    <img src="{{ public_path('images/preview.png') }}" width="160">
                                </div>
                                @endif
                            </td>
                            <td style="text-align: left;">
                                <h3 style="color: #1ab394;">
                                    {{ $ca->title }}
                                </h3>
                                <h5>
                                    <strong>Except Text</strong>
                                </h5>
                                <span>{!! $ca->except_text !!}</span>
                                <br>
                                <h5>
                                    <strong>Description</strong>
                                </h5>
                                <span>{!! $ca->description !!}</span>
                            </td>

                            <td>
                                <h5>
                                    {{$ca->year}}
                                </h5>
                                <h5>
                                    {{$ca->month}}
                                </h5>
                                <h4>
                                    {{$ca->day}}
                                </h4>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>