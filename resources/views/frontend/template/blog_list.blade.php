@if(count($blogs) != 0 )
@foreach($blogs as $key => $blog)
<div class="card project_widget blogpost">
    <div class="body p-0">
        <div class="row p-4">
            <div class="col-10 blog-title">
                <!-- <a href="#">
                                    <img src="http://localhost/gov-exam/extraimage/images.jpg" alt="user image" style="border-radius: 100%;" width="24" height="24" class="d-inline-block" title="pbjatt">
                                </a> -->
                @if($blog->post_type == 'notification')
                <span><a href="{{ url('notification/'.$blog->notification->slug.'/'.$blog->infotype->slug) }}">{{ ucwords($blog->blog_title) }}</a></span>
                @endif
                @if($blog->post_type == 'blog')
                <span><a href="{{ url('blog/'.$blog->blog_slug) }}">{{ ucwords($blog->blog_title) }}</a></span>
                @endif
            </div>
            <!-- <div class="col-2 text-right"><i class="fas fa-ellipsis-v"></i></div> -->
        </div>
        @if($blog->blog_image != '')
        <div class="card-image">
            @if($blog->post_type == 'notification')
            <a href="{{ url('notification/'.$blog->notification->slug.'/'.$blog->infotype->slug) }}">
                <img class="blog-card-image" src="{{ url('images/notificationdata/'.$blog->blog_image) }}" alt="{{ $blog->blog_image }}" width="100%">
            </a>
            @endif
            @if($blog->post_type == 'blog')
            <a href="{{ url('blog/'.$blog->blog_slug) }}">
                <img class="blog-card-image" src="{{ url('storage/blog/'.$blog->blog_image) }}" alt="{{ $blog->blog_image }}" width="100%">
            </a>
            @endif
        </div>
        @endif
        <hr class="m-0 p-0">
        <div class="description">
            <div class="three-line" style="height: 65px; overflow: hidden; margin: 20px">{!! $blog->blog_short_desc !!}</div>
        </div>
    </div>

</div>
@endforeach
@endif
<!-- <div class="blog-pagination">
                    {!! $blogs->links()!!}
                </div> -->