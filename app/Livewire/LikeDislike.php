<?php

namespace App\Livewire;

use App\Models\LikeDislike as ModelsLikeDislike;
use App\Models\Post;
use Livewire\Component;

class LikeDislike extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $likes = ModelsLikeDislike::where('post_id', $this->post->id)
            ->where('is_like', '=', true)
            ->count();

        $dislikes = ModelsLikeDislike::where('post_id', $this->post->id)
            ->where('is_like', '=', false)
            ->count();

        return view('livewire.like-dislike', compact('likes', 'dislikes'));
    }
}
