@php
$setting = App\Model\Setting::first();
@endphp
@extends('frontend.layout.master')
@section('title', $currentaffair->seo_title ?? $currentaffair->title)
@section('keywords', $currentaffair->keywords)
@section('description', $currentaffair->description)
@section('image', $currentaffair->image ? url('storage/currentaffair/'.$currentaffair->image) : url('/public/images/logo/'.$setting->logo))
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-xs-12 col-md-8" id="listdetail">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card project_widget">
                                <div class="header p-4">
                                    <h2>{{ $currentaffair->title }}</h2>
                                </div>
                                <div class="card-image">
                                    <img src="{{ url('storage/currentaffair/'.$currentaffair->image) }}" alt="{{ $currentaffair->title }}">
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
        <div class="col-lg-4 col-md-4" id="listside">
            @include('frontend.template.currentfilter')
            <div class="card project_widget list_notify">
                <div class="header p-4">
                    <h2>Releted Current Affair</h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    @if(count($releted) != 0)
                    @foreach($releted as $key => $currentaffair)
                    @php
                    $sn = $key + 1;
                    @endphp
                    <div class="row">
                        <div class="col-2 pr-0">
                            <strong class="mr-2">{{ $sn++ }}.</strong>
                        </div>
                        <div class="col-10 p-0">
                            <strong> <a href="{{ url('currentaffair/detail/'.$currentaffair->slug) }}">{{ $currentaffair->title }}</a></strong>
                        </div>
                        <hr>

                    </div>
                    <hr>
                    @endforeach
                    @else
                        <div class="text-center p-4">No Records Found.</div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</section>

@stop