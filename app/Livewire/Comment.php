<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Feedback;
use App\Models\comment as storeComment;

class Comment extends Component
{
    public $commentText = '';
    public $feedbackId;
    public $userId;


    public function addComment()
    {
        // Store the comment with the mention
        $content = $this->commentText;
    

        storeComment::create([
            'feedback_id' => $this->feedbackId,
            'user_id' => $this->userId,
            'content' => $content,
        ]);

        $this->commentText = '';
        $this->dispatch('initEmojiArea'); 

        $this->dispatch('commentAdded');
        session()->flash('message', 'COMMENT ADDED!');
    }
    public function updatedCommentText()
    {
        $this->dispatch('initEmojiArea');
    }


    public function render()
    {
        $comments = Comment::all(); // Retrieve comments from your database

        return view('livewire.comment',['comments' => $comments]);
    }
}
