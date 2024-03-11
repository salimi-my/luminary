<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;

class LatestPosts extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::where('active', '=', true)
                    ->whereDate('published_at', '<=', now())
                    ->orderBy('published_at', 'desc')
                    ->take(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('title')
                    ->limit(30)
            ])
            ->recordUrl(
                fn (Model $record): string => PostResource::getUrl('edit', ['record' => $record])
            )
            ->paginated(false);
    }
}
