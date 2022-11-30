<div x-data="{ 'remove': false }" x-on:keydown.escape="remove = false">
    <span class="iconify text-danger" data-icon="material-symbols:delete-outline-sharp" x-on:click="remove = true"
        style="cursor: pointer"></span>

    <div class="overlay" x-show="remove" x-cloak></div>

    <div class="modal-alpine" x-show="remove" tabindex="-1" x-cloak x-transition>
        <div class="modal-dialog modal-lg card mt-3" x-on:click.away="remove = false">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Salary</h5>
                    <button type="button" class="btn-close" x-on:click="remove = false"></button>
                </div>

                <div class="modal-body text-center p-5">
                    <h3>
                        Sure? Remove The Salary.
                    </h3>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-primary btn-sm me-3"
                        x-on:click="remove = false">Close</button>
                    <button type="button" class="btn btn-danger btn-sm"
                        wire:click="delete({{ $post->id }})">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
