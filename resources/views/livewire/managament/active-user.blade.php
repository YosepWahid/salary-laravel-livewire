<div>
    <div class="form-check form-switch" wire:click='change({{ $post->id }})'>
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" wire:model='active'>
        <label class="form-check-label" for="flexSwitchCheckDefault">active</label>
    </div>
</div>
