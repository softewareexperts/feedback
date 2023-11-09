<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Vote;

class VoteFeedback extends Component
{
    public $voteCount = 0;
    public $feedbackId;
    public $productId;
    
    public function vote()
    {
        $userId = auth()->user()->id;
        $existingVote = Vote::where('feedback_id', $this->feedbackId)
            ->where('user_id', $userId)
            ->first();
        $productId = $this->productId;
        if (!$existingVote) {
            Vote::create([
                'feedback_id' => $this->feedbackId,
                'user_id' => $userId,
                'product_id' => $productId,
                'is_upvote' => 1,
            ]);
    
        } else {
            dd('aready voted');
        }
        
        $this->voteCount = $this->calculateVoteCount($this->feedbackId);
    }

    public function calculateVoteCount($feedbackId)
    {
        $voteCount = Vote::where('feedback_id', $feedbackId,)->sum('is_upvote');
        
        return $voteCount;
    }
    
    public function render()
    {
        $feedback = Feedback::find($this->feedbackId);
    
        return view('livewire.vote-feedback', [
            'feedback' => $feedback,
        ]);
    }
    
}
