<div class="d-flex align-items-center">
    <!--session-->
    @include('layouts.session')

    <!--detail-->
    @can('Detail User')
        @include('livewire.managament.edituser.detail-user')
    @endcan

    <!--update-->
    @can('Update User')
        @include('livewire.managament.edituser.update-user')
    @endcan

    <!--delete-->
    @can('Delete User')
        @include('livewire.managament.edituser.delete-user')
    @endcan
</div>
