<div>
<a href="#!" class="d-flex align-items-center me-3" wire:click="vote">
        <i class="far fa-thumbs-up me-2"></i>
        <p class="mb-0">Vote ({{ $voteCount }})</p>
    </a>
    @if (session()->has('successMessage'))
        <div class="alert alert-success">{{ session('successMessage') }}</div>
    @endif
</div>
