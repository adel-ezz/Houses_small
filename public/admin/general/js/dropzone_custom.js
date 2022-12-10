Dropzone.autoDiscover = false;

$(window).ready(function () {
    var uploadeUrl = $('.dropzone').attr('url');
    var getUrl = $('.dropzone').attr('getOld');
    var pathFiles = $('.dropzone').attr('path');
    var product_id = $('.dropzone').attr('id');

    var nemo = $('.dropzone').attr('status');
    // alert(getUrl);
    $('.dropzone').dropzone({

        maxFiles: 50,
        url: uploadeUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        totaluploadprogress: true,
        uploadMultiple: true,
        parallelUploads: 1,
        params: {'product_id': product_id},
        addRemoveLinks: true,
        paramName: 'images',
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        dictDefaultMessage: "قم بالضغط لرفع الصور او قم بسحبها هنا",

        success: function (file, response) {
            file.previewElement.classList.add("dz-success");
            file.previewTemplate.name = response;
            var fileuploded = file.previewElement.querySelector("[data-dz-name]");
            fileuploded.innerHTML = response;
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        },
        init: function () {
            thisDropzone = this;
            $.get(getUrl, function (data) {
                $.each(JSON.parse(data), function (key, value) {
                    // alert(pathFiles + value.name);
                    var mockFile = {name: value.name, size: value.size,type: 'image/jpeg'};
                    thisDropzone.files.push(mockFile);
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.options.thumbnail.call(thisDropzone, mockFile, pathFiles + value.name);
                    thisDropzone.emit("complete", mockFile);
                });

            });
        }, removedfile: function (file) {
            if (nemo == 'add') {
                var name = file.previewTemplate.name;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/removePic',
                    data: {'name': name},
                    dataType: 'json'
                });
            }
            else {
                var name = file.name;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/removePic',
                    data: {'name': name, 'product_id': product_id},
                    dataType: 'json'
                });
            }


            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        }

    });

    // $(".dropzone").sortable({
    //     items: '.dz-preview',
    //     cursor: 'move',
    //     opacity: 0.5,
    //     containment: '.dropzone',
    //     distance: 20,
    //     tolerance: 'pointer',
    //     stop: function () {
    //         var order=[];
    //         $('.dz-filename span').each(function(){
    //             order.push($(this).text());
    //         });
    //         $.ajax({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             type: 'POST',
    //             url: '/orderZone',
    //             data: {'order': order, 'product_id': product_id},
    //             dataType: 'json'
    //         });
    //     }
    // });
});

// $(document).on('change','.forCsutom',function () {
//     var parent = $(this).find(' option:selected ').val();
//     $.ajax({
//         url: '/customFieldForCtegory',
//         type: 'get',
//         dataType: 'json',
//         data: {parent_id: parent},
//         success: function (data) {
//             // $('.spin_dep').addClass('hidden');
//             $('.result').append(data);
//             // $(".select2").select2({});
//         }
//     });
//
// })
