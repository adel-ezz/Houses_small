<div>
    <form wire:submit.prevent="submit()">

        @if ($errors->has('not-allowed'))
            <p style="color: red;">{{$errors->first('not-allowed')}}</p>
        @endif
        <div class="form-group row">
            <label for="old_price"
                   class="col-md-2  control-label">{{trans('name')}}</label>
            <div class="col-md-4">
                <input type="text" id="title" wire:model="name"
                       value="{{old('name')}}"
                       class="form-control"
                       placeholder="{{trans('name')}}" required/>
                @if ($errors->has('name'))
                    <p style="color: red;">{{$errors->first('name')}}</p>
                @endif
            </div>
            <label for="new_price"
                   class="col-md-2  control-label">{{trans('describe')}}</label>
            <div class="col-md-4">
                <textarea wire:model="describe" class="form-control">{{ old('describe') }}</textarea>
                @if ($errors->has('describe'))
                    <p style="color: red;">{{$errors->first('describe')}}</p>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="start"
                   class="col-md-2  control-label">{{trans('start')}}</label>
            <div class="col-md-10">
                <input type="text" id="start" wire:model="start"
                       value="{{old('start')}}"
                       class="form-control datepicker"

                       placeholder="{{trans('start')}}" required/>
                @if ($errors->has('start'))
                    <p style="color: red;">{{$errors->first('start')}}</p>
                @endif
            </div>

            <label for="end"
                   class="col-md-2  control-label">{{trans('end')}}</label>
            <div class="col-md-10">
                <input type="text" id="end" wire:model="end"
                       value="{{old('end')}}"
                       class="form-control datepicker"
                       placeholder="{{trans('end')}}" required/>
                @if ($errors->has('end'))
                    <p style="color: red;">{{$errors->first('end')}}</p>
                @endif
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

@push('js')
    <script>
        $(document).ready(function () {
            $('#start').on('change', function (e) {
                let data = $(this).val();
            @this.set('start', data);
            });

            $('#end').on('change', function (e) {
                let data = $(this).val();
            @this.set('end', data);
            });
        });
    </script>
@endpush
