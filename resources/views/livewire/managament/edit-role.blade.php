<div class="d-flex align-items-center">
    @include('layouts.session')

    <!--update-->
    @can('Update Role')
        @include('livewire.managament.editrole.update-role')
    @endcan

    <!--delete-->
    @can('Delete Role')
        @include('livewire.managament.editrole.delete-role')
    @endcan

</div>
