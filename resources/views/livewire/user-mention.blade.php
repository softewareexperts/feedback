<!-- resources/views/livewire/user-mention.blade.php -->

<div>
    <input type="text" wire:model="searchTerm" placeholder="Type @ to mention a user">

    @if(count($users) > 0)
        <ul>
            @foreach ($users as $user)
                <li wire:click="selectUser({{ $user->id }})">@mention({{ $user->name }})</li>
            @endforeach
        </ul>
    @endif
</div>
