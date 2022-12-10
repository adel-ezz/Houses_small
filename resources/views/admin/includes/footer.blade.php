<!--begin::Purchase-->
<div class="offcanvas-footer">
    <a href="#" target="_blank"
       class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase">

    </a>
</div>
<!--end::Purchase-->
</div>
<!--end::Content-->
</div>
@include('admin.includes.generalModal')

@livewireScripts

<script src="{{asset('lang')}}/{{ app()->getLocale() }}.js"></script>
<!--end::Demo Panel-->
<!--begin::Global Config(global config for global JS scripts)-->
<script src="{{asset('admin')}}/general/js/jquery.min.js"></script>

<script>
    (function () {
        window.livewire.on('alert_success', () => {
            ///========alert====///
            Swal.fire({
                icon: 'success',
                confirmButtonText: 'Done Successfully',
                showConfirmButton: true,
                timer: 2000
            });
            ///=======Close main modal==========//
            $(".form_modal").modal('hide');
            $('.modal-backdrop').hide();

        });

    })();
</script>

<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };

</script>


<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{url('admin')}}/assets/plugins/global/plugins.bundle.js"></script>
<script src="{{url('admin')}}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="{{url('admin')}}/assets/js/scripts.bundle.js"></script>
<script>
    var loading = new KTDialog({
        'type': 'loader',
        'placement': 'top center',
        'message': 'Loading ...'
    });
    // $(window).on('load',function(){
    //     $('.main-loader').fadeOut();
    // });
    $(document).ready(function () {
        $('.main-loader').fadeOut();
    });

</script>


@stack('js')





</body>
<!--end::Body-->
</html>
