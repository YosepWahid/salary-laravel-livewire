<div>
    @include('layouts.session')

    <div x-data="{ 'show': false }" x-on:keydown.escape="show=false">
        <div class="d-flex align-items-center">
            <span class="iconify text-success me-1" data-icon="ri:file-excel-2-fill" x-on:click="show = true"
                style="cursor: pointer"></span>
            <span class="mt-1" x-on:click="show = true" style="cursor: pointer">Import</span>
        </div>

        <div class="overlay" x-show="show" x-cloak></div>

        <div class="modal-alpine" x-show="show" tabindex="-1" x-cloak x-transition>
            <div class="modal-dialog modal-dialog-scrollable modal-lg card my-3" x-on:click.away="show = false">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Import</h5>
                        <button type="button" class="btn-close" x-on:click="show = false"></button>
                    </div>

                    <div class="modal-body px-1 py-2">
                        <div class="mb-3">
                            <label for="user" class="form-label mb-0">User
                                <span class="text-danger">*</span>
                            </label>

                            <select id="user" wire:model="user_id" class="form-select">
                                <option selected>none</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                            @error('user_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="excel" class="form-label mb-0">File
                                <span class="text-danger">*</span>
                            </label>

                            <input type="file" class="form-control" id="excel{{ $iteration }}" wire:model="file">

                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer d-flex justify-content-start">
                        <button type="button" class="btn btn-danger me-3" x-on:click="show = false">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="create">Save
                            changes</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
