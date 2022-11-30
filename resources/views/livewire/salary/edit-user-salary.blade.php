<div class="d-flex justify-content-center">
    {{-- detail --}}
    @can('Detail User Salary')
        @include('livewire.salary.editsalaryUser.detail-user-salary')
    @endcan

    {{-- pdf --}}
    @can('PDF User Salary')
        @include('livewire.salary.editsalaryUser.pdf-user-salary')
    @endcan
</div>
