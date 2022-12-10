@extends('admin.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon"><i class="fas fa-clinic-medical text-success"></i></span>
                        <h3 class="card-label">{{ $title }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ aurl('seasons/create') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md"><i
                                    class="fa fa-plus"></i>
                                <!--end::Svg Icon--></span> @lang('Add New')
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="alert alert-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{aurl('seasons')}}" enctype="multipart/form-data"
                          class="form-horizontal form-row-seperated" method="post" id="users">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="post">

                        <div class="form-group row">
                            <label for="old_price"
                                   class="col-md-2  control-label">{{trans('name')}}</label>
                            <div class="col-md-4">
                                <input type="text" id="title" name="name"
                                       value="{{old('name')}}"
                                       class="form-control"
                                       placeholder="{{trans('name')}}" required/>
                            </div>
                            <label for="new_price"
                                   class="col-md-2  control-label">{{trans('describe')}}</label>
                            <div class="col-md-4">
                                <textarea name="describe"  class="form-control" >{{ old('describe') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="old_price"
                                   class="col-md-2  control-label">{{trans('start')}}</label>
                            <div class="col-md-4">
                                <input type="text" id="title" name="start"
                                       value="{{old('start')}}"
                                       class="form-control datepicker"

                                       placeholder="{{trans('start')}}" required/>
                            </div>
                            <label for="new_price"
                                   class="col-md-2  control-label">{{trans('end')}}</label>
                            <div class="col-md-4">
                                <input type="text" id="title" name="end"
                                       value="{{old('end')}}"
                                       class="form-control datepicker"
                                       placeholder="{{trans('start')}}" required/>
                            </div>
                        </div>




                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" class="btn btn-success"
                                                   value="{{ trans('admin.add') }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>





@endsection

@push('js')
    <!--begin::Global Theme Bundle(used by all pages)-->

    {{--    <!--end::Global Theme Bundle-->--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.js" type="text/javascript"></script>

    <script src="{{url('admin')}}/assets/plugins/global/plugins.bundle.js"></script>

    {{--    <!--begin::Page Scripts(used by this page)-->--}}
    <script src="{{ asset('admin') }}/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js"></script>
    <!--end::Page Scripts-->



    <script>
        $(document).ready(function () {


            var arrows;
            if (KTUtil.isRTL()) {
                arrows = {
                    leftArrow: '<i class="la la-angle-right"></i>',
                    rightArrow: '<i class="la la-angle-left"></i>'
                }
            } else {
                arrows = {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            }

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows,
                startDate: new Date()
            });
        });
    </script>
@endpush








