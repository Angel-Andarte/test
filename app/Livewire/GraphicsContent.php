<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GraphicsContent extends Component
{
    public $chartDataProductsSold;

    public $chartDataProductsLeastSold;

    public $dailyChartData;
    public $weeklyChartData;
    public $monthlyChartData;


    public function mount()
    {

        $this->productsSold();
        $this->productsLeastSold();
        $this->revenueChart();

    }

    public function productsSold(){

        $productsSold = Product::withCount('purchases')
            ->orderBy('purchases_count', 'desc')
            ->take(10)
            ->get();

        $this->chartDataProductsSold = [
            'labels' => $productsSold->pluck('name'),
            'datasets' => [
                [
                    'label' => 'Cantidad Vendida',
                    'data' => $productsSold->pluck('purchases_count'),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    public function productsLeastSold(){
        $productsLeastSold = Product::withCount('purchases')
            ->orderBy('purchases_count', 'asc')
            ->take(10)
            ->get();

        $this->chartDataProductsLeastSold = [
            'labels' => $productsLeastSold->pluck('name'),
            'datasets' => [
                [
                    'label' => 'Cantidad Vendida',
                    'data' => $productsLeastSold->pluck('purchases_count'),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    public function revenueChart(){

        $dailyRevenue = DB::table('purchases')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(amount) as total'))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date');

        $weeklyRevenue = DB::table('purchases')
            ->select(DB::raw('WEEK(created_at) as week'), DB::raw('SUM(amount) as total'))
            ->groupBy('week')
            ->orderBy('week')
            ->pluck('total', 'week');

        $monthlyRevenue = DB::table('purchases')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(amount) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $this->dailyChartData = [
            'labels' => $dailyRevenue->keys(),
            'datasets' => [
                [
                    'label' => 'Ingresos Diarios',
                    'data' => $dailyRevenue->values(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];

        $this->weeklyChartData = [
            'labels' => $weeklyRevenue->keys(),
            'datasets' => [
                [
                    'label' => 'Ingresos Semanales',
                    'data' => $weeklyRevenue->values(),
                    'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                    'borderColor' => 'rgba(255, 159, 64, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];

        $this->monthlyChartData = [
            'labels' => $monthlyRevenue->keys(),
            'datasets' => [
                [
                    'label' => 'Ingresos Mensuales',
                    'data' => $monthlyRevenue->values(),
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    public function render()
    {
        return view('livewire.graphics-content')->layout('layouts.app');
    }
}
