<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;

class Comments extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $comments = Comment::where('post_id', '=', $this->post->id)
            ->with(['post', 'user', 'replies'])
            ->where('parent_id', '=', null)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.comments', compact('comments'));
    }

    #[On(['commentCreated', 'commentDeleted'])]
    public function updateCommentList()
    {
        $this->render();
    }
}
