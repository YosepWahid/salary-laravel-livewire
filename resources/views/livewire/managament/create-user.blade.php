<div>
    @include('layouts.session')
    <div x-data="{ 'show': false }" x-on:keydown.escape="show=false">
        <button type="button" class="btn btn-primary btn-sm mb-2" x-on:click="show = true">Create</button>

        <div class="overlay" x-show="show" x-cloak></div>

        <div class="modal-alpine" x-show="show" tabindex="-1" x-cloak x-transition>
            <div class="modal-dialog modal-dialog-scrollable modal-lg card my-3" x-on:click.away="show = false">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Create User</h5>
                        <button type="button" class="btn-close" x-on:click="show = false"></button>
                    </div>

                    <div class="modal-body px-1">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                wire:model='active'>
                            <label class="form-check-label" for="flexSwitchCheckDefault">active</label>
                        </div>


                        <!--username-->
                        <div class="mb-3">
                            <label for="Username" class="form-label">Username<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="Username" placeholder="Username"
                                wire:model="name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--email-->
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="Email" placeholder="Email"
                                wire:model="email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--password-->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                wire:model="password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--password verify-->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Verify<span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                wire:model="password_verify">
                            @error('password_verify')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--work unit-->
                        <div class="mb-3">
                            <label for="unit" class="form-label">Work Unit</label>
                            <select id="unit" class="form-select" wire:model="work_unit">
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
                            <select id="role" class="form-select" wire:model="role">
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
                            <textarea class="form-control" id="Address" placeholder="Address" wire:model="address" rows="4"></textarea>
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
