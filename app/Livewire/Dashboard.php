<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $name = 'Ndoro Umar';
    public function render()
    {
        return view('livewire.dashboard');
    }
}
