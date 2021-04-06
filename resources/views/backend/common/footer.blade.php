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
    <!-- {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js') }} -->
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js') }}

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.tinymce',
            plugins: "code, link, image, textcolor, emoticons, hr, lists, charmap, table, fullscreen",
            fontsizeselect: true,
            browser_spellcheck: true,
            menubar: true,
            toolbar: 'bold italic underline strikethrough link | formatselect h1 h2 h3 h4 | table hr superscript subscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | uploadImageButton | fullscreen | code',
            branding: false,
            protect: [
                /\<\/?(if|endif)\>/g, // Protect <if> & </endif>
                /\<xsl\:[^>]+\>/g, // Protect <xsl:...>
                /\<script\:[^>]+\>/g, // Protect <xsl:...>
                /<\?php.*?\?>/g // Protect php code
            ],
            images_upload_credentials: true,
            file_browser_callback_types: 'image',
            image_dimensions: true,
            automatic_uploads: true,
            relative_urls: false,
            remove_script_host: false,
            fullscreen_native: false,
            // setup: function(editor) {
            //     editor.ui.registry.addButton('uploadImageButton', {
            //         icon: 'image',
            //         onAction: function() {
            //             $('#upload_media1').modal('show');
            //         }
            //     });
            // }
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