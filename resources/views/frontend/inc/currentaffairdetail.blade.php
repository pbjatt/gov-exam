@extends('frontend.layout.master')
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card project_widget">
                                <div class="header p-4">
                                    <h2>{{ $currentaffair->title }}</h2>
                                </div>
                                <div class="card-image">
                                    <img src="{{ url('storage/currentaffair/'.$currentaffair->image) }}" alt="">
                                </div>
                                <hr class="m-0">
                                <div class="body" id="exam-content">
                                    {!! $currentaffair->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card project_widget">
                <div class="header p-4">
                    <h2>Releted Current Affair</h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    <div class="row">
                        @if(count($releted) != 0)
                        @foreach($releted as $key => $currentaffair)
                        @php
                        $sn = $key + 1;
                        @endphp
                        <div class="col-1 pr-0">
                            <strong class="mr-2">{{ $sn++ }}.</strong>
                        </div>
                        <div class="col-11 pl-2">
                            <strong> <a href="{{ url('currentaffair/detail/'.$currentaffair->slug) }}">{{ $currentaffair->title }}</a></strong>
                        </div>
                        <hr>
                        @endforeach
                        @else
                        <div class="text-center p-4">No Records Found.</div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="card project_widget">
                <div class="header p-4">
                    <h2>Current Affair Filter</h2>
                </div>
                <hr class="m-0">
                <div class="formCard">
                    <div class="wrapper">
                        <div class="body p-4">
                            {{ Form::open(['url' => route('currentaffair'), 'method'=>'GET', 'files' => true, 'class' => 'user']) }}
                            <div class="row pr-4">
                                <div class="col-lg-12">
                                    {{Form::date('date', now(), ['class' => 'squareInput'])}}
                                    {{Form::label('date', 'Select Date'), ['class' => 'active']}}
                                </div>

                                <div class="col-lg-12">
                                    {{Form::select('category_id', $currentaffaircategoryArr,'', ['class' => 'squareInput des-select form-control'])}}
                                    {{Form::label('category_id', 'Select Category'), ['class' => 'active']}}
                                </div>
                            </div>
                            <div class="text-right">
                                <input type="submit" class="btn btn-primary" value="Apply Filter" />
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

@stop