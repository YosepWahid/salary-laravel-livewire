@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-2">

            <div class="card-body">
                <h3>Permission Management</h3>
                @can('Create Permission')
                    @livewire('managament.create-permission')
                @endcan

                <div class="row">
                    @can('View Permission')
                        @livewire('managament.post-permission')
                    @endcan
                </div>
            </div>

        </div>
    </div>
@endsection
