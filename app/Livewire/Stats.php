<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class Stats extends Component
{
    #[On('transaction-updated')]
    public function refreshStats(){}
    public function minusAssets()
    {
        sleep(2);
        if ($this->getAssets() >= 50000) {
            Transaction::create([
                'type' => 'keluar',
                'amount' => 50000,
                'description' => 'Penarikan Cepat'
            ]);
        }

        $this->dispatch('transaction-updated');
    }

    private function getAssets()
    {
        $masuk = Transaction::where('type', 'masuk')->sum('amount');
        $keluar = Transaction::where('type', 'keluar')->sum('amount');
        return $masuk - $keluar;
    }
    public function render()
    {
        return view('livewire.stats', [
            'asset' => $this->getAssets()
        ]);
    }
}
