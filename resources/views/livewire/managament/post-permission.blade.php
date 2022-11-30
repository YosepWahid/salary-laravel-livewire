<div>
    <div class="d-flex justify-content-between">
        <section class="d-flex align-items-center">
            <select class="form-select form-select-sm" wire:model="show">
                <option value="5">data</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <label class="form-label ms-2 text-muted mt-2">Show</label>
        </section>

        <section>
            <input type="search" placeholder="search name" class="form-control" wire:model="search">
        </section>

    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="50%">Role</th>
                    <th>Permission Count</th>
                    @can('Update Permission')
                        <th>Action</th>
                    @elsecan('Delete Permission')
                        <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @role('SuperAdmin')
                    @foreach ($superRoles as $data)
                        <tr>
                            @if ($data->name == 'SuperAdmin')
                                <td>{{ $superRoles->firstitem() + $loop->index }}</td>
                                <td>{{ $data->name }}</td>
                                <td class="text-muted">
                                    None Count
                                </td>
                                <td class="text-muted">
                                    None Action
                                </td>
                            @else
                                <td>{{ $superRoles->firstitem() + $loop->index }}</td>
                                <td>{{ $data->name }}</td>
                                <td>Total : {{ $data->permissions->count() }}</td>
                                @can('Update Permission')
                                    <td>
                                        @livewire('managament.edit-permission', ['posting' => $data], key('posting' . $data->id))
                                    </td>
                                @elsecan('Delete Permission')
                                    <td>
                                        @livewire('managament.edit-permission', ['posting' => $data], key('posting' . $data->id))
                                    </td>
                                @endcan
                            @endif
                        </tr>
                    @endforeach
                @else
                    @foreach ($roles as $data)
                        <tr>
                            <td>{{ $roles->firstitem() + $loop->index }}</td>
                            <td>{{ $data->name }}</td>
                            <td>Total : {{ $data->permissions->count() }}</td>
                            @can('Update Permission')
                                <td>
                                    @livewire('managament.edit-permission', ['posting' => $data], key('permission', $data->id))
                                </td>
                            @elsecan('Delete Permission')
                                <td>
                                    @livewire('managament.edit-permission', ['posting' => $data], key('permission', $data->id))
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                @endrole
            </tbody>
        </table>

        @role('SuperAdmin')
            {{ $superRoles->links() }}
        @else
            {{ $roles->links() }}
        @endrole
    </div>
</div>
