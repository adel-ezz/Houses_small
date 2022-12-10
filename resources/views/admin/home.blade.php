@extends('admin.index')
@section('content')

@endsection
@push('js')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('admin') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <!--end::Page Vendors-->
    <script>

        $(window).on('pageshow',function(){
            $('.main-loader').fadeOut();
        });
    </script>
    <!--end::Page Scripts-->
@endpush


