<?php

namespace App\Filament\Widgets;

use App\Models\LikeDislike;
use App\Models\Post;
use App\Models\PostView;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPosts = Post::count();
        $totalViews = PostView::count();
        $totalLikes = LikeDislike::where('is_like', '=', true)->count();
        $totalDislikes = LikeDislike::where('is_like', '=', false)->count();

        return [
            Stat::make('Posts', $totalPosts)
                ->icon('heroicon-o-document-text')
                ->description('Total posts created'),
            Stat::make('Views', $totalViews)
                ->icon('heroicon-o-eye')
                ->description('Total posts views'),
            Stat::make('Likes', $totalLikes)
                ->icon('heroicon-o-hand-thumb-up')
                ->description('Total likes received'),
            Stat::make('Dislikes', $totalDislikes)
                ->icon('heroicon-o-hand-thumb-down')
                ->description('Total dislikes received'),
        ];
    }
}
