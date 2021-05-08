<div class="card project_widget p-4">
    <div class="my-4 d-flex justify-content-between replymsg">
        <div class="w-100 mr-4">
            <input class="blogmessage" name="blogmessage" required placeholder="Write Your Comment" type="text" value="" style="border: 1px solid; border-radius: 16px; border-color: #00000078; padding: 8px 8px; height: auto; font-size: 12px;">
        </div>
        <div class="comment-button">
            @if(Auth::user())
            <div class="addblogcomment comment-btn" data-comment="" data-url="{{ url('ajex/blogcomment') }}" data-type="{{ $blog->post_type }}" data-blog="{{ $blog->id }}"><i class="fas fa-paper-plane p-0 icon-color"></i></div>
            @endif
            @if(!Auth::user())
            <a href="{{ url('account/login') }}">
                <div class="comment-btn" data-url="{{ url('ajex/blogcomment') }}" data-blog="{{ $blog->id }}"><i class="fas fa-paper-plane p-0 icon-color"></i></div>
            </a>
            @endif
        </div>
    </div>
    <hr>
    @if(count($comments) != 0)
    @foreach($comments as $key => $comment)

    <div class="post_comment mb-3">
        <div class="media">
            <img class="mr-3" src="{{ url('extraimage/images.jpg') }}" width="36" height="36" alt="User">
            <div class="media-body">
                <p class="p-0 m-0">
                    <strong>
                        {{ $comment->user->name }}
                    </strong>
                </p class="p-0 m-0">
                <strong>

                    <strong>
                    </strong>
                    {{ date_format($comment->created_at,"d M, Y h:i A") }}
                </strong>
                <div class="mt-3">
                    {{ $comment->message }}
                </div>

                <div class="replyinput">
                    <div class="mt-4 d-flex justify-content-between replymsg">
                        <div class="w-100 mr-4">
                            <input class="blogmessage" name="blogmessage" class="squareInput" required placeholder="reply to {{ $comment->user->name }}" type="text" value="" style="border: 1px solid; border-radius: 16px; border-color: #00000078; padding: 8px 8px; height: auto; font-size: 12px;">
                        </div>
                        <div class="comment-button">
                            @if(Auth::user())
                            <div class="addblogcomment comment-btn" data-url="{{ url('ajex/blogcomment') }}" data-type="{{ $blog->post_type }}" data-comment="{{ $comment->id }}" data-blog="{{ $blog->id }}"><i class="fas fa-reply p-0 icon-color"></i></div>
                            @endif
                            @if(!Auth::user())
                            <a href="{{ url('account/login') }}">
                                <div class="comment-btn" data-url="{{ url('ajex/blogcomment') }}" data-blog="{{ $blog->id }}"><i class="fas fa-reply p-0 icon-color"></i></div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @foreach($comment->replay_comments as $reply)
                <div class="media mt-4" style="border-left: 1px dashed;">
                    <img class="ml-1" src="{{ url('extraimage/images.jpg') }}" width="36" height="36" alt="User">
                    <div class="media-body ml-3">
                        <p class="p-0 m-0">
                            <strong>
                                {{ $reply->user->name }}
                            </strong>
                        </p class="p-0 m-0">
                        <strong>

                            <strong>
                            </strong>
                            {{ date_format($reply->created_at,"d M, Y h:i A") }}
                        </strong>
                        <div class="mt-3">
                            {{ $reply->message }}
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <div class="comment-reply text-right replybtn">
                <a href="javascript:void(0)">
                    <i class="fas fa-reply fload-right"></i> Reply
                </a>
            </div>
        </div>
    </div>
    <hr class="">
    @endforeach
    @endif
    @if(count($comments) == 0)
    <div>No Comments found.</div>
    @endif


</div>