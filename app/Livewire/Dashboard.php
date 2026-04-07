<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Dashboard extends Component
{
    public $name = 'Ndoro Umar';

    #[Validate('required|numeric|min:10000', message: 'Minimal top up adalah 10.000')]
    public $amount;

    
    public function topUp()
    {
        // Menjalankan validasi berdasarkan #[Validate]
        $this->validate();

        // SIMPAN KE DATABASE
        Transaction::create([
            'type' => 'masuk',
            'amount' => $this->amount,
            'description' => 'Top Up Kustom'
        ]);

        $this->reset('amount');
    }

    public function minusAssets()
    {
        if($this->getAssets() >= 50000){
            Transaction::create([
                'type' => 'keluar',
                'amount' => 50000,
                'description' => 'Penarikan Cepat'
            ]);
        }
    }

    private function getAssets()
    {
        $masuk = Transaction::where('type', 'masuk')->sum('amount');
        $keluar = Transaction::where('type', 'keluar')->sum('amount');
        return $masuk - $keluar;
    }
    public function render()
    {
        return view('livewire.dashboard', [
            'asset' => $this->getAssets(),
            'transactions' => Transaction::count(),
            'history' => Transaction::latest()->take(5)->get(),
        ]);
    }
}
