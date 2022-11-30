<div>
    @include('layouts.session')

    <div x-data="{ 'show': false }" x-on:keydown.escape="show=false">
        <button type="button" class="btn btn-primary btn-sm mb-2" x-on:click="show = true">Create</button>

        <div class="overlay" x-show="show" x-cloak></div>

        <div class="modal-alpine" x-show="show" tabindex="-1" x-cloak x-transition>
            <div class="modal-dialog modal-dialog-scrollable modal-lg card my-3" x-on:click.away="show = false">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Salary</h5>
                        <button type="button" class="btn-close" x-on:click="show = false"></button>
                    </div>

                    <div class="modal-body px-1 py-2">
                        <div class="card card-body text-center mb-3">
                            <h2>RP.{{ $total_salary }}</h2>
                        </div>

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
                            <label for="basic" class="form-label mb-0">Basic Salary
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control" id="basic" placeholder="Rupiah"
                                min="1" wire:model="basic_salary"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                            @error('basic_salary')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label mb-0">Position Salary
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control" id="position" placeholder="Rupiah"
                                min="1" wire:model="position_salary"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                            @error('position_salary')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="overtime" class="form-label mb-0">Overtime Salary
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control" id="overtime" placeholder="Rupiah"
                                min="1" wire:model="overtime_salary"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                            @error('overtime_salary')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Piece" class="form-label mb-0">Piece
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control" id="Piece" placeholder="Rupiah"
                                min="1" wire:model="piece"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                            @error('piece')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="MontYear" class="form-label mb-0">Month & Year
                                <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" id="MonthYear" wire:model="monthYear">
                            @error('monthYear')
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
