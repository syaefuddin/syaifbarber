<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Order;
use App\Models\User;
use App\Models\Harga;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard';
    protected static ?string $title = 'Dasbor';

    public int $ordersToday;
    public int $incomeThisMonth;
    public int $userCount;
    public int $serviceCount;
    public $recentOrders;

    public function mount(): void
    {
        $this->ordersToday = Order::whereDate('created_at', now())->count();
        $this->incomeThisMonth = Order::whereMonth('created_at', now()->month)->sum('total_harga');
        $this->userCount = User::count();
        $this->serviceCount = Harga::count();
        $this->recentOrders = Order::latest()->take(5)->get();
    }
}
