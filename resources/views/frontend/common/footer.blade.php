<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
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
<div class="modal fade" id="sharepostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content col-12">
            <div class="modal-header">
                <h5 class="modal-title">Share</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>
</body>

</html>