<div>
    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-10">
        <div class="h-16 w-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-200">
            <span class="text-2xl font-bold font-mono">
                {{substr($name, 0, 1)}}
            </span>
        </div>
        <div class="mt-4">
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">
                Selamat Datang, <span class="text-indigo-600"> {{$name}} !</span>
            </h1>
            <p class="text-slate-400 mt-1 font-medium italic">Ubah profilmu secara real-time disini.</p>
        </div>
    </div>
    <div class="flex flex-col gap-2 mt-5 mx-4">
        <label class="text-xs font-bold text-slate-600 uppercase tracking-widest" for="name">Ganti nama:</label>
        <input 
            type="text" 
            wire:model.live="name"
            name="name" 
            id="name"
            class="px-4 py-2 rounded-xl border-2 border-slate-100 focus:border-indigo-500 focus:ring-0 outline-none transition-all text-slate-700 font-medium"
            placeholder="Masukkan nama..."
        >
    </div>

    {{-- Dipindah ke stats --}}
    <livewire:stats/>
    
    <div class="mt-12 p-10 bg-slate-900 rounded-3xl text-white shadow-2xl">
        <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
            ⚡ Top Up Kustom
        </h2>

        <form wire:submit="topUp" class="flex flex-col md:flex-row gap-6 items-end">
            <input 
            type="number"
            wire:model="amount"
            class="bg-slate-800 border-none rounded-xl px-6 py-4 text-xl font-bold text-indigo-300 focus:ring-2 focus:ring-indigo-500 outline-none transition-all placeholder:text-slate-700"
            placeholder="Mininal Top Up 10.000"
            >
            
            <button
            type="submit"
            class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-500 px-9 py-4 rounded-xl font-black uppercase tracking-widest shaddow-lg shadow-indigo-900/50 transition-all active:scale-95 disabled:opacity-50"
            >
                <span wire:loading.remove wire:target="topUp">Top Up</span>
                <span wire:loading wire:target="topUp" class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    Memproses...
                </span>
            </button>
            @error('amount')
                <span class="text-red-400 text-xs font-bold mt-1  tracking-tight">⚠️ {{$message}} </span>
            @enderror
        </form>
    </div>

    <div class="mt-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">📝 Riwayat Transaksi</h2>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </span>
                <input 
                type="text"
                wire:model.live="search"
                placeholder="Cari transaksi..."
                class="w-full md:w-64 pl-10 pr-4 py-2 bg-white border border-slate-300 rounded-xl text-sm"
                >
            </div>
        </div>
        
        <div wire:loading wire:target="topUp, minusAssets" class="text-indigo-600 text-xs font-bold flex items-center gap-2 animate-pulse">
            🔃 Memperbarui Data...
        </div>
        <div class="overflow-hidden rounded-2xl border border-slate-200">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Waktu</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Tipe</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Nominal</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($history as $item)
                        <tr class="hover:bg-slate-50/50">
                            <td class="px-6 py-4 text-slate-500 text-sm font-medium">{{$item->created_at->diffForHumans()}}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{$item->type == 'masuk' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'}}"> {{strtoupper($item -> type)}} </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-slate-700">
                                {{ $item->type == 'masuk' ? '+' : '-' }} Rp {{number_format($item->amount, 0, ',', '.')}}
                            </td>
                            <td class="px-6 py-4">
                                <button 
                                wire:click="delete({{$item->id}})"
                                wire:confirm="Yakin ingin menghapus transaksi ini?"
                                class="text-slate-400 hover:text-red-500"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-slate-400 italic">Tidak ada transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
