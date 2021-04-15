$(document).ready(function () {
    $(document).on('change', '.currentsearch', function () {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var category_id = $('.affaircategory').val();
        var year = $('.affairyear').val();
        var month = $('.affairmonth').val();
        var date = $('.affairdate').val();
        var url = $('#affairUrl').data('url');

        $.ajax({
            url: url,
            method: "GET",
            data: {
                'date': date,
                'month': month,
                'year': year,
                'category_id': category_id
            },
            success: function (response) {
                $('#currentaffair').html(res);
            },
        });
    });
});