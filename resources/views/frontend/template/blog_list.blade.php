@if(count($blogs) != 0 )
<div class="blog-heading px-4 py-3">
    Disscussion Points (विचार-विमर्श के विषय) -
</div>
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
        <hr class="m-0 p-0">

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
        <div class="description">
            <div class="three-line" style="height: 65px; overflow: hidden; margin: 20px">{!! $blog->blog_short_desc !!}</div>
        </div>
        <hr class="m-0 p-0">
        <div class="row pt-3 pb-3 text-center post-action">
            <div class="col-4">
                @php
                $likecount = App\Model\Bloglike::where('blog_id', $blog->id)->count();
                $commentcount = App\Model\PostComment::where('blog_id', $blog->id)->where('comment_id', null)->count();
                @endphp
                @guest()
                <a href="{{ url('account/login') }}" title="please login account"><i class="fas fa-thumbs-up" id="bloglike" data-url="{{ url('ajex/bloglike') }}" data-blog="{{ $blog->id }}" data-type="{{ $blog->post_type }}" style="cursor: pointer;"></i></a>
                <span class="bloglikevalue" style="margin-right: 10px;">{{ $likecount }}</span>
                @else
                @php
                $likecountstatus = App\Model\Bloglike::where('blog_id', $blog->id)->where('user_id', Auth::user()->id)->count();
                @endphp
                @if($likecountstatus == 1)
                <i class="fas fa-thumbs-up bloglike" id="bloglike" data-url="{{ url('ajex/bloglike') }}" data-blog="{{ $blog->id }}" data-type="{{ $blog->post_type }}" style="cursor: pointer;"></i>
                @else
                <i class="far fa-thumbs-up bloglike" id="bloglike" data-url="{{ url('ajex/bloglike') }}" data-blog="{{ $blog->id }}" data-type="{{ $blog->post_type }}" style="cursor: pointer;"></i>
                @endif
                <span class="bloglikevalue" style="margin-right: 10px;">{{ $likecount }}</span>
                <!-- <a href=""><i class="fas fa-thumbs-up"></i> <span>Like</span></a> -->
                @endguest
            </div>
            <div class="col-4">
                @if($blog->post_type == 'notification')
                <a href="{{ url('notification/'.$blog->notification->slug.'/'.$blog->infotype->slug.'#blogcomment') }}"><i class="fas fa-comments"></i> <span>Q&A (राय)</span> {{ $commentcount }}</a>
                @endif
                @if($blog->post_type == 'blog')
                <a href="{{ url('blog/'.$blog->blog_slug.'#blogcomment') }}"><i class="fas fa-comments"></i> <span>Q&A (राय)</span> {{ $commentcount }}</a>
                @endif
            </div>
            <div class="col-4">
                @if($blog->post_type == 'notification')
                <span class="sharepost" style="cursor: pointer;" data-url="{{ url('ajex/postshare') }}" data-link="{{ url('notification/'.$blog->notification->slug.'/'.$blog->infotype->slug) }}"><i class="fas fa-share"></i> <span>Share</span></span>
                @endif
                @if($blog->post_type == 'blog')
                <span class="sharepost" style="cursor: pointer;" data-url="{{ url('ajex/postshare') }}" data-link="{{ url('blog/'.$blog->blog_slug) }}"><i class="fas fa-share"></i> <span>Share</span></span>
                @endif
            </div>
        </div>
    </div>

</div>
@endforeach
@endif