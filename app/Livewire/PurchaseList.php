<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Purchase;

class PurchaseList extends Component
{
    public $purchases;

    public function mount()
    {
        $this->purchases = Purchase::with('user', 'product')->get();
    }

    public function render()
    {
        return view('livewire.purchase-list')->layout('layouts.app');
    }
}
