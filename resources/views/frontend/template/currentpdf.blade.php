<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Current Affair PDF</title>

    <style>
        table,
        th,
        td {
            border: 0
        }

        table {
            width: 100%;
            display: table;
            border-collapse: collapse;
            border-spacing: 0
        }

        tr {
            border-bottom: 1px solid rgba(0, 0, 0, 0.12)
        }

        td,
        th {
            display: table-cell;
            text-align: left;
            vertical-align: middle;
            border-radius: 2px
        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 400;
            line-height: 1.3
        }

        h3 {
            font-size: 27px;
        }

        h4 {
            font-size: 14px;
            line-height: 110%;
            margin: 1.52rem 0 .912rem 0
        }

        h5 {
            font-size: 16px;
            line-height: 110%;
            margin: 1.0933333333rem 0 .656rem 0
        }


        .ibox-title {
            background-color: #fff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 3px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 14px 15px 7px;
            min-height: 48px
        }

        .ibox-content {
            background-color: #fff;
            color: inherit;
            padding: 15px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0
        }


        table.shoping-cart-table {
            margin-bottom: 0
        }

        table.shoping-cart-table tr {
            border: 0
        }

        table.shoping-cart-table tr td {
            border: 0;
            text-align: right
        }

        table.shoping-cart-table tr td.desc {
            text-align: left
        }

        table.shoping-cart-table tr td:first-child {
            text-align: left
        }

        table.shoping-cart-table tr td:last-child {
            width: 80px
        }

        table.shoping-cart-table .text-price {
            text-decoration: line-through
        }
    </style>

    <!-- Custom Css -->

</head>

<body>

    <div>
        <div class="ibox-title">
            <span style="float: right; margin-top: 14px;">(<strong>3</strong>) items</span>
            <h5>Current Affair List</h5>
        </div>
        <div class="ibox-content">
            <div>
                <table class="shoping-cart-table">
                    <tbody>

                        <tr>
                            <td style="width: 20%;">
                                <div>
                                    <img src="{{ url('storage/currentaffair/1618481026lorem-ipsum.jpg') }}" width="100">
                                </div>
                            </td>
                            <td style="text-align: left;">
                                <h3 style="color: #1ab394;">
                                        ca->title
                                </h3>

                                ca->description
                            </td>

                            <td>
                                <h5>
                                    ca->year
                                </h5>
                                <h5>
                                    ca->month
                                </h5>
                                <h4>
                                    ca->day
                                </h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>