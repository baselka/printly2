$(document).ready(function() {
    "use strict";
    $(".city").select2();
    $(".area").select2();
    $(window).blur(function() {
        $("#loader").removeClass("fade");
    });
    $(window).focus(function() {
        $("#loader").addClass("fade");
    });
    $(".input-b3").fileinput({
        uploadUrl: "/upload_transfer_file",
        enableResumableUpload: true,
        showUpload: false,
        showRemove: false,
        showBrowse: false,
        showClose: false,
        uploadExtraData: {
            _token: $("meta[name=csrf-token]").attr("content")
        },
        deleteExtraData: {
            _token: $("meta[name=csrf-token]").attr("content"),
            custom_product: custom_product_id
        },
        browseLabel: "تصفح ملفاتك",
        resumableUploadOptions: {
           // uncomment below if you wish to test the file for previous partial uploaded chunks
           // to the server and resume uploads from that point afterwards
           // testUrl: "http://localhost/test-upload.php"
        },
        uploadExtraData: {
            _token: $("meta[name=csrf-token]").attr("content")
        },
        deleteExtraData: {
            _token: $("meta[name=csrf-token]").attr("content"),
            custom_product: custom_product_id
        },
        maxFileCount: 5,
        allowedFileTypes: ['image','pdf'],    // allow only images
        showCancel: true,
        initialPreviewAsData: true,
        overwriteInitial: false,
        // initialPreview: [],          // if you have previously uploaded preview files
        // initialPreviewConfig: [],    // if you have previously uploaded preview files
        dropZoneTitle:
        '<img src="./img/icons/upload2.png " class="mb-3 "> <br> اسحب ملفك هنا أو ',
    dropZoneClickTitle:
        '&nbsp; &nbsp; <span class="h2 btn main-btn ">تصفح ملفاتك</span>',
    removeTitle: true,
    deleteUrl: "/delete_file",
    uploadAsync: true,
        deleteUrl: "/upload_transfer_file?delete=true"
    }).on("filebatchselected", function(event, files) {
        $(".input-b2").fileinput("upload");
    })
    //     // get all files
    $(".input-b2").fileinput({
        uploadUrl: "/upload_transfer_file",
        enableResumableUpload: true,
        showUpload: false,
        showRemove: false,
        showBrowse: false,
        showClose: false,
        uploadExtraData: {
            _token: $("meta[name=csrf-token]").attr("content")
        },
        deleteExtraData: {
            _token: $("meta[name=csrf-token]").attr("content"),
            custom_product: custom_product_id
        },
        browseLabel: "تصفح ملفاتك",
        resumableUploadOptions: {
           // uncomment below if you wish to test the file for previous partial uploaded chunks
           // to the server and resume uploads from that point afterwards
           // testUrl: "http://localhost/test-upload.php"
        },
        uploadExtraData: {
            _token: $("meta[name=csrf-token]").attr("content")
        },
        deleteExtraData: {
            _token: $("meta[name=csrf-token]").attr("content"),
            custom_product: custom_product_id
        },
        maxFileCount: 5,
        allowedFileTypes: ['image','pdf'],    // allow only images
        showCancel: true,
        initialPreviewAsData: true,
        overwriteInitial: false,
        // initialPreview: [],          // if you have previously uploaded preview files
        // initialPreviewConfig: [],    // if you have previously uploaded preview files
        dropZoneTitle:
        '<img src="./img/icons/upload2.png " class="mb-3 "> <br> اسحب ملفك هنا أو ',
    dropZoneClickTitle:
        '&nbsp; &nbsp; <span class="h2 btn main-btn ">تصفح ملفاتك</span>',
    removeTitle: true,
    deleteUrl: "/delete_file",
    uploadAsync: true,
        deleteUrl: "/upload_transfer_file?delete=true"
    }).on("filebatchselected", function(event, files) {
        $(".input-b2").fileinput("upload");
    })
    $(".pay_with_transfer").on("click", function() {
        if ($(".pay_type:checked").val() == undefined) {
            alert("من فضلك 'طريقة الدفع'  ");
            return false;
        }
        if ($(".tr_title").val() == "" || $(".transfer_number").val() == "") {
            alert("ادخل بيانات التحويل البنكي  ");
            return false;
        }

        $("#loader").modal("show");

        $.ajax({
            url: "/confirm_pay",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                pay_type: $(".pay_type:checked").val(),
                title: $(".tr_title").val(),
                transfer_number: $(".transfer_number").val(),
                id:$("button.kv-file-remove")
                .attr("data-key"),
            },

            dataType: "json",

            success: function(json) {
                setTimeout(function() {
                    $("#loader").modal("hide");
                }, 500);
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    window.location = "/createorder";
                }

            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(
                //     thrownError +
                //         "\r\n" +
                //         xhr.statusText +
                //         "\r\n" +
                //         xhr.responseText
                // );
            }
        });
        return false;
    });
    $(".zoom").magnify({
        afterLoad: function() {
            console.log("Magnification powers activated!");
        }
    });
    $("#banner-slider").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true,
        loop: true,
        items: 1,
        navText: [
            '<i class="fas fa-angle-right"></i>',
            '<i class="fas fa-angle-left"></i>'
        ]
        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false
    });
    $("#owl-demo").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true

        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false
    });
    $("#chooseFile").bind("change", function() {
        var filename = $("#chooseFile").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass("active");
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass("active");
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });
    $("#chooseFile").on("change", function() {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;
        if (/^image/.test(files[0].type)) {
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function() {
                $(".upload-photo img").attr("src", this.result);
            };
        }
    });
    var files_to_hide = [];
    $(".lazy").lazy();
    $(".file_key").on("click", function() {
        if ($(".file_key:checked").length > 1) {
            $(".preview_button").hide();
            $(".show_splite_file2").hide();
        } else {
            $(".preview_button").show();
            $(".show_splite_file2").show();
        }

        if ($(".file_key:checked").length > 1) {
            $(".price_slider").hide();
        } else {
            $(".price_slider").show();
        }
    });
    $(".cov_file").on("click", function() {
        if ($(this).is(":checked")) {
            get_covers($(this).val());
        }
        if ($(".cov_file:checked").length > 1) {
            $(".cover_files_state_container").show();
        } else {
            $(".cover_files_state_container").hide();
        }
    });
    $("#checkAll3").on("click", function() {
        $(".file_key")
            .not(this)
            .prop("checked", this.checked);

        if ($(".file_key:checked").length > 1) {
            $(".price_slider").hide();
        } else {
            $(".price_slider").show();
        }
        if ($(".cov_file:checked").length == 1) {
            $(".cover_files_state_container").hide();
        } else {
            $(".cover_files_state_container").show();
        }
        if ($(".file_key:checked").length > 1) {
            $(".preview_button").hide();
            $(".show_splite_file2").hide();
        } else {
            $(".preview_button").show();
            $(".show_splite_file2").show();
        }
    });
    $("#checkAll2").on("click", function() {
        if ($(".file_key:checked").length > 1) {
            $(".preview_button").hide();
        } else {
            $(".preview_button").show();
        }
        $(".checkprop")
            .not(this)
            .prop("checked", this.checked);

        if ($(".file_key:checked").length > 1) {
            $(".price_slider").hide();
        } else {
            $(".price_slider").show();
        }
        if ($(".cov_file:checked").length == 1) {
            $(".cover_files_state_container").hide();
        } else {
            $(".cover_files_state_container").show();
        }
    });
    $("#checkAll").on("click", function() {
        if ($(".file_key:checked").length > 1) {
            $(".preview_button").hide();
            $(".show_splite_file2").hide();
        } else {
            $(".preview_button").show();
            $(".show_splite_file2").show();
        }

        $(".checkprop")
            .not(this)
            .prop("checked", this.checked);

        if ($(".file_key:checked").length > 1) {
            $(".price_slider").hide();
        } else {
            $(".price_slider").show();
        }
        if ($(".cov_file:checked").length > 1) {
            $(".cover_files_state_container").show();
        } else {
            $(".cover_files_state_container").hide();
        }
    });

    if ($(".file_key:checked").length > 1) {
        return false;
    }

    $(".preview_button").on("click", function() {
        if ($(".file_key:checked").length > 1) {
            return false;
        }
        $(".fd").attr("data", "");
        $(".kzt").attr("title", "");
        $(".kzt").text("");

        var data = $(".file_key:checked")
            .closest("div.file-preview-frame")
            .find("button.kv-file-remove")
            .parents(".file-preview-initial")
            .find("div.kv-file-content")
            .find("object")
            .attr("data");
        var catpion = $(".file_key:checked")
            .closest("div.file-preview-frame")
            .find("button.kv-file-remove")
            .parents(".file-preview-initial")
            .attr("title");

        $(".fd").attr(
            "data",
            $(".file_key:checked")
                .closest("div.file-preview-frame")
                .find("button.kv-file-remove")
                .parents(".file-preview-initial")
                .find("div.kv-file-content")
                .find("object")
                .attr("data")
        );
        $(".kzt").attr("title", catpion);
        $(".kzt").text(catpion);

        $("#preview").modal("show");
        setTimeout(() => {
            $(".fd").attr(
                "data",
                $(".file_key:checked")
                    .closest("div.file-preview-frame")
                    .find("button.kv-file-remove")
                    .parents(".file-preview-initial")
                    .find("div.kv-file-content")
                    .find("object")
                    .attr("data")
            );
        }, 200);
    });

    $(".delete_file_up").on("click", function() {
        $(".file_key:checked").each(function() {
            var id = $(this)
                .closest("div.file-preview-frame")
                .find("button.kv-file-remove")
                .attr("data-key");

            $("#loader").modal("show");
            $.ajax({
                url: "/delete_file",
                type: "post",
                data: {
                    _token: $("meta[name=csrf-token]").attr("content"),
                    key: id,
                    custom_product: $("#custom_product_id").val()
                },

                dataType: "json",

                success: function(json) {
                    // Need to set timeout otherwise it wont update the total
                    if (json.success == "1") {
                        //load the table

                        load_uploader();
                        load_files();
                        $("#loader").modal("hide");
                    }

                    // alert(json.message);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    // alert(
                    //     thrownError +
                    //         "\r\n" +
                    //         xhr.statusText +
                    //         "\r\n" +
                    //         xhr.responseText
                    // );
                }
            });
        });
    });
    $(".step-3").hide();
    $(".set_prop_c").hide();

    $(".prop_con").hide();
    if ($(".file_key:checked").length > 1) {
        $(".price_slider").hide();
    } else {
        $(".price_slider").show();
    }
    $("input.number").inputSpinner();
    if ($("#uploaded").val() == 1) {
        $(".set_prop_c").removeClass("disable-div");
        $(".set_prop_c").show();
    } else {
        $(".set_prop_c").addClass("disable-div");
        $(".set_prop_c").hide();
    }

    AOS.init({
        once: true
    });

    $(".open-sidebar").click(function() {
        $(".wrapper").toggleClass("active");
        $(".offcanvas").toggleClass("active");
    });

    $(document).on("click", function(event) {
        if (!$(event.target).closest(".offcanvas , .open-sidebar").length) {
            $(".wrapper").removeClass("active");
            $(".offcanvas").removeClass("active");
        }
    });

    $(".owl-carousel-classic").owlCarousel({
        items: 4,
        margin: 30,
        rtl: true,
        nav: true,
        navText: [
            '<i class="fas fa-angle-right"></i>',
            '<i class="fas fa-angle-left"></i>'
        ],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });
    $(".owl-carousel-banner").owlCarousel({
        items: 1,
        margin: 30,
        rtl: true,
        nav: true,
        navText: [
            '<i class="fas fa-angle-right"></i>',
            '<i class="fas fa-angle-left"></i>'
        ],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    var form = $("#wizard");
    var files_p = [];
    var custom_product_id = $("#custom_product_id").val();

    function load_uploader() {
        return $.ajax({
            url: "/getLoader",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                custom_product: custom_product_id
            },
            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    $(".uploader").html(json.data.uploader);
                    //   location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
    function load_files() {
        var files_to_hide = [];
        return $.ajax({
            url: "/get_uploaded_files/" + custom_product_id,
            type: "post",
            data: "_token=" + $("meta[name=csrf-token]").attr("content"),
            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total

                if (json["success"]) {
                    $(".files_container").html("");
                    $(".spliter_container").html("");
                    $(".covers_files_container").html("");
                    $(".covers_files").html("");
                    if (json.data.files.length > 0) {
                        $("#uploaded").val(1);
                        $(".set_prop_c").removeClass("disable-div");
                        $(".set_prop_c").show();
                    } else {
                        $("#uploaded").val(0);
                        $(".set_prop_c").addClass("disable-div");
                        $(".set_prop_c").hide();
                    }
                    json.data.files.forEach(element => {
                        files_p.push(
                            "/uploads/custom_product_file/" + element.file
                        );

                        $(".files_container").append(
                            '<input type="hidden" class="max_num_' +
                                element.id +
                                '" value="' +
                                element.number_of_pages +
                                '" />' +
                                '<tr id="' +
                                element.id +
                                '"> <td class="collapsed" data-bs-toggle="collapse" href="#row' +
                                element.id +
                                '" role="button " aria-expanded="false " aria-controls="collapseExample "> <span class="icon "></span>' +
                                "</td>" +
                                "  <td>" +
                                '<div class="pretty p-default p-smooth p-round">' +
                                '   <input type="checkbox" value="' +
                                element.id +
                                '" class="filecheckbox checkprop" name="selectedFiles[]" id="checkAll2">' +
                                '   <div class="state p-warning">' +
                                "       <label></label>" +
                                "   </div>" +
                                "</div>" +
                                "</td>" +
                                "<td>" +
                                element.file +
                                "</td>" +
                                "<td class='max_num_" +
                                element.id +
                                "'>" +
                                element.number_of_pages +
                                "</td>" +
                                "<td>" +
                                '   <button><i class="fas fa-trash-alt delete_file" file_id="' +
                                element.id +
                                '" type="button"></i></button>' +
                                "</td></tr>" +
                                ' <tr class="collapse" id="row' +
                                element.id +
                                '">' +
                                '<td colspan="5 " class=" text-start ">' +
                                '   <span class="h5 pink-color mx-3 ">  خصائص الطباعة</span>: <span class="light prop' +
                                element.id +
                                '">' +
                                element.prop +
                                "</span>" +
                                "</td></tr>"
                        );

                        if (element.price_id > 0) {
                            $(".step-3").show();
                        }
                        var d = "";
                        if (element.has_cover == "1") {
                            d = 'style="display:none"';
                        }
                        if (element.price_id > 0) {
                            $(".covers_files_container").append(
                                "<tr " +
                                    d +
                                    ' id="cov_f_' +
                                    element.id +
                                    '"> <td class="collapsed" data-bs-toggle="collapse" href="#row' +
                                    element.id +
                                    '" role="button " aria-expanded="false " aria-controls="collapseExample "> <span class="icon "></span>' +
                                    "</td>" +
                                    "  <td>" +
                                    '<div class="pretty p-default p-smooth p-round">' +
                                    '   <input type="checkbox" value="' +
                                    element.id +
                                    '" class="filecheckbox cov_file" name="selectedFiles[]" id="checkAll">' +
                                    '   <div class="state p-warning">' +
                                    "       <label></label>" +
                                    "   </div>" +
                                    "</div>" +
                                    "</td>" +
                                    "<td>" +
                                    element.file +
                                    "</td>" +
                                    "<td class='max_num_" +
                                    element.id +
                                    "'>" +
                                    element.number_of_pages +
                                    "</td>" +
                                    "<td>" +
                                    ' <button class="edit_file" file_id="' +
                                    element.id +
                                    '" type="button"><i class="fas fa-edit "></i></button>' +
                                    '   <button><i class="fas fa-trash-alt delete_file" file_id="' +
                                    element.id +
                                    '" type="button"></i></button>' +
                                    "</td>" +
                                    "</tr>" +
                                    ' <tr class="collapse" id="row' +
                                    element.id +
                                    '">' +
                                    '<td colspan="5 " class=" text-start ">' +
                                    '   <span class="h5 pink-color mx-3 ">  خصائص الطباعة</span>: <span class="light prop' +
                                    element.id +
                                    '">' +
                                    element.prop +
                                    "</span>" +
                                    "</td></tr>"
                            );
                        }

                        $(".spliter_container").append(
                            '<input type="hidden" class="max_num_' +
                                element.id +
                                '" value="' +
                                element.number_of_pages +
                                '" />' +
                                '<div class="modal fade file-modal" id="file' +
                                element.id +
                                '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                                ' <div class="modal-dialog" role="document">' +
                                '   <div class="modal-content">' +
                                '     <div class="modal-header">' +
                                '      <h3 class="modal-title" id="exampleModalLabel">' +
                                '         <span class="pink-color">تقسيم الملفات </span>' +
                                "     </h3>" +
                                '     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
                                "  </div>" +
                                '  <div class="modal-body">' +
                                '     <div class="row mb-4 file_parts_body' +
                                element.id +
                                '">' +
                                "      </div>" +
                                '     <div class="row mb-4">' +
                                '         <div class="col-6">' +
                                '          <input type="number"  class="number  split_from_' +
                                element.id +
                                '" value="1">' +
                                "      </div>" +
                                '     <div class="col-6">' +
                                '         <input type="number" class="number  split_to_' +
                                element.id +
                                '" value="1">' +
                                "      </div>" +
                                "   </div>" +
                                '   <a href="javascript:void(0)" file_id="' +
                                element.id +
                                '" class="btn btn-primary btn-lg split_file">' +
                                '       <i class="fas fa-plus-circle"></i> إضافة تقسيم' +
                                "    </a>" +
                                "  </div>" +
                                '  <div class="modal-footer">' +
                                '<div class="clearfix checkbox-hidden">' +
                                '<div class="float-end">' +
                                '   <div class="pretty p-default p-has-focus">' +
                                '      <input type="checkbox" value="1" name="merge" class="merge' +
                                element.id +
                                '" />' +
                                '     <div class="state">' +
                                '        <label class="btn btn-primary">دمج الملفات</label>' +
                                "      </div>" +
                                " </div>" +
                                "</div>" +
                                "</div> " +
                                '      <button class="btn main-btn btn-lg " onclick="split_confirm(this)" file_id="' +
                                element.id +
                                '"  type="button">تقسيم الملفات</button>' +
                                "    </div>" +
                                "    </div>" +
                                "  </div>" +
                                " </div>"
                        );
                    });
                    json.data.covers.forEach(function(element) {
                        $(".covers_files").append(
                            "<tr>" +
                                '<td><input class="number quantity" c_id="' +
                                element.id +
                                '" type="number" min="1" value="' +
                                element.quantity +
                                '"></td>' +
                                '               <td class="text-center">' +
                                '                  <img src="' +
                                element.photo +
                                '">' +
                                "                  <p>" +
                                element.name +
                                " </p>" +
                                "              </td>" +
                                '              <td class="no-padding sortable" colspan="3">' +
                                element.files +
                                "              </td>" +
                                "              <td>" +
                                '                  <button class="file-remove gray-color larger delete_cover" cover_id="' +
                                element.id +
                                '">' +
                                '                      <i class="fas fa-times-circle"></i> <br> إزالة التغليف ' +
                                "                  </button>" +
                                "              </td>" +
                                "          </tr>"
                        );
                    });

                    $("button.kv-file-remove").each(function(element) {
                        var t = this;
                    });
                    function split_confirm() {
                        var file_id = $(this).attr("file_id");
                        var from = $(".from_v_element_" + file_id);
                        var to = $(".to_v_element_" + file_id);
                        var merge = $(".merge" + file_id + ":checked").val();

                        var from_array = [];
                        var to_array = [];
                        for (var i = 0; i < from.length; i++) {
                            from_array.push($(from[i]).val());
                        }
                        for (var i = 0; i < to.length; i++) {
                            to_array.push($(to[i]).val());
                        }
                        if (from_array.length > 0) {
                            $("#loader").modal("show");
                            $.ajax({
                                url: "/split_file/" + file_id,
                                type: "post",
                                data: {
                                    _token: $("meta[name=csrf-token]").attr(
                                        "content"
                                    ),
                                    from: from_array,
                                    to: to_array,
                                    merge: merge
                                },
                                dataType: "json",

                                success: function(json) {
                                    setTimeout(function() {
                                        $("#loader").modal("hide");
                                    }, 500);
                                    // Need to set timeout otherwise it wont update the total
                                    if (json["success"] == "1") {
                                        $("#file" + file_id).modal("hide");
                                        //   location.reload();
                                    }
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    //    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                }
                            });
                        } else {
                            alert("اضف تقسيم اولا");
                        }
                    }
                    $(".order").on("change", function() {
                        var files = [];
                        $(".files_cov_").each(function(el) {
                            files.push($(this).val());
                        });

                        $.ajax({
                            url: "/custom_product/order_file",
                            type: "post",
                            data: {
                                _token: $("meta[name=csrf-token]").attr(
                                    "content"
                                ),
                                files: files
                            },

                            dataType: "json",

                            success: function(json) {
                                // Need to set timeout otherwise it wont update the total
                                if (json.success == "1") {
                                    setTimeout(function() {
                                        $("#loader").modal("hide");
                                    }, 500);
                                    //load the table
                                    load_files();

                                    var x = document.getElementById("snackbar");
                                    $("#snackbar").text(json.message);
                                    x.className = "show";
                                    setTimeout(function() {
                                        x.className = x.className.replace(
                                            "show",
                                            ""
                                        );
                                    }, 3000);
                                } else {
                                    var x = document.getElementById("snackbar");
                                    $("#snackbar").text(json.message);
                                    x.className = "show";
                                    setTimeout(function() {
                                        x.className = x.className.replace(
                                            "show",
                                            ""
                                        );
                                    }, 3000);
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                //  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                            }
                        });

                        return false;
                    });

                    $(".edit_file_cover").on("click", function() {
                        var file_id = $(this).attr("file_id");

                        $("#cov_f_" + file_id).show();
                        var cover_id = $(this).attr("cover_id");
                        $.ajax({
                            url: "/delete_cover",
                            type: "post",
                            data: {
                                _token: $("meta[name=csrf-token]").attr(
                                    "content"
                                ),
                                cover_id: cover_id,
                                custom_product: $("#custom_product_id").val()
                            },

                            dataType: "json",

                            success: function(json) {
                                // Need to set timeout otherwise it wont update the total
                                if (json.success == "1") {
                                    load_files();
                                    setTimeout(function() {
                                        $("#loader").modal("hide");
                                    }, 500);
                                }

                                // alert(json.message);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                            }
                        });
                    });
                    $(".edit_file").on("click", function() {
                        var file_id = $(this).attr("file_id");
                        $.ajax({
                            url: "/set_prop/" + file_id,
                            type: "post",
                            data: {
                                _token: $("#token").val(),
                                remove: true
                            },

                            dataType: "json",

                            success: function(json) {
                                setTimeout(function() {
                                    $("#loader").modal("hide");
                                }, 500);
                                // Need to set timeout otherwise it wont update the total
                                if (json["success"] == "1") {
                                    // $("button.kv-file-remove").each(function(element){
                                    //     if($(this).attr("data-key") == file_id){
                                    //         console.log(this);

                                    //            $(this).parent().parent().parent().parent().show();

                                    //               files_to_hide.shift(files_to_hide.indexOf(file_id));
                                    //     }

                                    // });
                                    $("#cov_f_" + file_id).remove();
                                    load_files();
                                    load_uploader();
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                // alert(
                                //     thrownError +
                                //         "\r\n" +
                                //         xhr.statusText +
                                //         "\r\n" +
                                //         xhr.responseText
                                // );
                            }
                        });

                        $("#" + file_id).show();

                        $("body").animate(
                            {
                                scrollTop: $(".files_container").offset().top
                            },
                            2000
                        );
                    });
                    $(".split_file").on("click", function() {
                        splite_file_html($(this).attr("file_id"));
                    });

                    $(".delete_cover").on("click", function() {
                        var cover_id = $(this).attr("cover_id");
                        $("#loader").modal("show");
                        $.ajax({
                            url: "/delete_cover",
                            type: "post",
                            data: {
                                _token: $("meta[name=csrf-token]").attr(
                                    "content"
                                ),
                                cover_id: cover_id,
                                custom_product: $("#custom_product_id").val()
                            },

                            dataType: "json",

                            success: function(json) {
                                // Need to set timeout otherwise it wont update the total
                                if (json.success == "1") {
                                    load_files();
                                    setTimeout(function() {
                                        $("#loader").modal("hide");
                                    }, 500);
                                }

                                alert(json.message);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                            }
                        });
                        return false;
                    });

                    $(".delete_file").on("click", function() {
                        var file_id = $(this).attr("file_id");
                        $("#loader").modal("show");
                        $.ajax({
                            url: "/delete_file",
                            type: "post",
                            data: {
                                _token: $("meta[name=csrf-token]").attr(
                                    "content"
                                ),
                                key: file_id,
                                custom_product: $("#custom_product_id").val()
                            },

                            dataType: "json",

                            success: function(json) {
                                // Need to set timeout otherwise it wont update the total
                                if (json.success == "1") {
                                    //load the table
                                    load_uploader();
                                    load_files();
                                    $("#loader").modal("hide");
                                }

                                // alert(json.message);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                // alert(
                                //     thrownError +
                                //         "\r\n" +
                                //         xhr.statusText +
                                //         "\r\n" +
                                //         xhr.responseText
                                // );
                            }
                        });
                        return false;
                    });
                    $(".checkAll2").on("click", function() {
                        $(".checkprop")
                            .not(this)
                            .prop("checked", this.checked);
                    });
                    $("#checkAll").click(function() {
                        $(".kv-file-content input:checkbox")
                            .not(this)
                            .prop("checked", this.checked);
                        if ($(".cov_file:checked").length > 1) {
                            $(".cover_files_state_container").show();
                        } else {
                            $(".cover_files_state_container").hide();
                        }
                    });
                    $(".file_key").on("click", function() {
                        if ($(".file_key:checked").length > 1) {
                            $(".price_slider").hide();
                        } else {
                            $(".price_slider").show();
                        }
                    });
                    $(".show_splite_file").on("click", function() {
                        var id = $(this)
                            .closest("div.file-preview-frame")
                            .find("button.kv-file-remove")
                            .attr("data-key");
                        $("#file" + id).modal("show");
                    });
                    $("input.number").inputSpinner();
                    $(".cov_file").on("click", function() {
                        if ($(this).is(":checked")) {
                            get_covers($(this).val());
                        }

                        if ($(".cov_file:checked").length == 1) {
                            $(".cover_files_state_container").hide();
                        } else {
                            $(".cover_files_state_container").show();
                        }
                        $(".file_key").on("click", function() {
                            if ($(".file_key:checked").length > 1) {
                                $(".price_slider").hide();
                            } else {
                                $(".price_slider").show();
                            }
                        });
                    });
                    $(".quantity").on("change", function() {
                        var id = $(this).attr("c_id");
                        var t = $(this).attr("ty");

                        var q = $(this).val();
                        if (q <= 0) {
                            q = 1;
                            $(this).val(1);
                        }
                        $.ajax({
                            url: "/custom_productm/update_quantity",
                            type: "post",
                            data: {
                                _token: $("meta[name=csrf-token]").attr(
                                    "content"
                                ),
                                id: id,
                                q: q
                                // custom_product : custom_product_id
                            },

                            dataType: "json",

                            success: function(json) {
                                // Need to set timeout otherwise it wont update the total
                                if (json.success == "1") {
                                    if (t == "cart") {
                                        location.reload();
                                    } else {
                                        load_files();
                                    }
                                }
                            }
                        });
                    });
                    $("#loader").modal("hide");

                    get_total_price();
                    $(".sortable").sortable({
                        opacity: 0.6,
                        update: function(event, ui) {
                            var files = [];
                            $(".order").each(function(el) {
                                files.push($(this).val());
                            });

                            $.ajax({
                                url: "/custom_product/order_file",
                                type: "post",
                                data: {
                                    _token: $("meta[name=csrf-token]").attr(
                                        "content"
                                    ),
                                    files: files
                                },

                                dataType: "json",

                                success: function(json) {
                                    load_files();
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    //  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                }
                            });
                        }
                    });
                    $(".file_key").on("click", function() {
                        if ($(".file_key:checked").length > 1) {
                            $(".preview_button").hide();
                            $(".show_splite_file2").hide();
                        } else {
                            $(".preview_button").show();
                            $(".show_splite_file2").show();
                        }

                        if ($(".file_key:checked").length > 1) {
                            $(".price_slider").hide();
                        } else {
                            $(".price_slider").show();
                        }
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                load_files();
                //   alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
    function get_price_preview() {
        var ids = [];
        $(".file_key:checked").each(function(element) {
            var id = $(this)
                .closest("div.file-preview-frame")
                .find("button.kv-file-remove")
                .attr("data-key");

            ids.push(id);
        });

        $.ajax({
            url: "/get_price_preview/" + ids,
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                paper_type: $(".paper_type_v:checked").val(),
                paper_size: $(".paper_size_v:checked").val(),
                printer_color: $(".printer_color_v:checked").val(),
                paper_slice: $(".paper_slice_v:checked").val(),
                quantity: $(".quantity" + $(this).val()).val(),
                from: $(".from").val(),
                to: $(".to").val(),
                custom_product: $("#custom_product_id").val(),
                printer_method: $(".printer_method_v:checked").val(),
                printer_type: $(".printer_type_v:checked").val()
            },

            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json["success"] == "1") {
                    $(".total_price_prop").text(json.total_prop + "ريال");
                    // $(".total_price_cover").text(
                    //     json.total_cover + "ريال"
                    // );
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(
                //     thrownError +
                //         "\r\n" +
                //         xhr.statusText +
                //         "\r\n" +
                //         xhr.responseText
                // );
            }
        });
    }
    function get_total_price() {
        return $.ajax({
            url: "/get_total_price/" + custom_product_id,
            type: "post",
            data: "_token=" + $("meta[name=csrf-token]").attr("content"),
            dataType: "json",

            success: function(json) {
                if (json.success == "1") {
                    // Need to set timeout otherwise it wont update the total
                    $(".total_price_prop").text(json.total_prop + "ريال");
                    $(".total_price_cover").text(json.total_cover + "ريال");
                    $(".show_splite_file").on("click", function() {
                        var id = $(this)
                            .closest("div.file-preview-frame")
                            .find("button.kv-file-remove")
                            .attr("data-key");
                        $("#file" + id).modal("show");
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(
                    thrownError +
                        "\r\n" +
                        xhr.statusText +
                        "\r\n" +
                        xhr.responseText
                );
            }
        });
    }
    $(".complete_print").on("click", function(event) {
        event.preventDefault();
        $("#loader").modal("show");
        $.ajax({
            url: "/custom-product/add_to_cart",
            type: "post",
            headers: {
                Authorization:
                    "Bearer " + $("meta[name=csrf-token]").attr("content")
            },
            data:
                "_token=" +
                $("meta[name=csrf-token]").attr("content") +
                "&type=" +
                1 +
                "&product_id=" +
                custom_product_id +
                "&quantity=1",
            dataType: "json",
            beforeSend: function(xhr) {
                xhr.setRequestHeader(
                    "Authorization",
                    "Bearer" + " " + $("meta[name=csrf-token]").attr("content")
                );
            },
            complete: function() {},
            success: function(json) {
                if (json.success == "1") {
                    window.location = "/cart";

                    //    location.reload();
                } else {
                    setTimeout(function() {
                        $("#loader").modal("hide");
                    }, 500);
                    $("#snackbar").text("");
                    var x = document.getElementById("snackbar");
                    $("#snackbar").text(json["message"]);
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                    }, 3000);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var res = JSON.parse(xhr.responseText);
                console.log(res);
                if (res.message == "Unauthenticated.") {
                    window.location = "/login";
                } else {
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            }
        });
        return false;
    });

    // checkbox
    $("#checkAll").click(function() {
        $(".kv-file-content input:checkbox")
            .not(this)
            .prop("checked", this.checked);
        if ($(".cov_file:checked").length > 1) {
            $(".cover_files_state_container").show();
        } else {
            $(".cover_files_state_container").hide();
        }
    });
    $("#checkAll2").on("click", function() {
        $(".checkprop")
            .not(this)
            .prop("checked", this.checked);

        if ($(".file_key:checked").length > 1) {
            $(".price_slider").hide();
        } else {
            $(".price_slider").show();
        }
    });

    $(".table thead tr td .pretty input").click(function() {
        $(".table tbody tr td .pretty input:checkbox")
            .not(this)
            .prop("checked", this.checked);
    });

    // Fileinput bootstrap
    var files_p = [];

    if (custom_product_id > 0) {
        load_files();
    }

    $(".input-b1")
        .fileinput({
            uploadUrl: "/upload_file_custom_product/" + custom_product_id,
            showUpload: false,
            showRemove: false,
            showBrowse: true,
            showClose: false,
            uploadExtraData: {
                _token: $("meta[name=csrf-token]").attr("content")
            },
            deleteExtraData: {
                _token: $("meta[name=csrf-token]").attr("content"),
                custom_product: custom_product_id
            },
            browseLabel: "تصفح ملفاتك",
            autoReplace: false,
            allowedFileExtensions: ["pdf", "pptx", "doc", "ppt", "docx"],
            initialPreviewFileType: "image",
            allowedFileExtensions: ["pdf", "pptx", "doc", "ppt", "docx"],
            slugCallback: function(filename) {
                return filename.replace("(", "_").replace("]", "_");
            },
            showCaption: false,
            elPreviewStatus: false,

            ajaxDeleteSettings: {
                headers: {
                    "X-CSRFToken": $("meta[name=csrf-token]").attr("content")
                }
            },
            msgZoomModalHeading: "",
            uploadAsync: false,

            dropZoneTitle:
                '<img src="./img/icons/upload2.png " class="mb-3 "> <br> اسحب ملفك هنا أو ',
            dropZoneClickTitle:
                '&nbsp; &nbsp; <span class="h2 btn main-btn ">تصفح ملفاتك</span>',
            removeTitle: true,
            deleteUrl: "/delete_file",
            uploadAsync: true,
            maxFileCount: 100,
            initialPreviewAsData: true,

            overwriteInitial: false
        })
        .on("filebatchselected", function(event, files) {
            $(".input-b1").fileinput("upload");
        })
        .on("fileuploaded", function(event, previewId, index, fileId) {
            // get all files
            load_files();

            $(".show_splite_file").on("click", function() {
                var id = $(this)
                    .closest("div.file-preview-frame")
                    .find("button.kv-file-remove")
                    .attr("data-key");
                $("#file" + id).modal("show");
            });
            $(".file_key").on("click", function() {
                if ($(".file_key:checked").length > 1) {
                    $(".preview_button").hide();
                    $(".show_splite_file2").hide();
                } else {
                    $(".preview_button").show();
                    $(".show_splite_file2").show();
                }

                if ($(".file_key:checked").length > 1) {
                    $(".price_slider").hide();
                } else {
                    $(".price_slider").show();
                }
            });
        })
        .on("fileloaded", function(
            event,
            file,
            previewId,
            fileId,
            index,
            reader
        ) {
            load_files();
        })
        .on("fileuploaderror", function(event, data, msg) {
            console.log(
                "File Upload Error",
                "ID: " + data.fileId + ", Thumb ID: " + data.previewId
            );
        })
        .on("filebatchselected", function(event, files) {
            $(".input-b1 ").fileinput("upload");
        })
        .on("filebeforedelete", function() {
            var aborted = !window.confirm("هل انت متاكد من حذف هذا الملف ؟");

            if (aborted) {
                window.alert("تم الغاء حذف الملف ");
            }

            return aborted;
        })
        .on("filedeleted", function() {
            load_files();
        });
    $(".show_splite_file").on("click", function() {
        var id = $(this)
            .closest("div.file-preview-frame")
            .find("button.kv-file-remove")
            .attr("data-key");
        $("#file" + id).modal("show");
    });

    if ($(".paper_size_v").val() > 0) {
        if ($(".file_key:checked").length > 1) {
            $(".price_slider").hide();
        } else {
            $(".price_slider").show();
        }
        $.ajax({
            url: "/get_prop/" + $(".paper_size_v").val(),
            type: "post",
            data: "_token=" + $("#token").val(),
            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json["success"] == "1") {
                    $(".paper_type").html("");
                    json.data.paper_type.forEach(element => {
                        $(".paper_type").append(
                            '<div class="pretty p-icon p-toggle p-smooth p-plain ">' +
                                '<input type="radio" value="' +
                                element.id +
                                '" name="paper_type" />' +
                                ' <div class="state ">' +
                                '  <span class="icon ">' +
                                element.name +
                                "</span>" +
                                "  <label></label>" +
                                " </div>" +
                                " </div>"
                        );
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }

    $(".paper_size_v").on("click", function() {
        if ($(".file_key:checked").length > 1) {
            $(".price_slider").hide();
        } else {
            $(".price_slider").show();
        }
        if ($(".file_key").is(":checked")) {
            $.ajax({
                url: "/get_prop/" + $(this).val(),
                type: "post",
                data: "_token=" + $("meta[name=csrf-token]").attr("content"),
                dataType: "json",

                success: function(json) {
                    $(".paper_type").html("");
                    $(".printer_type").html("");
                    $(".paper_slice").html("");
                    $(".covers_radios").html("");
                    $(".printer_color").html("");

                    // Need to set timeout otherwise it wont update the total

                    if (json["success"] == "1") {
                        $(".prop_con").show();
                        $(".set_prop_c").show();

                        json.data.paper_type.forEach(element => {
                            $(".paper_type").append(
                                '<div class="pretty p-icon p-toggle p-smooth p-plain ">' +
                                    '<input type="radio" value="' +
                                    element.id +
                                    '" class="paper_type_v"  name="paper_type" />' +
                                    ' <div class="state ">' +
                                    '  <span class="icon ">' +
                                    element.name +
                                    "</span>" +
                                    "  <label></label>" +
                                    " </div>" +
                                    " </div>"
                            );
                        });
                        var photo = "";
                        json.data.covers.forEach(element => {
                            var photo = "/uploads/cover_type/" + element.photo;
                            $(".covers_radios").append(
                                '<div class="pretty p-icon p-toggle p-smooth p-plain ">' +
                                    '  <input type="radio"  value="' +
                                    element.id +
                                    '" class="cover_id" name="cover_id" />' +
                                    '  <div class="state ">' +
                                    '     <p class="icon">' +
                                    '         <img src="' +
                                    photo +
                                    '">' +
                                    "         <span>" +
                                    element.name +
                                    "</span>" +
                                    "     </p>" +
                                    "      <label></label>" +
                                    "  </div>" +
                                    " </div>"
                            );
                        });

                        $(".cover_id").on("click", function() {
                            if ($(".cov_file:checked").length > 0) {
                                var ids = [];
                                $(".cov_file:checked").each(function(element) {
                                    ids.push($(this).val());
                                });
                                if ($(".cover_id:checked").val() > 0) {
                                    $.ajax({
                                        url: "/get_cover_price_preview/" + ids,
                                        type: "post",
                                        data: {
                                            _token: $(
                                                "meta[name=csrf-token]"
                                            ).attr("content"),
                                            cover_id: $(
                                                ".cover_id:checked"
                                            ).val(),
                                            cover_side: $(
                                                ".cover_side:checked"
                                            ).val(),
                                            cover_files_state: $(
                                                ".cover_files_state:checked"
                                            ).val(),
                                            custom_product: $(
                                                "#custom_product_id"
                                            ).val()
                                        },

                                        dataType: "json",

                                        success: function(json) {
                                            if (json.success == 1) {
                                                $(".total_price_cover").text(
                                                    json.total_cover + "ريال"
                                                );
                                            }
                                        },
                                        error: function(
                                            xhr,
                                            ajaxOptions,
                                            thrownError
                                        ) {
                                            //  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                        }
                                    });
                                }
                            } else {
                                var x = document.getElementById("snackbar");
                                $("#snackbar").text("رجاء اختيار الملف اولا");
                                x.className = "show";
                                setTimeout(function() {
                                    x.className = x.className.replace(
                                        "show",
                                        ""
                                    );
                                }, 3000);
                            }
                        });
                        $(".paper_type_v").on("click", function() {
                            if ($(".file_key").is(":checked")) {
                                $.ajax({
                                    url:
                                        "/get_paper_type_prop/" +
                                        $(".paper_size_v:checked").val() +
                                        "/" +
                                        $(".paper_type_v:checked").val(),
                                    type: "post",
                                    data:
                                        "_token=" +
                                        $("meta[name=csrf-token]").attr(
                                            "content"
                                        ),
                                    dataType: "json",

                                    success: function(json) {
                                        $(".printer_type").html("");
                                        $(".paper_slice").html("");
                                        // $('.covers_radios').html('');
                                        $(".printer_color").html("");

                                        // Need to set timeout otherwise it wont update the total

                                        if (json["success"] == "1") {
                                            $(".prop_con").show();
                                            $(".set_prop_c").show();

                                            var color = "black-white";
                                            json.data.printer_color.forEach(
                                                element => {
                                                    if (element.type == 1) {
                                                        color = "colors";
                                                    }
                                                    $(".printer_color").append(
                                                        ' <div class="pretty p-icon p-toggle p-smooth p-plain ' +
                                                            color +
                                                            ' ">' +
                                                            ' <input type="radio"  value="' +
                                                            element.id +
                                                            '" class="printer_color_v"  name="printer_color" />' +
                                                            ' <div class="state ">' +
                                                            '<span class="icon "> ' +
                                                            element.name +
                                                            " </span>" +
                                                            " <label></label>" +
                                                            "</div>" +
                                                            "</div>"
                                                    );
                                                }
                                            );
                                            json.data.printer_type.forEach(
                                                element => {
                                                    $(".printer_type").append(
                                                        '  <div class="pretty p-icon p-toggle p-smooth p-plain ">' +
                                                            '<input type="radio" value="' +
                                                            element.id +
                                                            '" class="printer_type_v"  name="printer_type" />' +
                                                            '<div class="state ">' +
                                                            '<span class="icon ">' +
                                                            element.name +
                                                            "</span>" +
                                                            "<label></label>" +
                                                            "  </div>" +
                                                            " </div>"
                                                    );
                                                }
                                            );
                                            json.data.paper_slice.forEach(
                                                element => {
                                                    $(".paper_slice").append(
                                                        '<div class="pretty p-icon p-toggle p-smooth p-plain ">' +
                                                            '<input type="radio"  value="' +
                                                            element.id +
                                                            '" class="paper_slice_v"  name="paper_slice" />' +
                                                            '<div class="state ">' +
                                                            '<span class="icon">' +
                                                            '<img src="/././uploads/papers_slice/' +
                                                            element.photo +
                                                            '">' +
                                                            "</span>" +
                                                            "<label></label>" +
                                                            "</div>" +
                                                            "</div>"
                                                    );
                                                }
                                            );
                                            get_price_preview();

                                            $(
                                                ".paper_slice_v , .printer_type_v , .printer_color_v"
                                            ).on("click", function() {
                                                get_price_preview();
                                            });
                                        }
                                    },
                                    error: function(
                                        xhr,
                                        ajaxOptions,
                                        thrownError
                                    ) {
                                        //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                    }
                                });
                            } else {
                                alert("رجاء اختيار ملف اولا");
                            }
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        } else {
            alert("رجاء اختيار ملف اولا");
        }
    });
    $(".quantity").on("change", function() {
        var id = $(this).attr("c_id");
        var t = $(this).attr("ty");

        var q = $(this).val();
        if (q <= 0) {
            q = 1;
            $(this).val(1);
        }
        $.ajax({
            url: "/custom_productm/update_quantity",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                id: id,
                q: q,
                custom_product: custom_product_id
            },

            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    if (t == "cart") {
                        location.reload();
                    } else {
                        load_files();
                    }
                }
            }
        });
    });
    $(".set_prop").on("click", function() {
        if ($(".file_key:checked").length > 0) {
            $(".file_key:checked").each(function() {
                var radio = $(this);
                var id = $(this)
                    .closest("div.file-preview-frame")
                    .find("button.kv-file-remove")
                    .attr("data-key");
                var from = $(".from").val();
                var to = $(".to").val();
                var max = $(".max_num_" + id).val();
                if (parseInt(to) > parseInt(max)) {
                    alert("اكبر عدد للاوراق هوه :" + $(".max_num_" + id).val());
                    return false;
                } else {
                    $("#loader").modal("show");
                    $.ajax({
                        url: "/set_prop/" + id,
                        type: "post",
                        data: {
                            _token: $("#token").val(),
                            paper_type: $(".paper_type_v:checked").val(),
                            paper_size: $(".paper_size_v:checked").val(),
                            printer_color: $(".printer_color_v:checked").val(),
                            paper_slice: $(".paper_slice_v:checked").val(),
                            quantity: $(".quantity" + $(this).val()).val(),
                            from: $(".from").val(),
                            to: $(".to").val(),

                            printer_method: $(
                                ".printer_method_v:checked"
                            ).val(),
                            printer_type: $(".printer_type_v:checked").val()
                        },

                        dataType: "json",

                        success: function(json) {
                            setTimeout(function() {
                                $("#loader").modal("hide");
                            }, 500);
                            // Need to set timeout otherwise it wont update the total
                            if (json["success"] == "1") {
                                load_files();

                                $(".step-3").show();
                                $("#" + id).hide();
                                // $("button.kv-file-remove").each(function(element){
                                //     if($(this).attr("data-key") == id){
                                //         files_to_hide.push(id);
                                //            $(this).parent().parent().parent().parent().hide();
                                //            radio.prop("checked",false )
                                //     }

                                // });
                                load_uploader();

                                $(".prop" + id).text(json.prop);
                            }
                            var x = document.getElementById("snackbar");
                            $("#snackbar").text(json.message);
                            x.className = "show";
                            setTimeout(function() {
                                x.className = x.className.replace("show", "");
                            }, 3000);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            // alert(
                            //     thrownError +
                            //         "\r\n" +
                            //         xhr.statusText +
                            //         "\r\n" +
                            //         xhr.responseText
                            // );
                        }
                    });
                }
            });
        } else {
            var x = document.getElementById("snackbar");
            $("#snackbar").text("رجاء اختيار الملف اولا");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        return false;
    });

    $(".delete_cover_cart").on("click", function() {
        var cover_id = $(this).attr("cover_id");
        $("#loader").modal("show");
        $.ajax({
            url: "/delete_cover",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                cover_id: cover_id,
                custom_product: $(this).attr("custom_product_id")
            },

            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    setTimeout(function() {
                        $("#loader").modal("hide");
                    }, 500);
                    load_uploader();
                    load_files();
                }
            }
        });
    });

    $(".split_file").on("click", function() {
        splite_file_html();
    });

    $(".use_code").on("click", function(event) {
        event.preventDefault();
        $("#loader").modal("show");
        $.ajax({
            url: "/use_code",
            type: "post",
            headers: {
                Authorization:
                    "Bearer " + $("meta[name=csrf-token]").attr("content")
            },
            data:
                "_token=" +
                $("meta[name=csrf-token]").attr("content") +
                "&code=" +
                $(".code").val() +
                "&total=" +
                $(".total").val(),
            dataType: "json",
            beforeSend: function(xhr) {
                xhr.setRequestHeader(
                    "Authorization",
                    "Bearer" + " " + $("meta[name=csrf-token]").attr("content")
                );
            },
            complete: function() {},
            success: function(json) {
                if (json["success"] == 1) {
                    setTimeout(function() {
                        $("#loader").modal("hide");
                    }, 500);
                    $(".after_discount").text(json["total"]);
                    var x = document.getElementById("snackbar");
                    $("#snackbar").text(json["message"]);
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                    }, 3000);
                    //    location.reload();
                } else {
                    setTimeout(function() {
                        $("#loader").modal("hide");
                    }, 500);
                    var x = document.getElementById("snackbar");
                    $("#snackbar").text(json["message"]);
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                    }, 3000);
                    $(".after_discount").text(json["total"]);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var res = JSON.parse(xhr.responseText);
                if (res.message == "Unauthenticated.") {
                    window.location = "/login";
                } else {
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            }
        });
        return false;
    });
    $(".go_checkout").on("click", function(event) {
        event.preventDefault();
        $("#loader").modal("show");
        $.ajax({
            url: "/add_note",
            type: "post",
            headers: {
                Authorization:
                    "Bearer " + $("meta[name=csrf-token]").attr("content")
            },
            data:
                "_token=" +
                $("meta[name=csrf-token]").attr("content") +
                "&note=" +
                $(".note").val(),
            dataType: "json",
            beforeSend: function(xhr) {
                xhr.setRequestHeader(
                    "Authorization",
                    "Bearer" + " " + $("meta[name=csrf-token]").attr("content")
                );
            },
            complete: function() {},
            success: function(json) {
                if (json["success"] == 1) {
                    setTimeout(function() {
                        $("#loader").modal("hide");
                    }, 500);
                    $(".after_discount").text(json["total"]);
                    var x = document.getElementById("snackbar");
                    $("#snackbar").text(json["message"]);
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                    }, 3000);
                    window.location = "/checkout";
                } else {
                    var x = document.getElementById("snackbar");
                    $("#snackbar").text(json["message"]);
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                    }, 3000);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var res = JSON.parse(xhr.responseText);
                console.log(res);
                if (res.message == "Unauthenticated.") {
                    window.location = "/login";
                } else {
                    // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            }
        });
        return false;
    });
    $(".seconed-tab").on("click", function(e) {
        $("#tab1").removeClass("show");
        $("#tab1").removeClass("active");
        $("#tab3").removeClass("show");
        $("#tab3").removeClass("active");
        $("#tab2").addClass("show");
        $("#tab2").addClass("active");
        if ($("#tab3").hasClass("active")) {
            $(".pay-details").show();
            $(".next-tab").hide();
        }else{
            $(".next-tab").show();

        }

    });
    $(".first-tab").on("click", function(e) {
        $("#tab2").removeClass("show");
        $("#tab2").removeClass("active");
        $("#tab3").removeClass("show");
        $("#tab3").removeClass("active");
        $("#tab1").addClass("show");
        $("#tab1").addClass("active");
        if ($("#tab3").hasClass("active")) {
            $(".pay-details").show();
            $(".next-tab").hide();
        }else{
            $(".next-tab").show();

        }

    });
    var activeTab = null;

    $(".next-tab").on("click", function(e) {
        load_address();
        e.preventDefault();

        if ($("#tab2").hasClass("active")) {
            // $(".next-tab").hide();

            if ($(".address_id:checked").val() == undefined) {
                alert("احتر عنوان اولا");

                return false;
            }
            confrim_address();
        }
        if ($("#tab3").hasClass("active")) {
            // $(".next-tab").hide();
            $(".next-tab").hide();


        }else{
            $(".next-tab").show();

        }

        if ($("#tab1").hasClass("active")) {
            // $(".next-tab").hide();
            if ($(".h_a").val() == "no") {
                add_address();
                return false;
            } else if (
                $(".h_a").val() == "yes" &&
                ($(".city").val() != 0 ||
                    $(".area").val() != "" ||
                    $(".street").val() != "" ||
                    $(".more").val() != "")
            ) {
                add_address();
                return false;
            }
        }
        $(".tab-pane.active")
            .next()
            .closest("div.tab-pane")
            .addClass("show active");
        $(".tab-pane.active")
            .prev()
            .closest("div.tab-pane")
            .removeClass("show active");

        if ($("#tab3").hasClass("active")) {
            $(".pay-details").show();
            $(".next-tab").hide();
        }else{
            $(".next-tab").show();

        }

    });
    $(".next-branch").on("click", function(e) {
        if ($(".branch_id:checked").val() == undefined) {
            alert("من فضلك اختر فرع");
            return false;
        }
        $.ajax({
            url: "/confirm_branch",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                branch_id: $(".branch_id:checked").val()
            },

            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if(json["success"] == "1"){
                    var x = document.getElementById("snackbar");
                    $("#snackbar").text(json["message"]);
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                    }, 3000);

                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
        $(".tab-pane.active")
            .next()
            .closest("div.tab-pane")
            .addClass("show active");
        $(".tab-pane.active")
            .prev()
            .closest("div.tab-pane")
            .removeClass("show active");
        $(".pay-details").show();
        $(".next-tab").hide();
    });

    // $('.prev-tab').on('click', function(e) {
    //     e.preventDefault();
    //     $('.tab-pane.first').addClass('show active');
    //     $('.tab-pane.active').removeClass('show active');

    // });
    $('input:radio[name="delivered-case"]').change(function() {
        if (this.value == "1") {
            $(".delivered-case-1").show();
            $(".delivered-case-2").hide();
        } else if (this.value == "2") {
            $(".delivered-case-2").show();
            $(".delivered-case-1").hide();
            $(".pay-details").hide();
        }
    });

    $('input:radio[name="pay"]').change(function() {
        if (this.value == "1") {
            $(".pay-1").show();
            $(".pay-2, .pay-3, .pay-5").hide();
        } else if (this.value == "2") {
            $(".pay-2").show();
            $(".pay-1,.pay-3 , .pay-5").hide();
        } else if (this.value == "3") {
            $(".pay-3").show();
            $(".pay-1 , .pay-2, .pay-5").hide();
        } else if (this.value == "5") {
            $(".pay-5").show();
            $(".pay-1, .pay-2, .pay-3").hide();
        }
    });
    $(".pay_type").change(function() {
        if (this.value == "cod") {
            $(".pay-1").show();
            $(".pay-2, .pay-3, .pay-5").hide();
        } else if (this.value == "credit") {
            $(".pay-2").show();
            $(".pay-1,.pay-3 , .pay-5").hide();
        } else if (this.value == "bank_transfer") {
            $(".pay-2").show();
            $(".pay-1,.pay-3 , .pay-5").hide();
        } else if (this.value == "stc") {
            $(".pay-3").show();
            $(".pay-1 , .pay-2, .pay-5, .pay-4").hide();
        } else if (this.value == "apple") {
            $(".pay-4").show();
            $(".pay-1, .pay-2, .pay-3, .pay-5").hide();
        } else if (this.value == "wallet") {
            $(".pay-5").show();
            $(".pay-1, .pay-2, .pay-3, .pay-4").hide();
        }
    });
    function set_cover() {
        if ($(".cov_file:checked").length > 0) {
            var ids = [];
            $(".cov_file:checked").each(function(element) {
                if ($("#cov_f_" + $(this).val()).attr("style") == undefined) {
                    ids.push($(this).val());
                }
            });
            if ($(".cover_id:checked").val() > 0) {
                $("#loader").modal("show");
                $.ajax({
                    url: "/set_cover/" + ids,
                    type: "post",
                    data: {
                        _token: $("meta[name=csrf-token]").attr("content"),
                        cover_id: $(".cover_id:checked").val(),
                        cover_side: $(".cover_side:checked").val(),
                        quantity: $(".quantityc" + $(this).val()).val(),
                        cover_files_state: $(
                            ".cover_files_state:checked"
                        ).val(),
                        custom_product: $("#custom_product_id").val()
                    },

                    dataType: "json",

                    success: function(json) {
                        // Need to set timeout otherwise it wont update the total
                        if (json.success == "1") {
                            //load the table
                            load_files();

                            $(".delete_cover").on("click", function() {
                                var cover_id = $(this).attr("cover_id");
                                $.ajax({
                                    url: "/delete_cover",
                                    type: "post",
                                    data: {
                                        _token: $("meta[name=csrf-token]").attr(
                                            "content"
                                        ),
                                        cover_id: cover_id,
                                        custom_product: $(
                                            "#custom_product_id"
                                        ).val()
                                    },

                                    dataType: "json",

                                    success: function(json) {
                                        // Need to set timeout otherwise it wont update the total
                                        if (json.success == "1") {
                                            //load the table
                                            setTimeout(function() {
                                                $("#loader").modal("hide");
                                            }, 500);
                                            load_files();
                                        }

                                        alert(json.message);
                                    },
                                    error: function(
                                        xhr,
                                        ajaxOptions,
                                        thrownError
                                    ) {
                                        //  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                    }
                                });
                                return false;
                            });

                            var x = document.getElementById("snackbar");
                            $("#snackbar").text(json.message);
                            x.className = "show";
                            setTimeout(function() {
                                x.className = x.className.replace("show", "");
                            }, 3000);
                            setTimeout(function() {
                                ids.forEach(function(element) {
                                    $("#cov_f_" + element).hide();
                                });
                            }, 1000);
                        } else {
                            var x = document.getElementById("snackbar");
                            $("#snackbar").text(json.message);
                            x.className = "show";
                            setTimeout(function() {
                                x.className = x.className.replace("show", "");
                            }, 3000);
                        }

                        setTimeout(function() {
                            $("#loader").modal("hide");
                        }, 500);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        //  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
        } else {
            var x = document.getElementById("snackbar");
            $("#snackbar").text("رجاء اختيار الملف اولا");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        return false;
    }
    $(".set_cover").on("click", function() {
        set_cover();
        return false;
    });

    function get_covers(file_id) {
        if (file_id > 0) {
            $.ajax({
                url: "/get_covers/" + file_id,
                type: "post",
                data: { _token: $("meta[name=csrf-token]").attr("content") },

                dataType: "json",

                success: function(json) {
                    if (json.success == 1) {
                        var photo = "";
                        $(".covers_radios").html("");
                        json.data.covers.forEach(element => {
                            var photo = "/uploads/cover_type/" + element.photo;
                            $(".covers_radios").append(
                                '<div class="pretty p-icon p-toggle p-smooth p-plain ">' +
                                    '  <input type="radio"  value="' +
                                    element.id +
                                    '" class="cover_id" name="cover_id" />' +
                                    '  <div class="state ">' +
                                    '     <p class="icon">' +
                                    '         <img src="' +
                                    photo +
                                    '">' +
                                    "         <span>" +
                                    element.name +
                                    "</span>" +
                                    "     </p>" +
                                    "      <label></label>" +
                                    "  </div>" +
                                    " </div>"
                            );
                        });
                        $(".cover_id").on("click", function() {
                            if ($(".cov_file:checked").length > 0) {
                                var ids = [];
                                $(".cov_file:checked").each(function(element) {
                                    ids.push($(this).val());
                                });
                                if ($(".cover_id:checked").val() > 0) {
                                    $.ajax({
                                        url: "/get_cover_price_preview/" + ids,
                                        type: "post",
                                        data: {
                                            _token: $(
                                                "meta[name=csrf-token]"
                                            ).attr("content"),
                                            cover_id: $(
                                                ".cover_id:checked"
                                            ).val(),
                                            cover_side: $(
                                                ".cover_side:checked"
                                            ).val(),
                                            cover_files_state: $(
                                                ".cover_files_state:checked"
                                            ).val(),
                                            custom_product: $(
                                                "#custom_product_id"
                                            ).val()
                                        },

                                        dataType: "json",

                                        success: function(json) {
                                            if (json.success == 1) {
                                                $(".total_price_cover").text(
                                                    json.total_cover + "ريال"
                                                );
                                            }
                                        },
                                        error: function(
                                            xhr,
                                            ajaxOptions,
                                            thrownError
                                        ) {
                                            //  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                        }
                                    });
                                }
                            } else {
                                var x = document.getElementById("snackbar");
                                $("#snackbar").text("رجاء اختيار الملف اولا");
                                x.className = "show";
                                setTimeout(function() {
                                    x.className = x.className.replace(
                                        "show",
                                        ""
                                    );
                                }, 3000);
                            }
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    //  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    }

    $(".cover_files_state").on("click", function() {
        set_cover();
        return false;
    });

    $(".delete_cover").on("click", function() {
        var cover_id = $(this).attr("cover_id");
        $("#loader").modal("show");
        $.ajax({
            url: "/delete_cover",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                cover_id: cover_id,
                custom_product: $("#custom_product_id").val()
            },

            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    setTimeout(function() {
                        $("#loader").modal("hide");
                    }, 500);
                    load_files();
                }

                alert(json.message);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
        return false;
    });

    $(".delete_file_cart").on("click", function() {
        var file_id = $(this).attr("file_id");
        var custom_product_id = $(this).attr("custom");
        $("#loader").modal("show");
        $.ajax({
            url: "/delete_file",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                key: file_id,
                custom_product: custom_product_id
            },

            dataType: "json",

            success: function(json) {
                setTimeout(function() {
                    $("#loader").modal("hide");
                }, 500);
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    //load the table

                    load_uploader();
                    load_files();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(
                //     thrownError +
                //         "\r\n" +
                //         xhr.statusText +
                //         "\r\n" +
                //         xhr.responseText
                // );
            }
        });
        return false;
    });

    $(".city").on("change", function() {
        $.ajax({
            url: "/areas",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                city: $(".city").val()
            },

            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    $(".area").html("");

                    json.data.area.forEach(element => {
                        $(".area").append(
                            '<option value="' +
                                element.id +
                                '">' +
                                element.name +
                                "</option"
                        );
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(
                //     thrownError +
                //         "\r\n" +
                //         xhr.statusText +
                //         "\r\n" +
                //         xhr.responseText
                // );
            }
        });
        return false;
    });

    $(".pay").on("click", function() {
        if ($(".pay_type:checked").val() == undefined) {
            alert("من فضلك 'طريقة الدفع'  ");
            return false;
        }
        $("#loader").modal("show");
        $.ajax({
            url: "/confirm_pay",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                pay_type: $(".pay_type:checked").val()
            },

            dataType: "json",

            success: function(json) {
                setTimeout(function() {
                    $("#loader").modal("hide");
                }, 500);
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    window.location = "/createorder";
                }
                a;
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(
                //     thrownError +
                //         "\r\n" +
                //         xhr.statusText +
                //         "\r\n" +
                //         xhr.responseText
                // );
            }
        });
        return false;
    });
    function add_address() {
        if (
            $(".city").val() == "" ||
            $(".area").val() == "" ||
            $(".street").val() == "" ||
            $(".more").val() == ""
        ) {
            alert("من فضلك املأ البايانات ");
            return false;
        }
        $("#loader").modal("show");
        $.ajax({
            url: "/add_address",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                city: $(".city").val(),
                area: $(".area").val(),
                street: $(".street").val(),
                more: $(".more").val()
            },

            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    setTimeout(function() {
                        $("#loader").modal("hide");
                    }, 500);
                    var x = document.getElementById("snackbar");
                    $("#snackbar").text(json["message"]);
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                    }, 3000);
                    load_address();
                    $(".tab-pane.active")
                        .next()
                        .closest("div.tab-pane")
                        .addClass("show active");
                    $(".tab-pane.active")
                        .prev()
                        .closest("div.tab-pane")
                        .removeClass("show active");
                    if ($("#tab3").hasClass("active")) {
                        $(".pay-details").show();
                        $(".next-tab").hide();
                    }
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(
                //     thrownError +
                //         "\r\n" +
                //         xhr.statusText +
                //         "\r\n" +
                //         xhr.responseText
                // );
            }
        });
        return false;
    }

    $(".first-tab").on("click", function(e) {
        e.preventDefault();
        $(".tab-pane.active")
            .prev()
            .closest("div.tab-pane")
            .addClass("show active");
        $(".tab-pane.active")
            .next()
            .closest("div.tab-pane")
            .removeClass("show active");
    });
    function load_address() {
        return $.ajax({
            url: "/address",
            type: "post",
            data: "_token=" + $("meta[name=csrf-token]").attr("content"),
            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json["success"]) {
                    $(".address_container").html("");
                    if (json.data.address.length == 0) {
                        $(".h_a").val("no");
                    } else {
                        $(".h_a").val("yes");
                    }
                    json.data.address.forEach(element => {
                        $(".address_container").append(
                            '<div class="flex-div">' +
                                "<div>" +
                                '  <div class="pretty p-default p-smooth p-round">' +
                                '    <input type="radio" name="address" class="address_id" value="' +
                                element.id +
                                '" >' +
                                '    <div class="state p-warning">' +
                                '        <label class="small"> </label>' +
                                "      </div>" +
                                "    </div>" +
                                " </div>" +
                                ' <div style="width: 100px;">' +
                                '      <img src="./img/icons/stay-home.png">' +
                                "  </div>" +
                                "  <div>" +
                                '      <p class="semibold larger">' +
                                element.city +
                                " ،  " +
                                element.area +
                                "</p>" +
                                "      " +
                                element.street +
                                "  ،" +
                                element.more +
                                "" +
                                "  </div>" +
                                '  <div class="text-center">' +
                                '      <button class="file-remove gray-color delete_address" address_id="' +
                                element.id +
                                '" type="button">' +
                                '         <i class="fas fa-times-circle"></i> حذف العنوان' +
                                "      </button>" +
                                "    </div>" +
                                "  </div>"
                        );


                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
    $(".view-pass").on("click", function() {
        if ($("#p1").attr("type") == "password") {
            $("#p1").attr("type", "text");
        } else {
            $("#p1").attr("type", "password");
        }
        if ($("#p2").attr("type") == "password") {
            $("#p2").attr("type", "text");
        } else {
            $("#p2").attr("type", "password");
        }
    });
    $(".delete_address").on("click", function() {
        var address_id = $(this).attr("address_id");

        $.ajax({
            url: "/remove_address",
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr(
                    "content"
                ),
                id: address_id
            },

            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json.success == "1") {
                    var x = document.getElementById(
                        "snackbar"
                    );
                    $("#snackbar").text(json["message"]);
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace(
                            "show",
                            ""
                        );
                    }, 3000);
                    load_address();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
        return false;
    });
});

$(window).on("load", function() {
    $(".preloader").fadeOut("slow");
});
function split_confirm(e) {
    var file_id = $(e).attr("file_id");
    if (
        $(".split_from_" + file_id).val() != 1 ||
        $(".split_to_" + file_id).val() != 1
    ) {
        splite_file_html(file_id);
    }
    var from_a = $(".from_v_element_" + file_id);
    var to_a = $(".to_v_element_" + file_id);
    var merge = $(".merge" + file_id + ":checked").val();

    var from_array = [];
    var to_array = [];
    for (var i = 0; i < from_a.length; i++) {
        from_array.push($(from_a[i]).val());
    }
    for (var i = 0; i < to_a.length; i++) {
        to_array.push($(to_a[i]).val());
    }
    if (from_array.length > 0) {
        $("#loader").modal("show");
        $.ajax({
            url: "/split_file/" + file_id,
            type: "post",
            data: {
                _token: $("meta[name=csrf-token]").attr("content"),
                from: from_array,
                to: to_array,
                merge: merge
            },
            dataType: "json",

            success: function(json) {
                // Need to set timeout otherwise it wont update the total
                if (json["success"] == "1") {
                    // $("#file" + file_id).modal("hide");
                    location.reload();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    } else {
        alert("اضف تقسيم اولا");
    }
}
$(".porps").on("click", function() {
var product_id = $(this).attr("product_id");
var porps = $(".props:checked").val();

    $.ajax({
        url: "/getProductProp/"+product_id+"/"+props,
        type: "post",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            prod: code
        },
        dataType: "json",

        success: function(json) {
            $(".total").text("");

            // Need to set timeout otherwise it wont update the total
            if (json["success"] == 1) {

            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });


});

$(".charge_by_code").on("click", function() {
    var code = $(".charge_code").val();
    if (code == "" || code == " ") {
        $(".code_error").text("من فضلك ادخل الكود");

        $(".code_error").show();
        return false;
    } else {
        $(".code_error").text("");

        $(".code_error").hide();
    }
    $.ajax({
        url: "/wallet_charge_by_code",
        type: "post",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            code: code
        },
        dataType: "json",

        success: function(json) {
            $(".total").text("");
            $(".sign").html(
                '<i style="color:red;font-size:200px" class="fas fa-times-circle"></i>'
            );

            // Need to set timeout otherwise it wont update the total
            if (json["success"] == 1) {
                $(".code_error").text("");

                $(".code_error").hide();
                $(".total").html(json["message"]);
                $("#code_modal").modal("show");
                $(".sign").html(
                    '<i style="color:green;font-size:200px" class="fas fa-check-circle"></i>'
                );
            } else if (json["success"] == 0) {
                $(".code_error").text(json["message"]);
                $(".total").text(json["message"]);
                $("#code_modal").modal("show");
                $(".sign").html(
                    '<i style="color:red;font-size:200px" class="fas fa-times-circle"></i>'
                );
                $(".code_error").show();
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });


});
function splite_file_html(file_id) {
    var from = $(".split_from_" + file_id).val();
    var to = $(".split_to_" + file_id).val();
    var max = $(".max_num_" + file_id).val();
    if (parseInt(to) > parseInt(max)) {
        alert("اكبر عدد للاوراق هوه :" + $(".max_num_" + file_id).val());
        return false;
    } else if (from > to) {
        alert("تقسيم خاطئ");
        return false;
    } else {
        $(".file_parts_body" + file_id).append(
            '<div class="col-6">' +
                ' <div class="image">' +
                ' <img src="/img/page.png">' +
                ' <span class="number">' +
                from +
                "</span>" +
                '<input type="hidden" value="' +
                from +
                '" name="from_v_element_' +
                file_id +
                '" class="from_v_element_' +
                file_id +
                '" />' +
                "        </div>" +
                " </div>" +
                '        <div class="col-6">' +
                '             <div class="image">' +
                '                <img src="./img/page.png">' +
                '                 <span class="number">' +
                to +
                "</span>" +
                '<input type="hidden"  value="' +
                to +
                '" name="to_v_element_' +
                file_id +
                '" class="to_v_element_' +
                file_id +
                '" />' +
                "             </div>" +
                "          </div>"
        );
        $(".split_from_" + file_id).val(1);
        $(".split_to_" + file_id).val(1);
    }
}
function confrim_address() {
    var add = $(".address_id:checked").val();
    if (add == undefined) {
        alert("اختر عنوان");
        return false;
    }
    $("#loader").modal("show");
    $.ajax({
        url: "/confirm_address",
        type: "post",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
            address_id: add
        },

        dataType: "json",

        success: function(json) {
            // Need to set timeout otherwise it wont update the total
            $(".confirmed_address").html("");
            if (json.success == "1") {
                setTimeout(function() {
                    $("#loader").modal("hide");
                }, 500);
                $(".next-tab").show();
                var element = json.data;
                $(".arrival_price").text(json.arrival_price+' ريال');
                $(".totalAll").text(parseInt(json.arrival_price)+parseInt($(".tot").val())+' ريال');

                $(".confirmed_address").append(
                    "" +
                        ' <div style="width: 100px;">' +
                        '      <img src="./img/icons/stay-home.png">' +
                        "  </div>" +
                        "  <div>" +
                        '      <p class="semibold larger">' +
                        element.city +
                        " ،  " +
                        element.area +
                        "</p>" +
                        "      " +
                        element.street +
                        "  ،" +
                        element.more +
                        "" +
                        "  </div>" +
                        '  <div class="text-center">' +
                        // '      <button class="file-remove gray-color delete_address" address_id="' +
                        // element.id +
                        // '" type="button">' +
                        // '         <i class="fas fa-times-circle"></i> حذف العنوان' +
                        // "      </button>" +
                        "    </div>"
                );
                if ($("#tab3").hasClass("active")) {
                    // $(".next-tab").hide();
                    $(".next-tab").hide();


                }else{
                    $(".next-tab").show();

                }
                console.log('i hate this we');
                var x = document.getElementById("snackbar");
                $("#snackbar").text(json.message);
                x.className = "show";
                setTimeout(function() {
                    x.className = x.className.replace("show", "");
                }, 3000);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
    return false;
}
$(".show_splite_file2").on("click", function() {
    var id = $(".file_key:checked")
        .closest("div.file-preview-frame")
        .find("button.kv-file-remove")
        .attr("data-key");
    $("#file" + id).modal("show");
});

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dotslider");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace("activeslider", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " activeslider";
}
