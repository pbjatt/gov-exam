<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Current Affair {{ $setting->title }}</title>

    <style>
        body {
            font-family: "poppins";
        }

        @page {
            margin: 90px 25px 70px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            text-align: left;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            text-align: center;
            line-height: 35px;
        }


        main {
            background-image: url("{{ public_path('images/govtpdflogo.png' ) }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            z-index: -1;
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

        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a {
            font-weight: inherit;
        }

        h1 {
            font-size: 4.2rem;
            line-height: 110%;
            margin: 2.8rem 0 1.68rem 0;
        }

        h2 {
            font-size: 3.56rem;
            line-height: 110%;
            margin: 2.3733333333rem 0 1.424rem 0;
        }

        h3 {
            font-size: 2.92rem;
            line-height: 110%;
            margin: 1.9466666667rem 0 1.168rem 0;
        }

        h4 {
            font-size: 2.28rem;
            line-height: 110%;
            margin: 1.52rem 0 .912rem 0;
        }

        h5 {
            font-size: 1.64rem;
            line-height: 110%;
            margin: 1.0933333333rem 0 .656rem 0;
        }

        h6 {
            font-size: 1.15rem;
            line-height: 110%;
            margin: .7666666667rem 0 .46rem 0;
        }

        span {
            font-size: 14px;
        }

        .mail-heading {
            border-color: #e7eaec;
            border-style: solid solid none;
            border-width: 1px 0 0;
            margin-bottom: 0;
            padding: 0px 15px 7px;
            min-height: 48px;
        }

        .inbox-body {
            padding: 20px;
        }

        .media {
            margin-bottom: 25px;
            margin-top: 15px;
        }

        .media .media-left {
            padding-right: 10px;
        }

        .media .media-body {
            color: #777;
            font-size: 13px;
        }

        .media .media-body .media-heading {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        section.content {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
        }

        section.content {
            float: left;
            width: 100%;
        }
    </style>
</head>

<body class="light">

    <section class="content">
        <header>
            <div style="width: 50%;    float: left;    height: 50px;">
                <img src="{{ public_path('images/logo/'.$setting->logo ) }}" width="60" style="float: right;    margin-right: 25px;">
            </div>
            <div style="width: 50%;    float: right;    height: 50px;">
                <h4 style="margin: 0;    padding-top: 9px;">{{$setting->title}}</h4>
            </div>
        </header>
        <footer>
            Copyright &copy; under {{ $setting->title }} @php echo date("Y"); @endphp
        </footer>
        <main class="mail_listing">
            <div class="inbox-body">
                <div class="mail-heading">
                    <span style="float: right; margin-top: 20px;">(<strong>{{ $currentaffair->count() }}</strong>) records</span>
                    <h5>Current Affair List</h5>
                </div>
                @if(count($currentaffair) != 0 )
                @foreach($currentaffair as $key => $ca)
                <div class="view-mail" style="border-bottom: 2px solid #333;">
                    @if($ca->image)
                    <div style="margin-top: 50px; text-align: center;">
                        <img src="{{ public_path('storage/currentaffair/' . $ca->image) }}" alt="">
                    </div>
                    @else
                    @endif
                    <div class="media">
                        <div class="media-body">
                            <h4 class="text-primary"> {{ $ca->title }}</h4>
                            <span class="date pull-right" style="float: right; margin-top: -52px; font-size: 20px;">{{$ca->day}}/{{$ca->month}}/{{$ca->year}}</span>
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        {!! $ca->description !!}
                    </div>
                </div>

                @endforeach
                @endif
            </div>
        </main>
    </section>
</body>

</html>