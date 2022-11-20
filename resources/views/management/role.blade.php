@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-2">

            <div class="card-body">
                <h3>Role Management</h3>
                @can('Create Role')
                    @livewire('managament.create-role')
                @endcan

                <div class="row">
                    @can('View Role')
                        @livewire('managament.post-role')
                    @endcan
                </div>
            </div>

        </div>
    </div>
@endsection
