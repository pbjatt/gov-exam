@php
$setting = App\Model\Setting::first();
@endphp
@extends('frontend.layout.master')
@section('title', $setting->ca_seo_title)
@section('keywords', $setting->ca_seo_keywords)
@section('description', $setting->ca_seo_description)
@section('image', url('/public/images/logo/'.$setting->logo))
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-xs-12 col-md-8" id="listdetail">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12" id="ca_list">
                            @include('frontend.template.currentaffair', compact('currentaffair'))
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4" id="listside">
            @include('frontend.template.currentfilter')
            <div class="card project_widget list_notify">
                <div class="header p-4">
                    <h2>Notification</h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    @php
                    $sn = 1
                    @endphp
                    @foreach($notification as $key => $exam)
                    <strong class="mr-2">{{ $sn++ }}.</strong>
                    <strong> <a href="{{ url('notification/'.$exam->slug) }}">{{ $exam->title }}</a></strong>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
</section>

@stop