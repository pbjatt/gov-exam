{{ HTML::script('assets/js/app.min.js') }}
{{ HTML::script('assets/js/form.min.js') }}
{{ HTML::script('assets/js/custom-script.js') }}
{{ HTML::script('assets/js/pages/forms/basic-form-elements.js') }}
{{ HTML::script('assets/js/pages/forms/advanced-form-elements.js') }}
<!-- {{ HTML::script('assets/js/chart.min.js') }} -->
{{ HTML::script('assets/js/admin.js') }}
{{ HTML::script('assets/js/pages/dashboard/dashboard3.js') }}
{{ HTML::script('assets/js/pages/forms/editors.js') }}
{{ HTML::script('assets/js/bundles/tinymce/tinymce.min.js') }}
{{ HTML::script('js/main.js') }}
{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js') }}


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.tinymce',
        // plugins: 'image code',
        plugins: "code, link, image code, textcolor, emoticons, hr, lists, charmap, table, fullscreen",
        fontsizeselect: true,
        // toolbar: 'undo redo | link image | code',
        toolbar: 'bold italic underline strikethrough link image  forecolor backcolor | formatselect h1 h2 h3 h4 | table hr superscript subscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | uploadImageButton | fullscreen | code',
        //     
        /* enable title field in the Image dialog*/
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        /*
          URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
          images_upload_url: 'postAcceptor.php',
          here we add custom filepicker only to Image dialog
        */
        file_picker_types: 'image',
        /* and here's our custom image picker*/
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
    });
</script>

<script>
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
    });

    var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
</script>
</body>

</html>