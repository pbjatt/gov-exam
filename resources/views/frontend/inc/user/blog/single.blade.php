<section class="content">
    <div class="container-fluid">
        @include('frontend.template.user.flash-message')
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">{{ $title }}</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('user.dashboard') }}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="{{ route('user.blog.index') }}">Blog</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Your content goes here  -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="m-b-20">
                        <div class="contact-grid">
                            <div class="profile-header bg-dark">
                                <div class="user-name" style="padding-top: 25px;">{{ $blog->blog_title }}</div>
                                <!-- <div class="name-center">Software Engineer</div> -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ url('/').'/storage/blog/'.$blog->blog_image }}" class="" alt="">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card project_widget">
                                    <div class="header">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <h2>Details</h2>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                                                <h2><a href="{{ route('user.blog.edit',$blog->id) }}" style="color: #5b626b;"><i class="material-icons" style="font-size: 18px;">mode_edit</i> Edit</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body" style="min-height: 320px;">
                                        <div class="row">
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Category</strong>
                                                <br>
                                                <p class="text-muted">{{ $blog->category->title }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Attachment</strong>
                                                <br>
                                                <p class="text-muted"> <a href="{{ url('/').'/blog/files/'.$blog->blog_attachment }}" target="_blank">Open Attachment</a></p>
                                            </div>
                                        </div>
                                        <p class="m-t-30">
                                            <strong>Description</strong><br>
                                            {!! $blog->blog_desc !!}
                                        </p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>