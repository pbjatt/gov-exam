@extends('frontend.layout.master')
@section('title', $blog->blog_seotitle)
@section('keywords', $blog->blog_seokeyword)
@section('description', $blog->blog_seodesc)
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
                                    <h2>{{ $blog->blog_title }}</h2>
                                </div>
                                <div class="card-image">
                                    <img src="{{ url('storage/blog/'.$blog->blog_image) }}" alt="">
                                </div>
                                <hr class="m-0">
                                <div class="body" style="min-height: 320px;" id="exam-content">
                                    {!! $blog->blog_desc !!}
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
                    <h2>Releted Blogs</h2>
                </div>
                <hr class="m-0">
                <div class="body p-4">
                    @if(count($releted) != 0)
                    @foreach($releted as $key => $blog)
                    @php
                    $sn = $key + 1;
                    @endphp
                    <strong class="mr-2">{{ $sn++ }}.</strong>
                    <strong> <a href="{{ url('blog/'.$blog->blog_slug) }}">{{ $blog->blog_title }}</a></strong>
                    <hr>
                    @endforeach
                    @else
                    <div class="text-center">No Records Found.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@stop