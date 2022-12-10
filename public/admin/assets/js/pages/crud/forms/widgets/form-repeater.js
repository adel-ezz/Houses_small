// Class definition
var KTFormRepeater = function () {

    // Private functions
    var demo1 = function () {
        $('.kt_repeater_1').repeater({
            initEmpty: false,
            // isFirstItemUndeletable: true,
            defaultValues: {
                'text-input': '0'
            },

            show: function () {
                $(this).slideDown();
                $('.select2-container').remove();
                $('.select2').select2({
                    placeholder: 'Select',
                    width: '100%',
                    allowClear: true,
                    dropdownParent: $(this).parent(),
                });
                $('.kt_timepicker_1').timepicker({
                    minuteStep: 30,
                    defaultTime: "8:00 Am"
                });
                // $('.dropdown button').remove();
                // $('.selectpicker').selectpicker('refresh');

            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
        $('.kt_repeater_1').repeaterVal();
    }

    var demo2 = function () {
        $('#kt_repeater_2').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    }


    var demo3 = function () {
        $('#kt_repeater_3').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    }

    var demo4 = function () {
        $('#kt_repeater_4').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }

    var demo5 = function () {
        $('#kt_repeater_5').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }

    var demo6 = function () {
        $('#kt_repeater_6').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }
    return {
        // public functions
        init: function () {
            demo1();
            demo2();
            demo3();
            demo4();
            demo5();
            demo6();
        }
    };
}();

jQuery(document).ready(function () {
    KTFormRepeater.init();
});

