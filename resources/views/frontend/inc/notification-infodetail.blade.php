@php
$setting = App\Model\Setting::first();
@endphp
@extends('frontend.layout.master')
@section('title', $lists->seo_title ?? ucwords($lists->infodata->title))
@section('keywords', $lists->seo_keywords)
@section('description', $lists->seo_description)
@section('image', $lists->infodata->image ? url('images/notificationdata/'.$lists->infodata->image) : url('/public/images/logo/'.$setting->logo))
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
                                    <h2>{{ ucwords($lists->infodata->title) }}</h2>
                                </div>
                                <div class="card-image">
                                    @if($lists->infodata->image != '')
                                    <img src="{{ url('images/notificationdata/'.$lists->infodata->image) }}" alt="{{ ucwords($lists->infodata->title) }}">
                                    @endif
                                </div>
                                <hr class="m-0">
                                <div class="body" style="min-height: 320px;" id="exam-content">
                                    {!! $lists->infodata->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="blogcomment">
                @include('frontend.template.postcomment', compact('comments', 'blog'))
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card project_widget">
                <div class="header p-4">
                    <h2>Releted Details</h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    @foreach($releted as $key => $link)
                    @php
                    $sn = $key + 1;
                    @endphp
                    <strong class="mr-2">{{ $sn++ }}.</strong>
                    <strong> <a href="{{ url('notification/'.$slug.'/'.$link->infotype->slug) }}">{{ ucwords($link->title) }}</a></strong>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@stop