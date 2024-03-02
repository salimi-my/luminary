<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentCreate extends Component
{
    public $content = '';

    public Post $post;
    public ?Comment $commentModel = null;

    public function mount(Post $post, $commentModel = null)
    {
        $this->post = $post;
        $this->commentModel = $commentModel;
        $this->content = $commentModel ? $commentModel->content : '';
    }

    public function render()
    {
        return view('livewire.comment-create');
    }

    public function createComment()
    {
        $user = auth()->user();
        if (!$user) {
            return $this->redirect('/login');
        }

        if ($this->commentModel) {
            if ($this->commentModel->user_id != $user->id) {
                return response('You are not allowed to perform this action.', 403);
            }

            $this->commentModel->content = $this->content;
            $this->commentModel->save();

            // Dispatch the event
            $this->dispatch('commentUpdated');

            // Reset the input fields
            $this->reset('content');
        } else {
            Comment::create([
                'content' => $this->content,
                'post_id' => $this->post->id,
                'user_id' => $user->id,
            ]);

            // Dispatch the event
            $this->dispatch('commentCreated');

            // Reset the input fields
            $this->reset('content');
        }
    }
}
