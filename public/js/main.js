$(function() {
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

    $(document).on('change', '.currentsearch', function() {
        var category_id = $('#affaircategory').val();
        var date = $('#affairdate').val();
        url = window.location.origin + "/currentaffair";
        window.location = url.split('?')[0] + "?date=" + date + "&category_id=" + category_id;
        // document.location.assign(window.location.origin +  "/currentaffair?date=" + date + "&category_id=" + category_id) ;
    });

    $(document).on('change', '.qanswer', function() {
        var qid = $(this).data('ques');
        var answer = $(`#correct_${qid}`).val();

        $(this).closest('.card').find('.q_symbol').remove();
        if (answer == $(this).val()) {
            $(this).next(".qares").append("<i class='fas fa-check text-success q_symbol'></i>");
        } else {
            $(this).next(".qares").append("<i class='fas fa-times text-danger q_symbol'></i>");
        }
    });

    $(document).on('change', '.questionsearch', function() {
        var difficulty = $('#questiondifficulty').val();
        var category_id = $('#questioncategory').val();
        url = window.location.origin + "/question";
        window.location = url.split('?')[0] + "?difficulty=" + difficulty + "&category_id=" + category_id;
        // document.location.assign(window.location.origin +  "/currentaffair?date=" + date + "&category_id=" + category_id) ;
    });

    $('body').on('click', '.header', function(e) {
        $('.box-a1').find('.level-box').stop().slideUp();
        $(this).closest('.box-a1').find('.level-box').stop().slideToggle();
    });

    $('body').on('click', '.replybtn', function(e) {
        $(this).closest('.post_comment').find('.replyinput').show();
    });
});