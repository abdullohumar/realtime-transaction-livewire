<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $name = 'Ndoro Umar';
    public $asset = 1500000; // 1.500.000
    public $transactionCount = 0;

    public function plusAssets()
    {
        $this->asset += 500000; // Tambah 500.000
        $this->transactionCount++; // Tambah 1 transaksi
    }
    public function minusAssets()
    {
        if ($this->asset >= 500000) {
            $this->asset -= 500000; // Kurang 500.000
            $this->transactionCount++; // Tambah 1 transaksi
        }
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
