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
{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js') }}
{{ HTML::script('https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js') }}

<script>
    tinymce.init({
        selector: '.editor',
        branding: false
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