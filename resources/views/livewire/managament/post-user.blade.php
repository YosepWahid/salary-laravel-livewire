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
                    <th width="25%">Username</th>
                    <th>Email</th>
                    <th>Roles</th>
                    @can('Update User')
                        <th>Active</th>
                        <th>Action</th>
                    @elsecan('Delete User')
                        <th>Action</th>
                    @elsecan('Detail User')
                        <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @role('SuperAdmin')
                    @foreach ($superUser as $data)
                        <tr>
                            <td>{{ $superUser->firstitem() + $loop->index }}</td>
                            <td>{{ $data->name }}</td>
                            <td class="text-muted">{{ $data->email }}</td>
                            <td>{{ $data->roles->pluck('name')->implode('[]', '') }}</td>

                            @if ($data->id == 1)
                                <td class="text-muted">
                                    None Action
                                </td>
                                <td class="text-muted">
                                    None Action
                                </td>
                            @else
                                @can('Update User')
                                    <td>
                                        @livewire('managament.active-user', ['switch' => $data], key('active' . $data->id))
                                    </td>
                                @endcan
                                @can('Update User')
                                    <td>
                                        @livewire('managament.edit-user', ['posting' => $data], key('edit' . $data->id))
                                    </td>
                                @elsecan('Delete User')
                                    <td>
                                        @livewire('managament.edit-user', ['posting' => $data], key('edit' . $data->id))
                                    </td>
                                @elsecan('Detail User')
                                    <td>
                                        @livewire('managament.edit-user', ['posting' => $data], key('edit' . $data->id))
                                    </td>
                                @endcan
                            @endif


                        </tr>
                    @endforeach
                @else
                    @foreach ($user as $data)
                        <tr>
                            <td>{{ $user->firstitem() + $loop->index }}</td>
                            <td>{{ $data->name }}</td>
                            <td class="text-muted">{{ $data->email }}</td>
                            <td>{{ $data->roles->pluck('name')->implode('[]', '') }}</td>

                            @can('Update User')
                                <td>
                                    @livewire('managament.active-user', ['switch' => $data], key('active' . $data->id))
                                </td>
                            @endcan

                            @can('Update User')
                                <td>
                                    @livewire('managament.edit-user', ['posting' => $data], key('edit' . $data->id))
                                </td>
                            @elsecan('Delete User')
                                <td>
                                    @livewire('managament.edit-user', ['posting' => $data], key('edit' . $data->id))
                                </td>
                            @elsecan('Detail User')
                                <td>
                                    @livewire('managament.edit-user', ['posting' => $data], key('edit' . $data->id))
                                </td>
                            @endcan

                        </tr>
                    @endforeach
                @endrole
            </tbody>
        </table>

        @role('SuperAdmin')
            {{ $superUser->links() }}
        @else
            {{ $user->links() }}
        @endrole
    </div>
</div>
