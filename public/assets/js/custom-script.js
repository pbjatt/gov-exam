$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });

    var url = window.location.origin;
    var host = window.location.host;
    var pathArray = window.location.pathname;

    $('#exam-content').each(function() {
        $(this).find('table').addClass('table-responsive');
    });
    // alert(host);
    $(function() {
        $("#filterexam").change(function() {
            $age = $('#age').val();
            $examcategory = $('#examcategory').val();
            $qualification = $('#qualification').val();
            localStorage.age = $age;
            localStorage.examcategory = $examcategory;
            localStorage.qualification = $qualification;
            this.submit();
        });
    });
    $(function() {
        $age = localStorage.getItem("age");
        $examcategory = localStorage.getItem("examcategory");
        $qualification = localStorage.getItem("qualification");

        $("#age").val($age);
        $("#examcategory").val($examcategory);
        $("#qualification").val($qualification);
    });

    $(document).on('click', '#clearFilter', function() {
        localStorage.removeItem("age");
        localStorage.removeItem("examcategory");
        localStorage.removeItem("qualification");
        window.location.href = "/gov-exam/examlist";
    });

    $(document).on('change', '.searchExam', function() {
        let ajax_url = $('#baseUrl').data('url');
        age = $('#age').val();
        category = $('#category').val();
        qualification = $('#qualification').val();
        $.ajax({
            url: ajax_url,
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                age: age,
                category: category,
                qualification: qualification
            },
            success: function(res) {
                $('#exam_list').html(res);
            }
        });
    });

    $('#search-text').keyup(function(e) {
        $('.listing').html(``);
        $obj = $(this).val();
        if ($obj != '') {
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };
            fetch(`http://localhost:3000/api/search?s=${$obj}`, requestOptions)
                .then(response => response.json())
                .then(result => {
                    if (result.length) {
                        result.forEach((item, i) => {
                            $('.listing').append(`<li>${item.name}</li>`);
                        })
                    } else {
                        $('.listing').append(`<li>No results found.</li>`);
                    }
                })
                .catch(error => console.log('error', error));
        } else {
            $('.listing').html(``);
        }
    });

    $('.extra-fields').click(function() {
        $('.customer_records').clone().appendTo('.customer_records_dynamic');
        $('.customer_records_dynamic .customer_records').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Fields</a>');
        $('.customer_records_dynamic > .single').attr("class", "remove");

        $('.customer_records_dynamic input').each(function() {
            var count = 0;
            var fieldname = $(this).attr("name");
            alert(fieldname);
            $(this).attr('name', fieldname);
            count++;
        });
    });

    $(document).ready(function() {
        function clone() {
            var number = 0;
            number = $('#director-uploads1').attr('data-number');
            $("#director-uploads1").attr('data-number', parseInt(number) + 1);
            var index = parseInt(number) + parseInt(1);

            $('.director-uploads-hidden').find('.app-file7').attr("name", "records[" + index + "][id]").attr("data-item", index);
            $('.director-uploads-hidden').find('.app-file1').attr("name", "records[" + index + "][size_id]").attr("data-item", index);
            $('.director-uploads-hidden').find('.app-file2').attr("name", "records[" + index + "][color_id]").attr("data-item", index);
            $('.director-uploads-hidden').find('.app-file3').attr("name", "records[" + index + "][qty]").attr("data-item", index);
            $('.director-uploads-hidden').find('.app-file4').attr("name", "records[" + index + "][unit_id]").attr("data-item", index);
            $('.director-uploads-hidden').find('.app-file5').attr("name", "records[" + index + "][regular_price]").attr("data-item", index);
            $('.director-uploads-hidden').find('.app-file6').attr("name", "records[" + index + "][sale_price]").attr("data-item", index);
            var director = $('.director-uploads-hidden').html();

            $('#director-uploads1').append(director)
                .find("*")
                .each(function() {
                    var name = $(this).attr("name");
                    var style = $(this).attr("style");
                    var dataitem = $(this).attr("data-item");

                }).on('click', 'button.clone', clone);
            $(".val_null").val(null);
        }

        $("button#add-director").on("click", clone);

        $("html").on('change', '.app-file', function() {
            var number = $(this).attr('data-item');
            console.log(number);
        });
    });

    $(document).on('click change', '.removefield', function(e) {
        $(this).parent('div').remove();
        e.preventDefault();
    });


    $(document).ready(function() {
        if ($("#size_check").is(":checked")) {
            $('.app-file1').attr("name", "records[" + index + "][size_id]");
        } else {
            // checkbox is not checked 
        }
    });

    $(document).on('click change', '#size_check', function() {
        if ($(this).prop('checked')) {
            $('.size_require').removeAttr('style', 'display:none');
        } else {
            $('.size_require').attr('style', 'display:none');
        }
    });

    $(document).on('click change', '#color_check', function() {
        if ($(this).prop('checked')) {
            $('.color_require').removeAttr('style', 'display:none');
        } else {
            $('.color_require').attr('style', 'display:none');
        }
    });


    $(document).on('keyup change', '.masterSearch', function(e) {
        let ajax_url = $(this).data('url');
        base_url = $(this).data('baseurl');

        search = $(this).val();
        $('.listing').html(``);
        $.ajax({
            url: ajax_url,
            type: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                search: search,
                base_url: base_url
            },
            success: function(res) {
                // if (res.length) {
                //     result.forEach((item, i) => {
                //         $('.listing').append(`<li>${item.name}</li>`);
                //     })
                // } else {
                //     $('.listing').append(`<li>No results found.</li>`);
                // }
                $('.listing').html('');
                $('.listing').append(res);
            }
        });
    });

    $(document).on('change', '#statuschange', function() {
        let ajax_url = $(this).attr('dataurl');
        status = $(this).val();
        id = $(this).attr('dataid');

        $.ajax({
            url: ajax_url,
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                status: status,
                id: id
            },
            success: function(res) {

            }
        });
    });

});