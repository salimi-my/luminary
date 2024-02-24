<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\LikeDislike;
use App\Models\PostView;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;

class PostOverview extends BaseWidget
{
    public ?Model $record = null;

    protected function getStats(): array
    {
        return [
            Stat::make('Views', PostView::where('post_id', '=', $this->record->id)->count())
                ->icon('heroicon-o-eye'),
            Stat::make('Likes', LikeDislike::where('post_id', '=', $this->record->id)->where('is_like', '=', true)->count())
                ->icon('heroicon-o-hand-thumb-up'),
            Stat::make('Dislikes', LikeDislike::where('post_id', '=', $this->record->id)->where('is_like', '=', false)->count())
                ->icon('heroicon-o-hand-thumb-down'),
        ];
    }
}
