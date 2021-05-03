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
        document.location.assign(window.location.origin +  "/currentaffair?date=" + date + "&category_id=" + category_id) ;
    });

    $('body').on('click', '.header', function (e) {
        $('.box-a1').find('.level-box').stop().slideUp();
        $(this).closest('.box-a1').find('.level-box').stop().slideToggle();
    });
});