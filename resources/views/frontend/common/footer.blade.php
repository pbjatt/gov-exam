<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{ HTML::script('assets/js/app.min.js') }}
{{ HTML::script('assets/js/form.min.js') }}
{{ HTML::script('assets/js/custom-script.js') }}
<!-- {{ HTML::script('assets/js/pages/forms/basic-form-elements.js') }} -->
{{ HTML::script('assets/js/pages/forms/advanced-form-elements.js') }}
{{ HTML::script('assets/js/chart.min.js') }}
{{ HTML::script('assets/js/front-admin.js') }}
{{ HTML::script('js/main.js') }}
{{ HTML::script('assets/js/pages/dashboard/dashboard3.js') }}
{{ HTML::script('assets/js/pages/todo/todo.js') }}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

<script type="text/javascript">
    // $('ul.pagination').hide();
    $(function() {
        $('document').ready(function() {
            $('.scrolling-pagination').jscroll({
                autoTrigger: true,
                debug: true,
                loadingHtml: '<img class="center-block" src="http://localhost/gov-exam/public/images/logo/1617885927govtexamlogo.png" alt="Loading..." />',
                padding: 0,
                refresh: true,
                nextSelector: '.pagination li.active + li a',
                contentSelector: '.scrolling-pagination',
                callback: function() {
                    // $('ul.pagination').remove();
                }
            });


        });
    });
</script>

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

    function Search() {
        if (document.getElementById("search-part").classList.contains('d-block')) {
            document.getElementById("search-part").classList.remove('d-block');
            document.getElementById("search-part").classList.add('d-none');
        } else {
            document.getElementById("search-part").classList.remove('d-none');
            document.getElementById("search-part").classList.add('d-block');
            document.getElementById("search-input").focus();
        }
    }
</script>
</body>

</html>