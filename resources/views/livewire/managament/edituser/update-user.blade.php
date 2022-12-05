<div x-data="{ 'update': false }" x-on:keydown.escape="update=false">
    <span class="iconify text-warning" data-icon="mdi:edit-box-outline" x-on:click="update = true"
        style="cursor: pointer"></span>

    <div class="overlay" x-show="update" x-cloak></div>

    <div class="modal-alpine" x-show="update" tabindex="-1" x-cloak x-transition>
        <div class="modal-dialog modal-dialog-scrollable modal-lg card my-3" x-on:click.away="update = false">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">Update User</h5>
                    <button type="button" class="btn-close" x-on:click="update = false"></button>
                </div>

                <div class="modal-body px-1">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                            wire:model.defer='active'>
                        <label class="form-check-label" for="flexSwitchCheckDefault">active</label>
                    </div>


                    <!--username-->
                    <div class="mb-3">
                        <label for="Username" class="form-label">Username<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="Username" placeholder="Username"
                            wire:model.defer="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!--email-->
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="Email" placeholder="Email"
                            wire:model.defer="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!--password-->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            wire:model.defer="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!--password verify-->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Verify
                        </label>
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            wire:model.defer="password_verify">
                        @error('password_verify')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!--work unit-->
                    <div class="mb-3">
                        <label for="unit" class="form-label">Work Unit</label>
                        <select id="unit" class="form-select" wire:model.defer="work_unit">
                            <option value="">none</option>
                            <option value="Divisi 1">Divisi 1</option>
                            <option value="Divisi 1">Divisi 2</option>
                            <option value="Divisi 1">Divisi 3</option>
                            <option value="Divisi 1">Divisi 4</option>
                            <option value="Divisi 1">Divisi 5</option>
                        </select>
                    </div>

                    <!--role-->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" class="form-select" wire:model.defer="role">
                            <option value="">none</option>
                            @role('SuperAdmin')
                                @foreach ($superRole as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            @else
                                @foreach ($roles as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            @endrole
                        </select>
                    </div>

                    <!--address-->
                    <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <textarea class="form-control" id="Address" placeholder="Address" wire:model.defer="address" rows="4"></textarea>
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
