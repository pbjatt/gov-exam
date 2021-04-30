$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });
    // $(document).ready(function () {
    //     $(document).on('change', '.currentsearch', function () {

    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         var category_id = $('#affaircategory').val();
    //         var year = $('#affairyear').val();
    //         var month = $('#affairmonth').val();
    //         var day = $('#affairday').val();
    //         var url = $('#affairUrl').data('url');

    //         $.ajax({
    //             url: url,
    //             method: "POST",
    //             data: {
    //                 'day': day,
    //                 'month': month,
    //                 'year': year,
    //                 'category_id': category_id
    //             },
    //             success: function (res) {
    //                 $('#ca_list').html(res)
    //             },
    //         });
    //     });
    // });

    $(document).on('change', '.currentsearch', function () {
        var category_id = $('#affaircategory').val();
        var date = $('#affairdate').val();
        var url = $('#affairUrl').data('url');

        $.ajax({
            url: url,
            method: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                'date': date,
                'category_id': category_id
            },
            success: function (res) {
                $('#ca_list').html(res);
                document.location.assign("http://127.0.0.1:8000/currentaffair?date=" + date + "&category_id=" + category_id) ;
                localStorage.setItem("date", date);
                localStorage.setItem("category_id", category_id);
            },
        });
    });

    $('#exportpdf').click(function (e) {

        var urlpdf = $('#affairPdfUrl').data('url');

        var date = localStorage.getItem("date");
        var category_id = localStorage.getItem("category_id");

        $.ajax({
            url: urlpdf,
            method: "GET",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                'date': date,
                'category_id': category_id
            },
            success: function (res) {
            },
        });
    });


    $('body').on('click', '.header', function (e) {
        $('.box-a1').find('.level-box').stop().slideUp();
        $(this).closest('.box-a1').find('.level-box').stop().slideToggle();
    });
});