<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Dashboard extends Component
{
    public $name = 'Ndoro Umar';
    public $asset = 1500000; // 1.500.000
    public $transactionCount = 0;

    #[Validate('required|numeric|min:10000', message: 'Minimal top up adalah 10.000')]
    public $nominal;

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
    public function topUp()
    {
        // Menjalankan validasi berdasarkan #[Validate]
        $this->validate();

        $this->asset += $this->nominal;
        $this->transactionCount++;

        $this->reset('nominal');
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
