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
                <th>No</th>
                <th width="25%">Username</thc>
                <th width="25%">email</th>
                <th width="20%">Total Salary</th>
                <th>Month & Year</th>
                @can('Update All Salary')
                    <th class="text-center">Action</th>
                @elsecan('Detail All Salary')
                    <th class="text-center">Action</th>
                @elsecan('Delete All Salary')
                    <th class="text-center">Action</th>
                @elsecan('PDF All Salary')
                    <th class="text-center">Action</th>
                @endcan
            </thead>

            <tbody>
                @foreach ($salaries as $data)
                    <tr>
                        <td>{{ $salaries->firstItem() + $loop->index }}</td>
                        @if ($data->user)
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->user->email }}</td>
                        @else
                            <td class="text-danger">User Delete</td>
                            <td class="text-danger">User Delete</td>
                        @endif
                        <td class="text-muted">Rp.{{ $data->total_salary }}</td>
                        <td>{{ $data->month . ', ' . $data->year }}</td>

                        @can('Update All Salary')
                            <td>
                                @livewire('salary.edit-salary', ['id' => $data->id], key('salary' . $data->id))
                            </td>
                        @elsecan('Detail All Salary')
                            <td>
                                @livewire('salary.edit-salary', ['id' => $data->id], key('salary' . $data->id))
                            </td>
                        @elsecan('Delete All Salary')
                            <td>
                                @livewire('salary.edit-salary', ['id' => $data->id], key('salary' . $data->id))
                            </td>
                        @elsecan('PDF All Salary')
                            <td>
                                @livewire('salary.edit-salary', ['id' => $data->id], key('salary' . $data->id))
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $salaries->links() }}
    </div>
</div>
