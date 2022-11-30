<div class="d-flex align-item-center">
    {{-- session --}}
    @include('layouts.session')

    {{-- detail --}}
    @can('Detail All Salary')
        @include('livewire.salary.editsalary.detail-salary')
    @endcan


    {{-- update --}}
    @can('Update All Salary')
        @if ($relation)
            @include('livewire.salary.editsalary.update-salary')
        @endif
    @endcan


    {{-- delete --}}
    @can('Delete All Salary')
        @include('livewire.salary.editsalary.delete-salary')
    @endcan

    {{-- pdf --}}
    @can('PDF All Salary')
        @if ($relation)
            @include('livewire.salary.editsalary.pdf-salary')
        @endif
    @endcan
</div>
