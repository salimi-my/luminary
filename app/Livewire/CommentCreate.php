<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentCreate extends Component
{
    public $content = '';

    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
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

        $comment = Comment::create([
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
