<div class="card project_widget p-4">
    @if(count($comments) != 0)
    @foreach($comments as $key => $comment)
    <div class="post_comment mb-3">
        <div>
            <strong><img src="{{ url('extraimage/images.jpg') }}" width="24" height="24" alt="User">
                {{ $comment->user->name }}</strong>
            <span class="float-right">{{ date_format($comment->created_at,"d M, Y h:i:s A") }}</span>
        </div>
        <div class="mt-2">
            {{ $comment->message }}
        </div>
        <div class="reply ml-2 mt-3">
            <div class="pl-5" style="border-left: 1px dashed;">
                @foreach($comment->replay_comments as $reply)
                <div class="row">
                    <div class="col-6"> 
                        <strong><img src="{{ url('extraimage/images.jpg') }}" width="24" height="24" alt="User">
                        {{ $reply->user->name }}</strong>
                    </div>
                    <div class="col-6"> 
                        <span class="float-right">{{ date_format($reply->created_at,"d M, Y h:i:s A") }}</span>
                    </div>
                </div>
                <div class="mt-2">
                    {{ $reply->message }}
                </div>
                <hr class="">
                @endforeach
            </div>
            <!-- <div class="comment-reply text-right">
                <i class="fas fa-reply fload-right"></i> Reply
            </div> -->
            <div class="row mt-4 w-100 reply-comment">
                <div class="col-10">
                    <input class="blogmessage" name="blogmessage" class="squareInput" required placeholder="reply to {{ $comment->user->name }}" type="text" value="" style="border: 1px solid; border-radius: 16px; border-color: #000; padding: 8px 8px; height: auto; font-size: 12px;">
                </div>
                <div class="col-2 comment-button">
                    @if(Auth::user())
                    <div class="addblogcomment comment-btn" data-url="{{ url('ajex/blogcomment') }}" data-type="{{ $blog->post_type }}" data-comment="{{ $comment->id }}" data-blog="{{ $blog->id }}"><i class="fas fa-reply p-0"></i></div>
                    @endif
                    @if(!Auth::user())
                    <a href="{{ url('account/login') }}">
                        <div class="comment-btn" data-url="{{ url('ajex/blogcomment') }}" data-blog="{{ $blog->id }}"><i class="fas fa-reply p-0"></i></div>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr class="">
    @endforeach
    @endif
    @if(count($comments) == 0)
    <div>No Comments found.</div>
    @endif

    <div class="row mt-4 w-100">
        <div class="col-10">
            <input class="blogmessage" name="blogmessage"  required placeholder="comment" type="text" value="" style="border: 1px solid; border-radius: 16px; border-color: #000; padding: 8px 8px; height: auto; font-size: 12px;">
        </div>
        <div class="col-2 comment-button">
            @if(Auth::user())
            <div class="addblogcomment comment-btn" data-comment="" data-url="{{ url('ajex/blogcomment') }}" data-type="{{ $blog->post_type }}" data-blog="{{ $blog->id }}"><i class="fas fa-paper-plane p-0"></i></div>
            @endif
            @if(!Auth::user())
            <a href="{{ url('account/login') }}">
                <div class="comment-btn" data-url="{{ url('ajex/blogcomment') }}" data-blog="{{ $blog->id }}"><i class="fas fa-paper-plane p-0"></i></div>
            </a>
            @endif
        </div>
    </div>
</div>