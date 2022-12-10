<div>


    <form wire:submit.prevent="submit()">
        <div class="form-group row">
            <label for="old_price"
                   class="col-md-2  control-label">{{trans('title')}}</label>
            <div class="col-md-4">
                <input type="text" id="title"
                       wire:model="title"
                       value="{{ $title }}"
                       class="form-control"
                       placeholder="{{trans('title')}}" required/>
                @if ($errors->has('title'))
                    <p style="color: red;">{{$errors->first('title')}}</p>
                @endif
            </div>
            <label for="new_price"
                   class="col-md-2  control-label">{{trans('describe')}}</label>
            <div class="col-md-4">
                <textarea class="form-control" wire:model="describe">{{ $describe }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold"
                    data-dismiss="modal">
                @lang('Close')
            </button>
            <button type="submit" class="btn btn-primary font-weight-bold">@lang('Add')</button>
        </div>
    </form>


</div>
