<div class="d-flex align-items-center">
    <!--session-->
    @include('layouts.session')

    <!--update-->
    @can('Update Permission')
        @include('livewire.managament.editpermissions.update-permission')
    @endcan

    <!--delete-->
    @can('Delete Permission')
        @include('livewire.managament.editpermissions.delete-permission')
    @endcan


</div>
