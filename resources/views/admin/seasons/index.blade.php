@extends('admin.index')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon"><i class="fas fa-heartbeat text-danger"></i></span>
                        <h3 class="card-label">{{ $title }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ aurl('seasons/create') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md"><i
                                    class="fa fa-plus"></i>
                                <!--end::Svg Icon--></span> @lang('Add New')
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                        <!--begin: Datatable-->
                    {!! Form::open([
                      "method" => "post",
                      "url" => [aurl('/seasons/multi_delete')]
                      ]) !!}
                    {!! $dataTable->table(["class"=> "table table-bordered table-hover table-checkable","id"=>"kt_datatable", "style"=>"margin-top: 13px !important"],true) !!}
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->

        <!--end::Entry-->
        <div class="modal fade" id="multi_delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">x</button>
                        <h4 class="modal-title">{{trans("admin.delete")}} </h4>
                    </div>
                    <div class="modal-body">
                        <div class="delete_done"><i
                                class="fa fa-exclamation-triangle"></i> {{trans("admin.ask-delete")}} <span
                                id="count"></span> {{trans("admin.record")}} !
                        </div>
                        <div class="check_delete">{{trans("admin.check-delete")}}</div>
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit(trans("admin.approval"), ["class" => "btn btn-danger delete_done"]) !!}
                        <a class="btn btn-default" data-dismiss="modal">{{trans("admin.cancel")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        {{--Datables--}}
        <script src="{{url("admin/datatables/js/jquery.dataTables.min.js")}}"></script>
        <script src="{{url("admin/datatables/js/dataTables.bootstrap.min.js")}}"></script>
        <script src="{{url("admin/datatables/js/dataTables.buttons.min.js")}}"></script>
        <script src="{{url("admin/datatables/js/selecta_all_checkbtn.js")}}"></script>
        <script src="{{url("admin/datatables/js/buttons.server-side.js")}}"></script>
        <script src="{{url("admin/datatables/plugins/bootstrap/datatables.bootstrap.js")}}"></script>

        {!! $dataTable->scripts() !!}
    @endpush
    {!! Form::close() !!}
@endsection

