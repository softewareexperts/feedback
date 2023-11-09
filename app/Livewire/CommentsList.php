<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Feedback;
use App\Models\User;
use App\Models\comment;

class CommentsList extends Component
{
    public $feedbackId;

    protected $listeners = ['commentAdded' => 'refreshList'];

    public function refreshList()
    {
        return view('livewire.comments-list', [
            'comments' => comment::with('user')->where('feedback_id', $this->feedbackId)->get(),
        ]);
    }

    public function render()
    {
        return view('livewire.comments-list', [
            'comments' => comment::where('feedback_id', $this->feedbackId)->get(),
        ]);
    }
}
