<div>

    @if(count($seasons) >0)

        <h2 class="text-center">@lang('Prices for seasons')
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#seasons">+</button>
        </h2>
        <hr>

        @foreach($seasons as $season)
            <div class="form-group row">
                <label for="default_price"
                       class="col-md-2  control-label">{{ $season->name }} _ price</label>
                <div class="col-md-10">
                    <input type="number" id="season_{{ $season->id }}" name="season_price[{{ $season->id }}]"
                           value="{{ $house && isset($season_vlaues[$season->id]) ? $season_vlaues[$season->id] : old('season_price['.$season->id.']')   }}"
                           class="form-control"
                           placeholder="1000"/>
                </div>
            </div>

        @endforeach

    @endif
</div>
