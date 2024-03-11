<?php

namespace App\Filament\Widgets;

use App\Models\PostView;
use Filament\Widgets\ChartWidget;

class PostsViewsChart extends ChartWidget
{
    protected static ?string $heading = 'Posts Views';

    protected int | string | array $columnSpan = 2;

    protected static ?string $maxHeight = '365px';

    protected static ?array $options = [
        'scales' => [
            'y' => [
                'beginAtZero' => true
            ]
        ]
    ];

    public ?string $filter;

    public function __construct()
    {
        $this->filter = '2024';
    }

    protected function getFilters(): ?array
    {
        return [
            date('Y') => date('Y'),
            date('Y') - 1 => date('Y') - 1,
            date('Y') - 2 => date('Y') - 2,
            date('Y') - 3 => date('Y') - 3,
            date('Y') - 4 => date('Y') - 4,
            date('Y') - 5 => date('Y') - 5,
            date('Y') - 6 => date('Y') - 6,
            date('Y') - 7 => date('Y') - 7,
            date('Y') - 8 => date('Y') - 8,
            date('Y') - 9 => date('Y') - 9,
            date('Y') - 10 => date('Y') - 10,
        ];
    }

    protected function getData(): array
    {
        // Selected year
        $year = $this->filter;

        // Get the total number of views each month
        $monthlyViews = PostView::selectRaw('MONTH(created_at) as month, COUNT(*) as total_views')
            ->whereYear('created_at', $year)
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->pluck('total_views', 'month')
            ->all();

        $monthlyViews = array_replace(array_fill(1, 12, 0), $monthlyViews);

        // dd($monthlyViews);

        return [
            'datasets' => [
                [
                    'label' => 'Posts Views',
                    'data' => array_values($monthlyViews),
                    'tension' => 0.4,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
