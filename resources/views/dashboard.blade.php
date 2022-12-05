@extends('layouts.app')

@section('content')
    @if (count(auth()->user()->roles) != 0)
        <div class="container">
            {{-- chart salary for employee --}}
            @can('View Chartpie Salary')
                <div class="card">
                    @livewire('dashboard.mount-chartpie-user')
                </div>
            @endcan

            {{-- chart salary for treasurer --}}
            @can('View Super Chartpie Salary')
                <div class="card mt-3">
                    @livewire('dashboard.mount-chartpie-super')
                </div>
            @endcan
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
    @endif
@endsection
