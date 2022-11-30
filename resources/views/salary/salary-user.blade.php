@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-2">
            <div class="card-body">
                <h3>User Salary</h3>


                @can('View User Salary')
                    <div class="row">
                        @livewire('salary.post-user-salary')
                    </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
