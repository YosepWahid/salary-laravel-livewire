<div x-data="{ 'update': false }" x-on:keydown.escape="update=false">
    <span class="iconify text-warning" data-icon="mdi:edit-box-outline" x-on:click="update = true"
        style="cursor: pointer"></span>

    <div class="overlay" x-show="update" x-cloak></div>

    <div class="modal-alpine" x-show="update" tabindex="-1" x-cloak x-transition>
        <div class="modal-dialog modal-dialog-scrollable modal-xl card my-3" x-on:click.away="update = false">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">Update User</h5>
                    <button type="button" class="btn-close" x-on:click="update = false"></button>
                </div>

                <div class="modal-body px-1 py-3 row">
                    <div class="col-md-6 mb-3">
                        <h5 class="text-muted">Permission Active</h5>
                        @foreach ($access_active as $data)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $data }}" checked
                                    wire:model.defer='access_active'>
                                <label class="form-check-label">
                                    {{ $data }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-6 mb-3">
                        <h5- class="text-muted">Permission No Active</h5->
                        @foreach ($access_no_active as $data => $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $item->name }}"
                                    wire:model.defer="permission.{{ $item->id }}">
                                <label class="form-check-label">
                                    {{ $item->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
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
