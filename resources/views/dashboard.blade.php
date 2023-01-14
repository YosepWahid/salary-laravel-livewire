@extends('layouts.app')

@section('content')
    @if (count(auth()->user()->roles) != 0)
        <div class="container">
            {{-- chart salary for employee --}}
            @unlessrole('SuperAdmin')
                @can('View Chartpie Salary')
                    <div class="card">
                        @livewire('dashboard.mount-chartpie-user')
                    </div>
                @elsecan('View Super Chartpie Salary')
                    <div class="card mt-3">
                        @livewire('dashboard.mount-chartpie-super')
                    </div>
                @elsecan('View Super Modal')
                    @livewire('dashboard.mount-modal')
                @else
                    <div class="container text-center">
                        <div class="row justify-content-center align-items-center" style="height: 80vh">
                            <h4 class="text-muted">No Have Permission</h4>
                        </div>
                    </div>
                @endcan
            @else
                @can('View Super Modal')
                    <div class="mb-4">
                        @livewire('dashboard.mount-modal')
                    </div>
                @endcan

                @can('View Chartpie Salary')
                    <div class="card">
                        @livewire('dashboard.mount-chartpie-user')
                    </div>
                @endcan

                @can('View Super Chartpie Salary')
                    <div class="card mt-3">
                        @livewire('dashboard.mount-chartpie-super')
                    </div>
                @endcan

                @cannot('View Super Chartpie Salary')
                    <div class="container text-center">
                        <div class="row justify-content-center align-items-center" style="height: 80vh">
                            <h4 class="text-muted">No Have Permission</h4>
                        </div>
                    </div>
                @elsecannot('View Chartpie Salary')
                    <div class="container text-center">
                        <div class="row justify-content-center align-items-center" style="height: 80vh">
                            <h4 class="text-muted">No Have Permission</h4>
                        </div>
                    </div>
                @endcannot
            @endrole
        </div>
    @else
        @cannot('View Chartpie Salary')
            <div class="container text-center">
                <div class="row justify-content-center align-items-center" style="height: 80vh">
                    <h4 class="text-muted">No Have Permission</h4>
                </div>
            </div>
        @elsecannot('View Chartpie Salary')
            <div class="container text-center">
                <div class="row justify-content-center align-items-center" style="height: 80vh">
                    <h4 class="text-muted">No Have Permission</h4>
                </div>
            </div>
        @else
            <div class="container text-center">
                <div class="row justify-content-center align-items-center" style="height: 80vh">
                    <h4 class="text-muted">No Permission & Role</h4>
                </div>
            </div>
        @endcannot
    @endunlessrole
@endsection
