<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LikeDislike;
use App\Models\Post;
use App\Models\PostView;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Latest post
        $latestPost = Post::where('active', '=', true)
            ->whereDate('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->first();

        // Top 5 popular posts based on likes count
        $popularPosts = Post::join('like_dislikes', 'posts.id', '=', 'like_dislikes.post_id')
            ->selectRaw('posts.*, COUNT(like_dislikes.id) as likes_count')
            ->where('posts.active', '=', true)
            ->whereDate('posts.published_at', '<=', now())
            ->where('like_dislikes.is_like', '=', true)
            ->groupBy([
                'posts.id',
                'posts.title',
                'posts.slug',
                'posts.thumbnail',
                'posts.body',
                'posts.active',
                'posts.published_at',
                'posts.user_id',
                'posts.created_at',
                'posts.updated_at',
                'posts.meta_title',
                'posts.meta_description',
            ])
            ->orderBy('likes_count', 'desc')
            ->limit(5)
            ->get();

        // Get logged in user
        $user = auth()->user();

        // If user exist, show recommended posts based on user likes
        if ($user) {
            $userLikesCategory = LikeDislike::join('category_post', 'like_dislikes.post_id', '=', 'category_post.post_id')
                ->where('like_dislikes.is_like', true)
                ->where('like_dislikes.user_id', $user->id)
                ->select('category_post.category_id', 'category_post.post_id');

            $recommendedPosts = Post::select('posts.*')
                ->leftJoin('category_post', 'posts.id', '=', 'category_post.post_id')
                ->leftJoinSub($userLikesCategory, 'userLikesCategory', function (JoinClause $join) {
                    $join->on('userLikesCategory.category_id', '=', 'category_post.category_id')
                        ->on('userLikesCategory.post_id', '<>', 'category_post.post_id');
                })
                ->where('posts.active', '=', true)
                ->whereDate('posts.published_at', '<=', now())
                ->groupBy([
                    'posts.id',
                    'posts.title',
                    'posts.slug',
                    'posts.thumbnail',
                    'posts.body',
                    'posts.active',
                    'posts.published_at',
                    'posts.user_id',
                    'posts.created_at',
                    'posts.updated_at',
                    'posts.meta_title',
                    'posts.meta_description',
                ])
                ->whereRaw('posts.id <> userLikesCategory.post_id')
                ->limit(3)
                ->get();
        }

        // If user not exist, show recommended posts based on views count
        else {
            $recommendedPosts = Post::join('post_views', 'posts.id', '=', 'post_views.post_id')
                ->selectRaw('posts.*, COUNT(post_views.id) as views_count')
                ->where('posts.active', '=', true)
                ->whereDate('posts.published_at', '<=', now())
                ->groupBy([
                    'posts.id',
                    'posts.title',
                    'posts.slug',
                    'posts.thumbnail',
                    'posts.body',
                    'posts.active',
                    'posts.published_at',
                    'posts.user_id',
                    'posts.created_at',
                    'posts.updated_at',
                    'posts.meta_title',
                    'posts.meta_description',
                ])
                ->orderBy('views_count', 'desc')
                ->limit(3)
                ->get();
        }

        return view('home', compact('latestPost', 'popularPosts', 'recommendedPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, Request $request)
    {
        // Check if the post is active and has been published
        if (!$post->active || $post->published_at > now()) {
            throw new NotFoundHttpException();
        }

        // Get the next post based on the publication date
        $next = Post::where('active', true)
            ->where('published_at', '<=', now())
            ->where('published_at', '<', $post->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        // Get the previous post based on the publication date
        $prev = Post::where('active', true)
            ->where('published_at', '<=', now())
            ->where('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        // Get the current user
        $user = $request->user();

        // Record the post view if the user has viewed the post
        if ($user) {
            $viewed = PostView::where('post_id', $post->id)
                ->where('user_id', $user->id)
                ->where('created_at', '>', now()->subHour())
                ->exists();

            if (!$viewed) {
                PostView::create([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }
        }
        // Record the post view if the user is a guest
        else {
            $viewed = PostView::where('post_id', $post->id)
                ->where('user_id', null)
                ->where('ip_address', $request->ip())
                ->where('user_agent', $request->userAgent())
                ->where('created_at', '>', now()->subHour())
                ->exists();

            if (!$viewed) {
                PostView::create([
                    'post_id' => $post->id,
                    'user_id' => null,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }
        }

        // Return the view with post, next, and previous post data
        return view('post.view', compact('post', 'next', 'prev'));
    }

    public function byCategory(Category $category)
    {
        $posts = Post::join('category_post', 'posts.id', '=', 'category_post.post_id')
            ->where('category_post.category_id', $category->id)
            ->where('posts.active', true)
            ->whereDate('posts.published_at', '<=', now())
            ->orderBy('posts.published_at', 'desc')
            ->paginate(5);

        return view('post.index', compact('posts', 'category'));
    }
}
