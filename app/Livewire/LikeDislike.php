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

    public function likeDislike($like = true)
    {
        /** @var \App\Models\User $user */
        $user = request()->user();

        if (!$user) {
            return $this->redirect('login');
        }

        if (!$user->hasVerifiedEmail()) {
            return $this->redirect('verification.notice');
        }

        $likeDislike = ModelsLikeDislike::where('post_id', '=', $this->post->id)
            ->where('user_id', '=', $user->id)
            ->first();

        if (!$likeDislike) {
            ModelsLikeDislike::create([
                'post_id' => $this->post->id,
                'user_id' => $user->id,
                'is_like' => $like
            ]);

            return;
        }

        if ($likeDislike->is_like == $like) {
            $likeDislike->delete();
        } else {
            $likeDislike->is_like = $like;
            $likeDislike->save();
        }
    }
}
