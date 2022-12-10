<div>
    @if(count($properties) >0)
        <h2 class="text-center">@lang('properties')
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#properties">+</button>
        </h2>
        <hr>
        <div class="form-group row">
            <div class="col-md-4">
                <label class="checkbox checkbox-success">
                    <input type="checkbox" wire:model="check_all"/>
                    <span></span>
                    <label class="col-md-6">@lang('all')</label>
                </label>
            </div>
            @foreach($properties as $property)
                <div class="col-md-4">
                    <label class="checkbox checkbox-success">
                        <input type="checkbox"
                               {{ $check_all ?'checked':'' }}
                               name="properties[{{ $property->id }}]" {{ in_array($property->id,$selected_proberties)?'checked':'' }}/>
                        <span></span>
                        <label class="col-md-6"> {{ $property->title }}</label>
                    </label>
                </div>
            @endforeach
        </div>
    @endif


</div>
