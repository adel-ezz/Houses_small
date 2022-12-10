
<!---Proberties--->
<div class="modal fade form_modal" id="properties" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-scrollable" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('Add Property')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <div class="modal-body">
                <div data-scroll="true">
                    @livewire('addproberties')
                </div>
            </div>

        </div>
    </div>
</div>
<!---Proberties--->


<!--Seasons-->
<div class="modal fade form_modal" id="seasons" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-scrollable" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('Add Seasons')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <div class="modal-body">
                <div data-scroll="true">
                    @livewire('add-seasons')
                </div>
            </div>

        </div>
    </div>
</div>
{{--seasons--}}
