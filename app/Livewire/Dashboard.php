<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $name = 'Ndoro Umar';
    public $asset = 1500000; // 1.500.000
    public $transactionCount = 0;
    public function render()
    {
        return view('livewire.dashboard');
    }
}
