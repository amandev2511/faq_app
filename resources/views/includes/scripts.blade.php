<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            rowReorder: true
        });
        $('tbody').on('click', 'td .expandRow', function () {
            $($(this).data('target')).toggle();
            var cat_id = $(this).closest('tr').find('#cat_id').text();
            var tuid = $(this).closest('tr').find('#tduid').text();
            $('#faq_category_id').val(cat_id);
            $('#faq_category').val(tuid);
        });
    });
</script>
<script>
    // Activate the tab when clicked


    document.querySelectorAll('.nav-link').forEach(function (tab) {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });

    $(document).ready(function () {

        // Initialize DataTable
        // var table = $('#example').DataTable({
        //     // dom: 'l<"toolbar">frtip',
        //     // initComplete: function () {
        //     //     $("div.toolbar")
        //     //         .html('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> +Add More Category</button>');
        //     // },
        //     rowReorder: true
        // });
        //
        // $("#example tbody").on("click", "td .expandRow", function (e){
        //     // var $tr = $(this).next('tr.expandable-row');
        //     // console.log($tr);
        //     // $tr.toggle();
        //     $($(this).data('target')).toggle();
        // });

        // Use event delegation to handle click events on td elements
        {{--$('#example tbody').on('click', 'td .caret-icon', function () {--}}
        {{--    if ($(this).hasClass('fa-caret-down')) {--}}
        {{--        $(this).removeClass('fa-caret-down').addClass('fa-caret-up');--}}
        {{--        $('#faq_category_id').val('');--}}
        {{--        $('#faq_category').val('');--}}
        {{--        $('.disp').hide();--}}
        {{--        $('.append_data').empty();--}}
        {{--    } else {--}}
        {{--        $(this).removeClass('fa-caret-up').addClass('fa-caret-down');--}}
        {{--        var cat_id = $(this).closest('tr').find('#cat_id').text();--}}
        {{--        var tuid = $(this).closest('tr').find('#tduid').text();--}}
        {{--        $('#faq_category_id').val(cat_id);--}}
        {{--        $('#faq_category').val(tuid);--}}
        {{--        $('.disp').show();--}}
        {{--        $.ajax({--}}
        {{--            type: "GET",--}}
        {{--            url: "{{url('get/faq/data')}}" + "/" + shop_name + "/" + cat_id,--}}
        {{--            // data: {email:email,pass:pass,c_name:c_name,c_website,phone,_token:"csrf_token()"},--}}
        {{--            dataType: 'json',--}}
        {{--            success: function (response) {--}}
        {{--                var result = response;--}}
        {{--                if (result == []) {--}}
        {{--                    alert('no data');--}}
        {{--                }--}}
        {{--                var html = '';--}}
        {{--                result.forEach(function (e, index) {--}}
        {{--                    // alert(result[index].id);--}}
        {{--                    if (result[index].faq_product_enable == 1) {--}}
        {{--                        var enabledisable_pro_faq = '<label>Active</label><label class="switch"><input type="checkbox" class="toggle_check_update" checked data-id="' + result[index].id + '"><span class="slider round"></span></label>';--}}

        {{--                    } else {--}}
        {{--                        var enabledisable_pro_faq = '<label>Inactive</label><label class="switch"><input type="checkbox" class="toggle_check_update" data-id="' + result[index].id + '"><span class="slider round"></span></label>'--}}
        {{--                    }--}}

        {{--                    var html = '<tr class="append_data"><td>' + result[index].faq_qus + '</td><td><i class="' + result[index].faq_open_icon + '"></i></td><td><i class="' + result[index].faq_close_icon + '"></i></td><td>12</td><td>13</td><td>' + enabledisable_pro_faq + '</td><td><i class="fa fa-edit faq_update" data-id="' + result[index].id + '" data-cid="' + result[index].category_id + '" data-name="' + result[index].category_name + '" data-qus="' + result[index].faq_qus + '" data-slug="' + result[index].faq_slug + '" data-enable="' + result[index].faq_product_enable + '" data-ans="' + result[index].faq_ans + '"  data-toggle="modal" data-target="#faqUpdateModal"></i></td><td><i data-id="' + result[index].id + '" class="fa fa-trash faq_delete"></i></td></tr>';--}}
        {{--                    // console.log(html);--}}
        {{--                    $('#child_value').append(html)--}}
        {{--                });--}}

        {{--            },--}}
        {{--            error: function (error) {--}}
        {{--                // Handle errors, e.g., display validation errors--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}

        {{--});--}}


        $('#searchInput').on('click', function (e) {
            e.stopPropagation(); // Prevent the document click event from closing the dropdown
            $('#filterDropdown').toggleClass('show');
        });

        // Close the dropdown when the document is clicked
        $(document).on('click', function (e) {
            if ($('#filterDropdown').hasClass('show')) {
                $('#filterDropdown').removeClass('show');
            }
        });

        // Prevent clicks within the dropdown from closing it
        $('#filterDropdown').on('click', function (e) {
            e.stopPropagation();
        });

        // Handle checkbox changes
        $('#filterDropdown input[type="checkbox"]').on('change', function () {
            // Your code to handle checkbox selection here
            console.log($(this).attr('id') + ' is ' + ($(this).is(':checked') ? 'checked' : 'unchecked'));
        });
    });
    var $rows = $('.wrapper');
    var rowsTextArray = [];

    var i = 0;
    $.each($rows, function () {
        rowsTextArray[i] = ($(this).find('.number').text() + $(this).find('.fruit').text())
            .replace(/\s+/g, '')
            .toLowerCase();
        i++;
    });

    $('#searchInput').keyup(function () {
        var val = $.trim($(this).val()).replace(/\s+/g, '').toLowerCase();
        $rows.show().filter(function (index) {
            return (rowsTextArray[index].indexOf(val) === -1);
        }).hide();
    });

    $(document).ready(function () {
        var size_li = $(".sec").length;
        var x = 0;
        $('#exampleFormControlSelect1').on('click', function () {
            if ($(this).val() == "load") {
                x += 3; // for showing next 3 option
                $('.sec:lt(' + x + ')').show(); // will show till x value from total option with sec class
                if (x >= size_li) {
                    $('#loadMore').hide();
                }
            }
        });
    })

    var pro_quotations = [];
    var coll_quotations = [];
    var blogs_quotations = [];
    var pages_quotations = [];
    var shop_name = $('#shop_name').val();

    $('#products').click(function () {

        if ($(this).is(':checked')) {
            var type = $('#all_prod').text();
            pro_quotations.push(type);
            $('#product_search').show();
            $('#all_prod').show();

            //    console.log(product);
            $.ajax({
                type: "GET",
                url: "{{url('all/product')}}" + "/" + shop_name,
                // data: {email:email,pass:pass,c_name:c_name,c_website,phone,_token:"csrf_token()"},
                dataType: 'json',
                success: function (response) {
                    var all_pro = response.products;
                    var pro_count = response.products.length;
                    var html = '';
                    for (i = 0; i < pro_count; i++) {
                        html += '<div class="conten"><input type="hidden" id="products_id_' + [i] + '" value="' + all_pro[i].id + '"><input type="checkbox" name="pro_id_val" class="pro_id_val" id="product_title_' + [i] + '" value="' + all_pro[i].id + '"><span>' + all_pro[i].title + '</span></div>'
                    }
                    $('#product_search').append(html);
                },
                error: function (error) {
                    // Handle errors, e.g., display validation errors
                }
            });
        } else {
            pro_quotations = []
            $('#all_prod').hide();
            $('#product_search').hide();
        }


    })

    $('#Collections').click(function () {

        if ($(this).is(':checked')) {
            var type = $('#all_custom').text();
            coll_quotations.push(type);
            $('#option_search').show();
            $('#all_custom').show();
            $.ajax({
                type: "GET",
                url: "{{url('all/custom/collection')}}" + "/" + shop_name,
                // data: {email:email,pass:pass,c_name:c_name,c_website,phone,_token:"csrf_token()"},
                dataType: 'json',
                success: function (response) {
                    var all_custom = response.custom_collections;
                    console.log(all_custom);
                    var custom_count = all_custom.length;
                    var html = '';
                    for (i = 0; i < custom_count; i++) {
                        html += '<div class="conten"><input  type="hidden" id="custom_coll_' + [i] + '" value="' + all_custom[i].id + '"><input type="checkbox" name="collection_val" class="collection_val" id="custom_coll_title_' + [i] + '" value="' + all_custom[i].id + '"><span>' + all_custom[i].title + '</span></div>'
                    }
                    $('#option_search').append(html);
                },
                error: function (error) {
                    // Handle errors, e.g., display validation errors
                }
            });
        } else {
            coll_quotations = [];
            $('#all_custom').hide();
            $('#option_search').hide();
        }
    })

    $('#blogs').click(function () {


        if ($(this).is(':checked')) {
            var type = $('#all_blogs').text();
            blogs_quotations.push(type);
            $('#blogs_search').show();
            $('#all_blogs').show();
            $.ajax({
                type: "GET",
                url: "{{url('all/blogs')}}" + "/" + shop_name,
                // data: {email:email,pass:pass,c_name:c_name,c_website,phone,_token:"csrf_token()"},
                dataType: 'json',
                success: function (response) {
                    var all_blogs = response.blogs;
                    console.log(all_blogs);
                    var blogs_count = all_blogs.length;
                    var html = '';
                    for (i = 0; i < blogs_count; i++) {
                        html += '<div class="conten"><input type="hidden" id="blog_id_' + [i] + '" value="' + all_blogs[i].id + '"><input type="checkbox" name="blogs_val" class="blogs_val" id="blogs_title_' + [i] + '" value="' + all_blogs[i].id + '"><span>' + all_blogs[i].title + '</span></div>'
                    }
                    $('#blogs_search').append(html);
                },
                error: function (error) {
                    // Handle errors, e.g., display validation errors
                }
            });
        } else {
            blogs_quotations = [];
            $('#all_blogs').hide();
            $('#blogs_search').hide();
        }
    })

    $('#pages').click(function () {

        if ($(this).is(':checked')) {
            var type = $('#all_pages').text();
            pages_quotations.push(type);
            $('#pages_search').show();
            $('#all_pages').show();

            //    console.log(product);
            $.ajax({
                type: "GET",
                url: "{{url('all/pages')}}" + "/" + shop_name,
                // data: {email:email,pass:pass,c_name:c_name,c_website,phone,_token:"csrf_token()"},
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    // return false;
                    var all_pagesss = response.pages;
                    var pages_count = response.pages.length;
                    var html = '';
                    for (i = 0; i < pages_count; i++) {
                        html += '<div class="conten"><input type="hidden" id="products_id_' + [i] + '" value="' + all_pagesss[i].id + '"><input type="checkbox" name="pages_val" class="pages_val" id="pages_val' + [i] + '" value="' + all_pagesss[i].id + '"><span>' + all_pagesss[i].title + '</span></div>'
                    }
                    $('#pages_search').append(html);
                },
                error: function (error) {
                    // Handle errors, e.g., display validation errors
                }
            });
        } else {
            pages_quotations = []
            $('#all_pages').hide();
            $('#pages_search').hide();
        }


    })

    $(document).on('init.dt', function () {
        var table = $('#example').DataTable();

        $('.toggle_check').click(function () {
            var pro_check = $(this).is(':checked');
            if (pro_check == true) {
                pro_check_val = 1;
            } else {
                pro_check_val = 0;
            }
            var row = $(this).attr('data-id')
            $.ajax({
                type: "POST",
                url: "{{url('update/status/pro')}}",
                data: { row: row, pro_check_val: pro_check_val, shop_name: shop_name, _token: "csrf_token()" },
                // dataType:'json',
                success: function (response) {
                    alert('Successfully updated')
                    location.reload();
                },
                error: function (error) {
                    // Handle errors, e.g., display validation errors
                }
            });
        }); // Initialize toggle after DataTable initialization


    });

    var hide_cat;
    var ena_pro;
    $('#save_faq_opt').click(function () {
        var category_name = $('#category_name').val();
        var select_icon = $('#select_icon').val();
        var hide_cat_name = $('#hide_cat_name').is(':checked');
        var ena_pro_page = $('#ena_pro_page').is(':checked');

        if (hide_cat_name == true) {
            hide_cat = 1;
        } else {
            hide_cat = 0;
        }

        if (ena_pro_page == true) {
            ena_pro = 1;
        } else {
            ena_pro = 0;
        }
        if (pro_quotations == 'All Products') {
            var type = "Product";
            var arr = [];
            $.each($("input[name='pro_id_val']:checked"), function () {
                arr.push($(this).val());
            });
            var pro_valll_id = arr.join(", ");
            $.ajax({
                type: "POST",
                url: "{{url('save/faq/all/data/')}}" + "/" + shop_name,
                data: { shop_name: shop_name, category_name: category_name, select_icon: select_icon, hide_cat: hide_cat, ena_pro: ena_pro, pro_valll_id: pro_valll_id, type: type, _token: "csrf_token()" },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    alert("Data successfully inserted");
                    location.reload();
                },
                error: function (error) {
                    alert('Something went wrong');
                }
            });
            return true;

        }
        else if (coll_quotations == 'All collections') {
            var type = 'Collections'
            var arr = [];
            $.each($("input[name='collection_val']:checked"), function () {
                arr.push($(this).val());
            });
            var collection_val = arr.join(", ");
            $.ajax({
                type: "POST",
                url: "{{url('save/faq/all/data/')}}" + "/" + shop_name,
                data: { shop_name: shop_name, category_name: category_name, select_icon: select_icon, hide_cat: hide_cat, ena_pro: ena_pro, collection_val: collection_val, type: type, _token: "csrf_token()" },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    alert("Data successfully inserted");
                    location.reload();
                },
                error: function (error) {
                    alert('Something went wrong');
                }
            });
            return true;


        }
        else if (blogs_quotations == 'All Blogs') {
            var type = 'Blogs'
            var arr = [];
            $.each($("input[name='blogs_val']:checked"), function () {
                arr.push($(this).val());
            });
            var blogs_val = arr.join(", ");
            $.ajax({
                type: "POST",
                url: "{{url('save/faq/all/data/')}}" + "/" + shop_name,
                data: { shop_name: shop_name, category_name: category_name, select_icon: select_icon, hide_cat: hide_cat, ena_pro: ena_pro, blogs_val: blogs_val, type: type, _token: "csrf_token()" },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    alert("Data successfully inserted");
                    location.reload();
                },
                error: function (error) {
                    alert('Something went wrong');
                }
            });
            return true;

        } else if (pages_quotations == 'All Pages') {
            var type = 'Pages';
            var arr = [];
            $.each($("input[name='pages_val']:checked"), function () {
                arr.push($(this).val());
            });
            var pages_val = arr.join(", ");
            $.ajax({
                type: "POST",
                url: "{{url('save/faq/all/data/')}}" + "/" + shop_name,
                data: { shop_name: shop_name, category_name: category_name, select_icon: select_icon, hide_cat: hide_cat, ena_pro: ena_pro, pages_val: pages_val, type: type, _token: "csrf_token()" },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    alert("Data successfully inserted");
                    location.reload();
                },
                error: function (error) {
                    alert('Something went wrong');
                }
            });
            return true;
        }



        tinymce.init({
            selector: '#editor',
            height: 400,
            plugins: 'code',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | code',
            menubar: false
        });
        // Find all checkboxes with the specified class and check if they are checked


    })
    var ena_pro_toggle;
    $('#save_faq').click(function () {
        var faq_category = $('#faq_category').val();
        var faq_category_id = $('#faq_category_id').val();
        var faq_questions = $('#faq_questions').val();
        var faq_slug = $('#faq_slug').val();
        var faq_close_icon = $('#faq_close_icon').val();
        var faq_open_icon = $('#faq_open_icon').val();
        var toggle_active_deactive = $('.toggle_active_deactive').is(':checked');
        if (toggle_active_deactive == true) {
            ena_pro_toggle = 1;
        } else {
            ena_pro_toggle = 0;
        }
        console.log(faq_category_id);
        var content = $(".faqAnsData").val();
        // var content = tinymce.get("editor").getContent();
        // var content = tinymce.get("editor").getContent({ format: "text" });
        $.ajax({
            type: "POST",
            url: "{{url('save/faq/data')}}" + "/" + shop_name,
            data: { faq_category_id: faq_category_id, faq_category: faq_category, faq_questions: faq_questions, faq_slug: faq_slug, faq_close_icon: faq_close_icon, faq_open_icon: faq_open_icon, ena_pro_toggle: ena_pro_toggle, content: content, _token: "<?= csrf_token(); ?>" },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                // alert("Data successfully inserted");
                // toastr.success("Data successfully inserted");
                location.reload()
            },
            error: function (error) {
                alert('Something went wrong');
            }
        });
    })
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '#editor',
            height: 400,
            plugins: 'code',
            toolbar: 'undo redo | formatselect | styles | bold italic | alignleft aligncenter alignright | indent outdent | wordcount | code | backcolor | copy | cut | fontfamily fontsize forecolor h1 h2 h3 h4 h5 h6 hr indent | italic | language | lineheight | newdocument | outdent | paste pastetext | print |',
            menubar: false,
            content_security_policy: "referrer origin"
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '#editor_update',
            height: 400,
            plugins: 'code',
            toolbar: 'undo redo | formatselect | styles | bold italic | alignleft aligncenter alignright | indent outdent | wordcount | code | backcolor | copy | cut | fontfamily fontsize forecolor h1 h2 h3 h4 h5 h6 hr indent | italic | language | lineheight | newdocument | outdent | paste pastetext | print |',
            menubar: false,
            content_security_policy: "referrer origin"
        });
    });







    $('.edit_category').click(function () {


        var cat_id = $(this).attr('data-id');
        var cate_name = $(this).attr('data-name');
        var cate_icon = $(this).attr('data-icon');
        var cate_hideca = $(this).attr('data-hideca');
        var cate_enablepro = $(this).attr('data-enablepro');
        var cat_type = $(this).attr('data-type');
        var cat_pro_id = $(this).attr('data-proid');
        var cat_coll_id = $(this).attr('data-collid');
        var cat_blogs_id = $(this).attr('data-blogsid');
        var cat_pages_id = $(this).attr('data-pagesid');
        $('#category_name_update').val(cate_name);
        $('#category_id_update_val').val(cat_id);
        $('#category_type').val(cat_type);
        $('#cat_pro_id').val(cat_pro_id);
        $('#cat_coll_id').val(cat_coll_id);
        $('#cat_blogs_id').val(cat_blogs_id);
        $('#cat_pages_id').val(cat_pages_id);

        $('.hide_cat_name_update').attr('checked', false);
        if (cate_hideca == 1) {
            $('.hide_cat_name_update').toggle(
                function () {
                    $('.hide_cat_name_update').attr('Checked', 'Checked');
                }
            );
        }
        $('.ena_pro_page_update').attr('checked', false);

        if (cate_enablepro == 1) {
            $('.ena_pro_page_update').toggle(
                function () {
                    $('.ena_pro_page_update').attr('Checked', 'Checked');
                }
            );
        }


    })

    $('#save_faq_opt_update').click(function () {
        var category_name_update = $('#category_name_update').val();
        var category_id_update_val = $('#category_id_update_val').val();
        var category_type = $('#category_type').val();
        var cat_pro_id = $('#cat_pro_id').val();
        var cat_coll_id = $('#cat_coll_id').val();
        var cat_blogs_id = $('#cat_blogs_id').val();
        var cat_pages_id = $('#cat_pages_id').val();
        var select_icon_update = $('#select_icon_update').val();
        var hide_cat_name_update = $('.hide_cat_name_update').is(':checked');
        var ena_pro_page_update = $('.ena_pro_page_update').is(':checked');

        if (hide_cat_name_update == true) {
            hide_update_pro_toggle = 1;
        } else {
            hide_update_pro_toggle = 0;
        }

        if (ena_pro_page_update == true) {
            ena_update_pro_toggle = 1;
        } else {
            ena_update_pro_toggle = 0;
        }

        if (category_type == 'Product') {
            $.ajax({
                type: "POST",
                url: "{{url('update/faq/category/data')}}" + "/" + shop_name + "/" + category_id_update_val,
                data: { category_name_update: category_name_update, hide_cat_name_update: hide_cat_name_update, category_type: category_type, select_icon_update: select_icon_update, hide_update_pro_toggle: hide_update_pro_toggle, ena_update_pro_toggle: ena_update_pro_toggle, cat_pro_id: cat_pro_id, _token: "csrf_token()" },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    alert("Data updated successfully");
                    location.reload();
                },
                error: function (error) {
                    alert('Something went wrong');
                }
            });
        } else if (category_type == 'Collections') {
            $.ajax({
                type: "POST",
                url: "{{url('update/faq/category/data')}}" + "/" + shop_name + "/" + category_id_update_val,
                data: { category_name_update: category_name_update, hide_cat_name_update: hide_cat_name_update, category_type: category_type, select_icon_update: select_icon_update, hide_update_pro_toggle: hide_update_pro_toggle, ena_update_pro_toggle: ena_update_pro_toggle, cat_coll_id: cat_coll_id, _token: "csrf_token()" },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    alert("Data updated successfully");
                    location.reload();
                },
                error: function (error) {
                    alert('Something went wrong');
                }
            });
        } else if (category_type == 'Blogs') {
            $.ajax({
                type: "POST",
                url: "{{url('update/faq/category/data')}}" + "/" + shop_name + "/" + category_id_update_val,
                data: { category_name_update: category_name_update, hide_cat_name_update: hide_cat_name_update, category_type: category_type, select_icon_update: select_icon_update, hide_update_pro_toggle: hide_update_pro_toggle, ena_update_pro_toggle: ena_update_pro_toggle, cat_blogs_id: cat_blogs_id, _token: "csrf_token()" },
                dataType: 'json',
                success: function (response) {
                    alert("Data updated successfully");
                    location.reload();
                },
                error: function (error) {
                    alert('Something went wrong');
                }
            });
        } else if (category_type == 'Pages') {
            $.ajax({
                type: "POST",
                url: "{{url('update/faq/category/data')}}" + "/" + shop_name + "/" + category_id_update_val,
                data: { category_name_update: category_name_update, hide_cat_name_update: hide_cat_name_update, category_type: category_type, select_icon_update: select_icon_update, hide_update_pro_toggle: hide_update_pro_toggle, ena_update_pro_toggle: ena_update_pro_toggle, ena_pro_page_update: ena_pro_page_update, _token: "csrf_token()" },
                dataType: 'json',
                success: function (response) {
                    alert("Data updated successfully");
                    location.reload();
                },
                error: function (error) {
                    alert('Something went wrong');
                }
            });
        }


    })



    $('.del_category').click(function () {
        var cat_id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "{{url('remove/category')}}" + "/" + cat_id,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                // alert('Data has been successfully deleted');
                // toastr.success("Data has been successfully deleted");
                location.reload();
                // return false;
            },
            error: function (error) {
                alert('Something went wrong');
                // Handle errors, e.g., display validation errors
            }
        });

    });


    $('.disp tbody').on('click', 'td .faq_delete', function () {
        var faq_delete_id = $(this).attr('data-id');
        //    console.log(faq_delete_id);
        $.ajax({
            type: "GET",
            url: "{{url('remove/faq')}}" + "/" + faq_delete_id,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                alert('Data has been successfully deleted');
                location.reload();
                // return false;
            },
            error: function (error) {
                alert('Something went wrong');
                // Handle errors, e.g., display validation errors
            }
        });
    });

    $('.faq_update').on('click', function (e) {
        var faq_update_id = $(this).attr('data-id');
        var faq_update_cid = $(this).attr('data-cid');
        var faq_update_name = $(this).attr('data-name');
        var faq_update_qus = $(this).attr('data-qus');
        var faq_update_slug = $(this).attr('data-slug');
        var faq_update_enable = $(this).attr('data-enable');
        var faq_update_ans = $(this).attr('data-ans');
        $('#faq_id_update').val(faq_update_id);
        $('#faq_category_id_update').val(faq_update_cid);
        $('#faq_category_update').val(faq_update_name);
        $('#faq_questions_update').val(faq_update_qus);
        $('#faq_slug_update').val(faq_update_slug);
        if (faq_update_enable == 1) {

            $('.toggle_active_deactive_update').toggle(
                function () {
                    $('.toggle_active_deactive_update').attr('Checked', 'Checked');
                }
            );
        }

        // tinymce.get('editor_update').setContent(faq_update_ans);
    });

    var update_ena_pro_toggle;
    $('#update_faq').click(function () {
        var faq_qus_ans_id = $('#faq_id_update').val();
        var faq_qus_ans_cid = $('#faq_category_id_update').val();
        var faq_qus_ans_name = $('#faq_category_update').val();
        var faq_qus_ans_qus = $('#faq_questions_update').val();
        var faq_qus_ans_slug = $('#faq_slug_update').val();
        var faq_close_icon_update = $('#faq_close_icon_update').val();
        var faq_open_icon_update = $('#faq_open_icon_update').val();

        var toggle_active_deactive_update = $('.toggle_active_deactive_update').is(':checked');
        if (toggle_active_deactive_update == true) {
            update_ena_pro_toggle = 1;
        } else {
            update_ena_pro_toggle = 0;
        }
        var content_update = $('.editor_updates').val();
        $.ajax({
            type: "POST",
            url: "{{url('update/faq/data')}}" + "/" + faq_qus_ans_id,
            data: { faq_qus_ans_cid: faq_qus_ans_cid, faq_qus_ans_name: faq_qus_ans_name, faq_qus_ans_qus: faq_qus_ans_qus, faq_qus_ans_slug: faq_qus_ans_slug, faq_close_icon_update: faq_close_icon_update, faq_open_icon_update: faq_open_icon_update, update_ena_pro_toggle: update_ena_pro_toggle, content_update: content_update, _token: "csrf_token()" },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                alert("Data updated successfully");
                location.reload();
            },
            error: function (error) {
                alert('Something went wrong');
            }
        });
    });

    $('.disp tbody').on('click', 'td .toggle_check_update', function () {
        var id = $(this).attr('data-id');
        var enable_check_update = $(this).is(':checked');
        if (enable_check_update == true) {
            pro_check_val_update = 1;
        } else {
            pro_check_val_update = 0;
        }
        var row = $(this).attr('data-id')
        $.ajax({
            type: "POST",
            url: "{{url('update/status/faq')}}" + "/" + id,
            data: { pro_check_val_update: pro_check_val_update, _token: "csrf_token()" },
            // dataType:'json',
            success: function (response) {
                alert('Successfully updated')
                location.reload();
            },
            error: function (error) {
                // Handle errors, e.g., display validation errors
            }
        });
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/@shopify/app-bridge@3.7.9/umd/index.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@shopify/app-bridge-utils@3.5.1/umd/index.min.js"></script>
<script>
    var AppBridge = window['app-bridge'];
    var app_key = '5fa1cebe34e44d1fcbb3fc14704a3e09';
    var actions = AppBridge.actions;
    var utils = AppBridge.utilities;
    var createApp = AppBridge.default;
    var app = createApp({
        apiKey: app_key,
        host: "{{ \Request::get('host') }}",
        shopOrigin: "{{ \Request::get('shop') }}",
        forceRedirect: true,
    });
    // console.log(app);
</script>