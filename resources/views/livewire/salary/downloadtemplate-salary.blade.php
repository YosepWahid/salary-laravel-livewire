<div>
    <div x-data="{ 'show': false }" x-on:keydown.escape="show=false">
        <div class="d-flex align-items-center">
            <span class="iconify text-secondary" data-icon="mdi:download-box-outline" x-on:click="show = true"
                style="cursor: pointer"></span>
            <span class="mt-1" x-on:click="show = true" style="cursor: pointer">Down</span>
        </div>

        <div class="overlay" x-show="show" x-cloak></div>

        <div class="modal-alpine" x-show="show" tabindex="-1" x-cloak x-transition>
            <div class="modal-dialog modal-dialog-scrollable modal-sm card my-3" x-on:click.away="show = false">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Template</h5>
                        <button type="button" class="btn-close" x-on:click="show = false"></button>
                    </div>

                    <div class="modal-body text-center p-5">
                        <h3>
                            Download
                        </h3>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-danger me-5" x-on:click="show = false">No</button>
                        <button type="button" class="btn btn-primary" wire:click="create">Yes</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
