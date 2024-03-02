<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;

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
}
