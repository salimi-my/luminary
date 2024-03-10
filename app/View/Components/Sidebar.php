<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->join('posts', 'posts.id', '=', 'category_post.post_id')
            ->where('posts.active', true)
            ->selectRaw('categories.title, categories.slug, count(*) as total')
            ->groupBy(['categories.title', 'categories.slug'])
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        return view('components.sidebar', compact('categories'));
    }
}
