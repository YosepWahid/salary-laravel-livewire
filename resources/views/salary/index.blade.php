@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-1">
            <div class="card-body">
                <h3>All Salary</h3>
                <div class="row">
                    {{-- manual --}}
                    @can('Create All Salary')
                        <div class="col-md-10 col-4">
                            @livewire('salary.create-manual-salary')
                        </div>
                    @endcan

                    {{-- excel import & download --}}
                    @can('Import All Salary')
                        <div class="col-md-1 col-4">
                            @livewire('salary.create-import-salary')
                        </div>
                        <div class="col-md-1 col-4">
                            @livewire('salary.downloadtemplate-salary')
                        </div>
                    @endcan


                    @can('View All Salary')
                        <div class="col-md-12 col-12">
                            @livewire('salary.post-salary')
                        </div>
                    @endcan
                </div>
            </div>

        </div>
    </div>
@endsection
