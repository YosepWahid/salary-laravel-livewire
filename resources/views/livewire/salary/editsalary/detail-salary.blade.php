<section>
    <div x-data="{ 'detail': false }" x-on:keydown.escape="detail=false">
        <span class="iconify text-primary" data-icon="clarity:details-line" x-on:click="detail = true"
            style="cursor: pointer"></span>


        <div class="overlay" x-show="detail" x-cloak></div>

        <div class="modal-alpine" x-show="detail" tabindex="-1" x-cloak x-transition>
            <div class="modal-dialog modal-lg card modal-dialog-scrollable mt-3" x-on:click.away="detail = false">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Salary</h5>
                        <button type="button" class="btn-close" x-on:click="detail = false"></button>
                    </div>

                    <div class="modal-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $detail }}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ol class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Basic Salary</div>
                                                    Rp.{{ $basic_salary }}
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Position Salary</div>
                                                    Rp.{{ $position_salary }}
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Overtime Salary</div>
                                                    Rp.{{ $overtime_salary }}
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Piece</div>
                                                    -Rp.{{ $overtime_salary }}
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Created at</div>
                                                    {{ $created_at }}
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
