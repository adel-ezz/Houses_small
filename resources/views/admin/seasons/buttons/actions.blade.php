<div class="actions">
    <a href="{{ aurl('seasons/'.$id.'/edit')}}" class="btn btn-sm btn-clean btn-icon btn-info "
       title="{{trans('admin.edit')}}"> <i class="la la-edit"></i>
    </a>
    <a data-toggle="modal" data-target="#delete_record{{$id}}" href="#" class="btn btn-sm btn-clean btn-icon btn-danger" title="{{trans('admin.delete')}}"> <i class="la la-trash"></i> </a>
</div>
<div class="modal fade" id="delete_record{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
            </div>
            <div class="modal-body">
                <i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$id}}) ؟
            </div>
            <div class="modal-footer">
                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['seasons.destroy', $id]
                ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
{{--<div class="dropdown dropdown-inline show">--}}
{{--    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"--}}
{{--                                              data-toggle="dropdown" aria-expanded="true"> <i class="la la-cog"></i>--}}
{{--    </a>--}}
{{--</div>                            --}}
{{--        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"--}}
{{--                                             title="Edit details"> <i class="la la-edit"></i> </a>--}}
{{--<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete"> <i class="la la-trash"></i> </a>--}}


{{--<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"--}}
{{--     style="display: block; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1190px, 326px, 0px);"--}}
{{--     x-placement="top-end">--}}
{{--    <ul class="nav nav-hoverable flex-column">--}}
{{--        <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a>--}}
{{--        </li>--}}
{{--        <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a>--}}
{{--        </li>--}}
{{--        <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</div>--}}
