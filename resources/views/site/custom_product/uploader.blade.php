<input class="input-b1" id="input-b1"  autocomplete="off"  accept=
                        "application/msword, application/vnd.ms-powerpoint,application/pdf," type="file" multiple="multiple" data-browse-on-zone-click="true">


{{--
<script src="{{URL::to('/')}}/js/jquery-3.1.1.min.js "></script>
<script src="{{URL::to('/')}}/js/bootstrap.bundle.min.js "></script>

<script src="{{URL::to('/')}}/plugins/dropzone/dropzone.js "></script> --}}
<script src="{{URL::to('/')}}/plugins/fileinput/fileinput.js "></script>



<script>
  $(document).ready(function() {
    'use strict';


    var custom_product_id = $("#custom_product_id").val();

    $(".input-b1 ").fileinput({
    uploadUrl: "/upload_file_custom_product/"+custom_product_id,
    showUpload: false,
    showRemove: false,
    showBrowse: true,
    showClose: false,
    uploadExtraData:{'_token':$('meta[name=csrf-token]').attr("content")},
    deleteExtraData:{'_token':$('meta[name=csrf-token]').attr("content"),'custom_product':custom_product_id},
    browseLabel: 'تصفح ملفاتك',
    autoReplace:false,
    uploadAsync: false,

    allowedFileExtensions:['pdf','pptx','doc','ppt','docx'],
                 slugCallback: function(filename) {
               return filename.replace('(', '_').replace(']', '_');
             },
    initialPreviewFileType: 'image',
    previewFileExtSettings: {
    'doc': function(ext) {
        return ext.match(/(doc|docx)$/i);
    },
    'pdf': function(ext) {
        return ext.match(/(pdf|pdf)$/i);
    },
    'ppt': function(ext) {
        return ext.match(/(ppt|pptx)$/i);
    }
},
    fileTypeSettings: {
    image: function(vType, vName) {
        return (typeof vType !== "undefined") ? vType.match('image.*') && !vType.match(/(tiff?|wmf)$/i) : vName.match(/\.(gif|png|jpe?g)$/i);
    },
    html: function(vType, vName) {
        return (typeof vType !== "undefined") ? vType == 'text/html' : vName.match(/\.(htm|html)$/i);
    },
    office: function (vType, vName) {
        return vType.match(/(word|excel|powerpoint|office)$/i) ||
            vName.match(/\.(docx?|xlsx?|pptx?|pps|potx?)$/i);
    },
    gdocs: function (vType, vName) {
        return vType.match(/(word|excel|powerpoint|office|iwork-pages|tiff?)$/i) ||
            vName.match(/\.(rtf|docx?|xlsx?|pptx?|pps|potx?|ods|odt|pages|ai|dxf|ttf|tiff?|wmf|e?ps)$/i);
    },
    text: function(vType, vName) {
        return typeof vType !== "undefined" && vType.match('text.*') || vName.match(/\.(txt|md|nfo|php|ini)$/i);
    },
    video: function (vType, vName) {
        return typeof vType !== "undefined" && vType.match(/\.video\/(ogg|mp4|webm)$/i) || vName.match(/\.(og?|mp4|webm)$/i);
    },
    audio: function (vType, vName) {
        return typeof vType !== "undefined" && vType.match(/\.audio\/(ogg|mp3|wav)$/i) || vName.match(/\.(ogg|mp3|wav)$/i);
    },
    flash: function (vType, vName) {
        return typeof vType !== "undefined" && vType == 'application/x-shockwave-flash' || vName.match(/\.(swf)$/i);
    },
    object: function (vType, vName) {
        return true;
    },
    other: function (vType, vName) {
        return true;
    },
},
    showCaption: false,
    elPreviewStatus: false,
    initialPreview: <?=json_encode($urls)?>,
    initialPreviewConfig: <?=json_encode($files)?>,
    ajaxDeleteSettings : {
        'headers': {"X-CSRFToken": $('meta[name=csrf-token]').attr("content")},
    },
    msgZoomModalHeading: '',
    dropZoneTitle: '<img src="./img/icons/upload2.png " class="mb-3 "> <br> اسحب ملفك هنا أو ',
    dropZoneClickTitle: '&nbsp; &nbsp; <span class="h2 btn main-btn ">تصفح ملفاتك</span>',
    removeTitle: true,
    deleteUrl: "/delete_file",
    uploadAsync:true,
    maxFileCount: 100,
    initialPreviewAsData: true,

    overwriteInitial: false,

}).on("filebatchselected", function(event, files) {
            $(".input-b1").fileinput("upload");
        }).on('fileloadederror', function(event, file, previewId, fileId, index, reader) {

});
$(".show_splite_file").on("click", function() {
        var id = $(this)
            .closest("div.file-preview-frame")
            .find("button.kv-file-remove")
            .attr("data-key");
        $("#file" + id).modal("show");
    });
    })

    </script>
