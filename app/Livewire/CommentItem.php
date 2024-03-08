<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;

class CommentItem extends Component
{
    public Comment $comment;

    public $editing = false;
    public $replying = false;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.comment-item');
    }

    public function deleteComment()
    {
        $user = auth()->user();
        if (!$user) {
            return $this->redirect('/login');
        }

        if ($this->comment->user_id != $user->id) {
            return response('You are not allowed to perform this action', 403);
        }

        // Delete the comment
        $this->comment->delete();

        // Dispatch the event
        $this->dispatch('commentDeleted');
    }

    public function startEditComment()
    {
        $this->editing = true;
    }

    #[On(['cancelEditing', 'commentUpdated'])]
    public function stopEditComment()
    {
        $this->editing = false;
        $this->replying = false;
    }

    public function startReplyComment()
    {
        $this->replying = true;
    }

    #[On(['commentCreated'])]
    public function stopReplyComment()
    {
        $this->replying = false;
    }
}
