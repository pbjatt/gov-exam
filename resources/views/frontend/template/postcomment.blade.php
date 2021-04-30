<div class="card project_widget p-4">
    @foreach($comments as $key => $comment)
    <div class="post_comment mb-3">
        <div>
            <strong><img src="{{ url('extraimage/images.jpg') }}" width="24" height="24" alt="User">
                {{ $comment->user->name }}</strong>
        </div>
        <div class="mt-2">
            {{ $comment->message }}
        </div>
    </div>
    <hr class="">
    @endforeach
    @if(Auth::user())
    <div class="row mt-4 w-100">
        <div class="col-11">
            <input class="blogmessage" name="blogmessage" class="squareInput" placeholder="comment" type="text" value="" style="border: 1px solid; border-radius: 16px; border-color: #000; padding: 8px 8px; height: auto; font-size: 12px;">
        </div>
        <div class="col-1">
            <div class="addblogcomment" style="border: 1px solid;" data-url="{{ url('ajex/blogcomment') }}" data-blog="{{ $blog->id }}"><i class="far fa-send"></i></div>
        </div>
    </div>
    @endif
</div>