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
            Stat::make('Total Posts', $totalPosts)
                ->icon('heroicon-o-document-text')
                ->description('32k increase'),
            Stat::make('Posts Views', $totalViews)
                ->icon('heroicon-o-eye'),
            Stat::make('Total Likes', $totalLikes)
                ->icon('heroicon-o-hand-thumb-up'),
            Stat::make('Total Dislikes', $totalDislikes)
                ->icon('heroicon-o-hand-thumb-down'),
        ];
    }
}
