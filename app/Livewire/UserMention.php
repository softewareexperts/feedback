<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserMention extends Component
{  
    public $searchTerm = '';
    public $users = [];

    public function updatedSearchTerm()
    {
        $this->users = User::where('name', 'like', '%' . $this->searchTerm . '%')->get();
    }

    public function selectUser($userId)
    {
        $this->emit('userSelected', $userId);
        $this->reset(); // Clear the search term and user list after selection
    }
    public function render()
    {
        return view('livewire.user-mention');
    }
}
