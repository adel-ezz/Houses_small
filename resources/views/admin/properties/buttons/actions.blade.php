<div class="actions">
    <a href="{{ aurl('properties/'.$id.'/edit')}}" class="btn btn-sm btn-clean btn-icon btn-info "
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
                'route' => ['properties.destroy', $id]
                ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
