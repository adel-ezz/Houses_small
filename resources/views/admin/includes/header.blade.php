<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <base href="">
    <meta charset="utf-8"/>
    <title>@lang('Dashboard')</title>
    <meta name="description" content="Updates and statistics"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    @stack('statistics')
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
@php
    $prefix='';
@endphp


<!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{url('admin')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle{{app('perfixDirection')}}.css"
          rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendors Styles-->
        <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{url('admin')}}/assets/plugins/custom/datatables/datatables.bundle{{app('perfixDirection')}}.css"
          rel="stylesheet" type="text/css"/>
        <!--end::Page Vendors Styles-->

{{--<!--begin::Global Theme Styles(used by all pages)-->--}}
    <link href="{{url('admin')}}/assets/plugins/global/plugins.bundle{{app('perfixDirection')}}.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('admin')}}/assets/plugins/custom/prismjs/prismjs.bundle{{app('perfixDirection')}}.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('admin')}}/assets/css/style.bundle{{app('perfixDirection')}}.css" rel="stylesheet"
          type="text/css"/>


{{--    <!--end::Global Theme Styles-->--}}

{{--    <!--begin::Layout Themes(used by all pages)-->--}}
    <link href="{{url('admin')}}/assets/css/themes/layout/header/base/light{{app('perfixDirection')}}.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('admin')}}/assets/css/themes/layout/header/menu/light{{app('perfixDirection')}}.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('admin')}}/assets/css/themes/layout/brand/dark{{app('perfixDirection')}}.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('admin')}}/assets/css/themes/layout/aside/dark{{app('perfixDirection')}}.css" rel="stylesheet"
          type="text/css"/>



{{--    <!--end::Layout Themes-->--}}

    <style type="text/css">
        .table-responsive {
            padding-top: 70px;
        }

        div#dataTableBuilder_wrapper {
            overflow-x: scroll !important;
            overflow-y: hidden;
            padding-top: 70px;
        }

        table#table-4 select {
            min-width: 15rem;
            height: 36px !important;
        }

        ul {
            list-style: none;

        }

        ul.sub-menu a {
            color: #FFF;
            -webkit-transition: .3s;
        }

        a.active {
            color: rgba(177, 177, 177, 0.91);
        }

        ul .sub-menu a:hover {
            color: rgba(177, 177, 177, 0.91);
            background: #FFF;
        }

        #kt_datatable_length {
            float: right;
        }

        #kt_datatable_filter {
            float: left;
        }

        #kt_datatable_wrapper .dt-buttons {

            margin-bottom: 20px;
            width: 100%;
            text-align: left;
            margin-left: 15px;
        }
        div.dataTables_wrapper div.dataTables_processing {
            position: absolute;
            top: 80%;
            right: 50%;
            width: 200px;
            margin-right: -100px;
            margin-top: -26px;
            text-align: center;
            padding: 1em 0;
            background-color: #e1e1e1b8;}

    </style>

    @if(app()->getLocale() == 'ar')
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
        <style>
            *{
                font-family: 'Cairo', sans-serif;
            }
            .aside-menu .menu-nav > .menu-item > .menu-heading .menu-arrow:before, .aside-menu .menu-nav > .menu-item > .menu-link .menu-arrow:before            {
                transform: rotate(180deg);
                margin-left: -6px;
            }
        </style>
    @endif

    @stack('css')
    <link rel="shortcut icon" href="{{url('admin')}}/assets/media/logos/favicon.ico"/>
    @livewireStyles
</head>
<div id="mainurl" data="{{ aurl('/') }}"></div>

