<div class="row">
    <div class="col-3">
        <a target="_blank" href="{{ url('https://twitter.com/intent/tweet?url='.$url.'&text=') }}"><i class=" img-thumbnail fab fa-twitter fa-2x" style="color:#4c6ef5;background-color: aliceblue"></i></a>
        <p>Twitter</p>
    </div>
    <div class="col-3">
        <a target="_blank" href="{{ url('https://www.facebook.com/sharer/sharer.php?u='.$url) }}"><i class="img-thumbnail fab fa-facebook fa-2x" style="color: #3b5998;background-color: #eceff5;"></i></a>
        <p>Facebook</p>
    </div>
    <div class="col-3">
        <a target="_blank" href="{{ url('https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&summary=') }}"><i class="img-thumbnail fab fa-linkedin-in fa-2x" style="color: #FF5700;background-color: #fdd9ce;"></i></a>
        <p>Linkedin</p>
    </div>
    <div class="col-3">
        <a target="_blank" href="{{ url('https://pinterest.com/pin/create/button/?media=&url='.$url.'&description=') }}"><i class="img-thumbnail fab fa-pinterest fa-2x" style="color: #738ADB;background-color: #d8d8d8;"></i></a>
        <p>Pintrest</p>
    </div>
    <div class="col-3">
        <a target="_blank" href="{{ url('https://wa.me/?text='.$url) }}"><i class="img-thumbnail fab fa-whatsapp fa-2x" style="color: #25D366;background-color: #cef5dc;"></i></a>
        <p>Whatsapp</p>
    </div>
    <div class="col-3">
        <a target="_blank" href="{{ url('https://wa.me/?text='.$url) }}"><i class="img-thumbnail fab fa-facebook-messenger fa-2x" style="color: #3b5998;background-color: #eceff5;"></i></a>
        <p>Messenger</p>
    </div>
    <div class="col-3">
        <a target="_blank" href="{{ url('https://wa.me/?text='.$url) }}"><i class="img-thumbnail fab fa-telegram fa-2x" style="color: #4c6ef5;background-color: aliceblue"></i></a>
        <p>Telegram</p>
    </div>
    <div class="col-3">
        <a target="_blank" href="{{ url('https://wa.me/?text='.$url) }}"><i class="img-thumbnail fab fa-weixin fa-2x" style="color: #7bb32e;background-color: #daf1bc;"></i></a>
        <p>WeChat</p>
    </div>
</div>
<div class="row mt-4">
    <input class="col-10" value="{{ $url }}" type="url" placeholder="https://www.arcardio.app/acodyseyy" id="myInput" aria-describedby="inputGroup-sizing-default" style="height: 40px;">
    <div class="col-2"><i onclick="copylink()" class="far fa-clone"></i></div>
</div>
<script>
    function copylink() {
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        document.execCommand("copy");

    }
</script>