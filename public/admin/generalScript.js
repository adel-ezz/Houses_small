////////////////==============This for Change Status ================////
$(document).on('change', '.main_status', function () {
    let mainurl = $('#mainurl').attr('data');
    let model = $(this).attr('model');
    let id = $(this).val();
    $.ajax({
        url: mainurl + '/main/status/' + id + '?model=' + model,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            Swal.fire({
                title: data.message,
                icon: "success",
                confirmButtonText: __['Done'],
            });
        }
    });
});


//////////=============Parent Departments ===============//////////
$(document).on('change', '.checkParent', function () {
    var url = $(this).attr('link');
    $(this).parent('.GetAll').nextAll(".GetAll").remove();
    var parent = $(this).find(' option:selected ').val();
    $('.mainGet').find(' option:selected ').siblings().attr('master', 'master')
    var master = $(this).find(' option:selected ').attr('master');
    if (parent == '' || parent == null || master == 'master') {
        $('.result').empty();
    }
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {parent_id: parent, '_token': $('meta[name="csrf-token"]').attr('content')},
        beforeSend: function () {
            $('.spin_dep').removeClass('hidden');
        },
        success: function (data) {
//                alert(data);
            $('.spin_dep').addClass('hidden');
            $('.result').append(data);
            // $(".select2").select2({});
        }
    });
});

//==========For offer Details in bookings dataTables================///
$(document).ready(function () {
    $("body").tooltip({selector: '[data-toggle=tooltip]',sanitize: false});
});
//==========For offer Details in bookings dataTables================///
//////////=============For Toggle Select Category  =====////
$(document).on('click', '.toggledepartment', function () {
    $('.container-depart').toggle();
});

///====================This is for work Hours switcher================////
$(document).ready(function () {
    var counter = 0;
    $('.main_status_ofWork_swicher').each(function () {
        //Go To first parent and go to sibling to
        var level = $(this).parents('.card-header')
            // .parent().parent().parent().parent()
            .siblings('.collapse');
        if (!$(this).is(":checked")) {
            level.find('input.kt_timepicker_1').attr("disabled", true);
        }
    })
});

$(document).on('change', '.main_status_ofWork_swicher', function () {
    var level = $(this)
        // .parents('.card-header')
        .parent().parent().parent().parent()
        .siblings();
    if ($(this).is(":checked")) {

        level.find('input.kt_timepicker_1').attr("disabled", false);
    }
});


///================For Catch All free Slot For New Lead for Current Clinic==============////


