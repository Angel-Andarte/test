<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Purchase;

class TopCustomers extends Component
{
    public $topCustomers;

    public function mount()
    {
        $this->topCustomers = User::withCount('purchases')
            ->having('purchases_count', '>', 0)
            ->orderBy('purchases_count', 'desc')
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.top-customers')->layout('layouts.app');
    }
}
