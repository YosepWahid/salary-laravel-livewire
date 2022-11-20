<section>
    <div x-data="{ 'detail': false }" x-on:keydown.escape="detail=false">
        <span class="iconify text-primary" data-icon="clarity:details-line" x-on:click="detail = true"
            style="cursor: pointer"></span>


        <div class="overlay" x-show="detail" x-cloak></div>

        <div class="modal-alpine" x-show="detail" tabindex="-1" x-cloak x-transition>
            <div class="modal-dialog modal-lg card modal-dialog-scrollable mt-3" x-on:click.away="detail = false">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail User</h5>
                        <button type="button" class="btn-close" x-on:click="detail = false"></button>
                    </div>

                    <div class="modal-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $name }}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ol class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Email</div>
                                                    {{ $email }}
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">address</div>
                                                    {{ $address }}
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">WorkUnit</div>
                                                    {{ $work_unit }}
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
