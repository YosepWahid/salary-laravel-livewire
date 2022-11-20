<div>
    <div>
        @include('layouts.session')
        <div x-data="{ 'show': false }" x-on:keydown.escape="show=false">
            <button type="button" class="btn btn-primary btn-sm mb-2" x-on:click="show = true">Create</button>

            <div class="overlay" x-show="show" x-cloak></div>

            <div class="modal-alpine" x-show="show" tabindex="-1" x-cloak x-transition>
                <div class="modal-dialog modal-dialog-scrollable modal-lg card my-3" x-on:click.away="show = false">
                    <div class="modal-content p-3">
                        <div class="modal-header">
                            <h5 class="modal-title">Create First Permission<span class="text-danger">*</span></h5>
                            <button type="button" class="btn-close" x-on:click="show = false"></button>
                        </div>

                        <div class="modal-body px-1 py-4">
                            <div class="mb-3">
                                <label for="role">Role</label>
                                <select id="role" class="form-select form-select-sm" wire:model="role">
                                    <option selected>None</option>
                                    @foreach ($roles as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="permiss">Permission</label>
                                <select id="role" class="form-select form-select-sm" wire:model="permission">
                                    <option selected>None</option>
                                    @foreach ($access as $data)
                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('permission')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer d-flex justify-content-start">
                            <button type="button" class="btn btn-danger me-3" x-on:click="show = false">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="create">Save changes</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
