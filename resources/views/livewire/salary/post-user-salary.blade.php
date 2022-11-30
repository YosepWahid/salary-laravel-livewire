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
                <th width="25%">Username</th>
                <th width="25%">email</th>
                <th width="20%">Total Salary</th>
                <th>Month & Year</th>
                @can('Detail User Salary')
                    <th class="text-center">Action</th>
                @elsecan('PDF User Salary')
                    <th class="text-center">Action</th>
                @endcan
            </thead>

            <tbody>
                @foreach ($salaries as $data)
                    <tr>
                        <td>{{ $salaries->firstItem() + $loop->index }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->user->email }}</td>
                        <td class="text-muted">Rp.{{ $data->total_salary }}</td>
                        <td>{{ $data->month . ', ' . $data->year }}</td>
                        @can('Detail User Salary')
                            <td>
                                @livewire('salary.edit-user-salary', ['id' => $data->id], key('salary' . $data->id))
                            </td>
                        @elsecan('PDF User Salary')
                            <td>
                                @livewire('salary.edit-user-salary', ['id' => $data->id], key('salary' . $data->id))
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $salaries->links() }}
    </div>
</div>
