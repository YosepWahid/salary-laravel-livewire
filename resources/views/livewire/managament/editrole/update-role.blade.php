<div x-data="{ 'update': false }" x-on:keydown.escape="update=false">
    <span class="iconify text-warning" data-icon="mdi:edit-box-outline" x-on:click="update = true"
        style="cursor: pointer"></span>

    <div class="overlay" x-show="update" x-cloak></div>

    <div class="modal-alpine" x-show="update" tabindex="-1" x-cloak x-transition>
        <div class="modal-dialog modal-dialog-scrollable modal-lg card my-3" x-on:click.away="update = false">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">Update Role</h5>
                    <button type="button" class="btn-close" x-on:click="update = false"></button>
                </div>

                <div class="modal-body px-1 py-4">
                    <input type="text" id="nameRole" wire:model.defer="role" class="form-control"
                        placeholder="name">
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="modal-footer d-flex justify-content-start">
                    <button type="button" class="btn btn-danger me-3" x-on:click="update = false">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="update({{ $post->id }})">Save
                        changes</button>
                </div>

            </div>
        </div>
    </div>

</div>
