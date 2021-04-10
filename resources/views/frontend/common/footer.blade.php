{{ HTML::script('assets/js/app.min.js') }}
{{ HTML::script('assets/js/form.min.js') }}
{{ HTML::script('assets/js/custom-script.js') }}
<!-- {{ HTML::script('assets/js/pages/forms/basic-form-elements.js') }} -->
{{ HTML::script('assets/js/pages/forms/advanced-form-elements.js') }}
{{ HTML::script('assets/js/chart.min.js') }}
{{ HTML::script('assets/js/admin.js') }}
{{ HTML::script('assets/js/pages/dashboard/dashboard3.js') }}
{{ HTML::script('assets/js/pages/todo/todo.js') }}
<script>
    function openNav() {
        if (document.getElementById("mySidenav").classList.contains('menu-open')) {
            document.getElementById("mySidenav").classList.remove('menu-open');
            document.getElementById("mySidenav").classList.add('menu-close');
        } else {
            document.getElementById("mySidenav").classList.remove('menu-close');
            document.getElementById("mySidenav").classList.add('menu-open');
        }
    }

    function closeNav() {
        document.getElementById("mySidenav").style.right = "0";
    }
</script>
</body>

</html>