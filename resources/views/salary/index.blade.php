@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-2">
            <div class="card-body">
                <h3>Salary</h3>

                <div class="row">
                    {{-- manual --}}
                    {{-- <div class="col-md-2 col-2">
                        <div x-data="{ 'show': false }" x-on:keydown.escape="show=false">
                            <div class="d-flex align-items-center">
                                <span class="iconify text-warning me-1" data-icon="mdi:edit-box-outline"
                                    x-on:click="show = true" style="cursor: pointer"></span>
                                <span>Manual</span>
                            </div>

                            <div class="overlay" x-show="show" x-cloak></div>

                            <div class="modal-alpine" x-show="show" tabindex="-1" x-cloak x-transition>
                                <div class="modal-dialog modal-dialog-scrollable modal-lg card my-3"
                                    x-on:click.away="show = false">
                                    <div class="modal-content p-3">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create Salary</h5>
                                            <button type="button" class="btn-close" x-on:click="show = false"></button>
                                        </div>

                                        <div class="modal-body">
                                            Page
                                        </div>

                                        <div class="modal-footer d-flex justify-content-start">
                                            <button type="button" class="btn btn-danger me-3"
                                                x-on:click="show = false">Close</button>
                                            <button type="button" class="btn btn-primary" wire:click="create">Save
                                                changes</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> --}}

                    {{-- excel import / export --}}
                    {{-- <div class="col-md-2 col-2">
                        <div x-data="{ 'show': false }" x-on:keydown.escape="show=false">
                            <div class="d-flex align-items-center">
                                <span class="iconify text-warning me-1" data-icon="mdi:edit-box-outline"
                                    x-on:click="show = true" style="cursor: pointer"></span>
                                <span>Manual</span>
                            </div>

                            <div class="overlay" x-show="show" x-cloak></div>

                            <div class="modal-alpine" x-show="show" tabindex="-1" x-cloak x-transition>
                                <div class="modal-dialog modal-dialog-scrollable modal-lg card my-3"
                                    x-on:click.away="show = false">
                                    <div class="modal-content p-3">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create Salary</h5>
                                            <button type="button" class="btn-close" x-on:click="show = false"></button>
                                        </div>

                                        <div class="modal-body">
                                            Page
                                        </div>

                                        <div class="modal-footer d-flex justify-content-start">
                                            <button type="button" class="btn btn-danger me-3"
                                                x-on:click="show = false">Close</button>
                                            <button type="button" class="btn btn-primary" wire:click="create">Save
                                                changes</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
@endsection
