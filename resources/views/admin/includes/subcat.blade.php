@if( count( $types ) > 0 )

    <div class="form-group  GetAll row">
        <label class="col-md-2 control-label ">@lang('Subsection')</label>
        <div class="col-md-9 checkParent" Link="{{ url('categories/parent') }}">
            <select class="form-control " name="parent_id">
                <option value="{{ $parent_id }}">@lang('please select')</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name_ar }}</option>
                @endforeach
            </select>
        </div>
    </div>


@endif
