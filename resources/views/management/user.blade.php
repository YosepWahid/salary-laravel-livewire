@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-2">

            <div class="card-body">
                {{-- gaji --}}
                <h3>User Management</h3>

                @can('Create User')
                    @livewire('managament.create-user')
                @endcan


                <div class="row">
                    @can('View User')
                        @livewire('managament.post-user')
                    @endcan
                </div>
            </div>

        </div>
    </div>
@endsection
