$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });

    var fullurl = window.location;
    var url = window.location.origin;
    var host = window.location.host;
    var pathArray = window.location.pathname;


    var page = 1;
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        $.ajax({
                url: url + pathArray + 'ajex/bloglist?page=' + page,
                type: "get",
                beforeSend: function() {
                    $('.ajax-load').show();
                }
            })
            .done(function(data) {
                setTimeout(function() {
                    if (data.count == 0) {
                        $('.ajax-load').html("");
                        return;
                    }
                    $('.ajax-load').hide();
                    $(".scrolling-pagination").append(data.blog_list);
                }, 500);
            });
    }

    $('#exam-content').each(function() {
        $(this).find('table').addClass('table-responsive');
        $(this).find('table').removeClass('table-striped');
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

    $(document).on('click', '.addquestioncomment', function() {
        let ajax_url = $(this).data('url');
        let blog_id = $(this).data('blog');
        let comment_id = $(this).data('comment');
        let message = $(this).closest('.row').find('input').val();
        if (message == '') {
            $(this).closest('.row').find('input').focus()
        } else {
            $.ajax({
                url: ajax_url,
                type: 'get',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    blog_id: blog_id,
                    comment_id: comment_id,
                    message: message
                },
                success: function(res) {
                    $('#questioncomment').html(res);
                }
            });
        }
    });


    $(document).on('click', '.addblogcomment', function() {
        let ajax_url = $(this).data('url');
        let blog_id = $(this).data('blog');
        let comment_id = $(this).data('comment');
        let post_type = $(this).data('type');
        let message = $(this).closest('.row').find('input').val();
        if (message == '') {
            $(this).closest('.row').find('input').focus()
        } else {
            $.ajax({
                url: ajax_url,
                type: 'get',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    blog_id: blog_id,
                    comment_id: comment_id,
                    post_type: post_type,
                    message: message
                },
                success: function(res) {
                    $('#blogcomment').html(res);
                }
            });
        }
    });

    $(document).on('click', '.sharepost', function() {
        let ajax_url = $(this).data('url');
        let url = $(this).data('link');
        $.ajax({
            url: ajax_url,
            type: 'get',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                url: url
            },
            success: function(res) {
                $('#sharepostModal .modal-body').html(res);
                $('#sharepostModal').modal('show');
            }
        });
    });

    $(document).on('click', '.bloglike', function() {
        let ajax_url = $(this).data('url');
        let blog_id = $(this).data('blog');
        let post_type = $(this).data('type');
        let status = $(this).hasClass('fas');
        $(this).toggleClass("far fas");
        var likevalue = $(this).closest('.post-action').find('.bloglikevalue').html();
        if (status) {
            likevalue = parseInt(likevalue) - parseInt(1);
            if (likevalue < 0) {
                likevalue = 0;
            }
        } else {
            likevalue = parseInt(likevalue) + parseInt(1);
            if (likevalue < 0) {
                likevalue = 0;
            }
        }
        $(this).closest('.post-action').find('.bloglikevalue').html(likevalue);
        $.ajax({
            url: ajax_url,
            type: 'get',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                blog_id: blog_id,
                post_type: post_type
            },
            success: function(res) {

                // $(this).('.bloglikevalue').html(likevalue);
            }
        });
    });

    $(document).on('click', '#examform', function() {
        let ajax_url = $('#baseUrl').data('url');
        let age = $('.examData .age').val();
        let category = $('.examData .category').val();
        let qualification = $('.examData .qualification').val();
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
                $('#examlistModal').modal('hide')
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

    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var url = $(this).attr('href').split('page=')[1];
        fetch_data(page, url);
    });

    function fetch_data(page) {
        $.ajax({
            url: fullurl + '?page=' + page,
            success: function(data) {
                $('#exam_list').html(data);
            }
        });
    }

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