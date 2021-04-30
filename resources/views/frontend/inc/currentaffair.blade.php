@extends('frontend.layout.master')
@section('title', $setting->ca_seo_title)
@section('keywords', $setting->ca_seo_keywords)
@section('description', $setting->ca_seo_description)
@section('contant')

<section class="container" style="margin-top: 80px;">
    <div class="row clearfix">
        <div class="col-lg-8 col-xs-12 col-md-8">
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
        <div class="col-lg-4 col-md-4">
            <div class="card project_widget">
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
            @include('frontend.template.currentfilter')
        </div>
</section>

@stop