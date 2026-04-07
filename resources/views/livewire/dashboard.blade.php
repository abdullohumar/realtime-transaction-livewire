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

    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="p-8 bg-slate-50 rounded-2xl border border-slate-300 transition-hover hover:border-indigo-700">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Total Aset</p>
            <p class="text-3xl font-black text-slate-800 mt-2">Rp {{number_format($asset, 0, ',', '.')}} </p>
            
            <div class="mt-6 flex gap-3">
                <button 
                class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-bold shadow-md shodow-indigo-100 transition-all active:scale-95"
                wire:click="plusAssets"
                >
                    + Tambah Aset
                </button>
                <button 
                class="flex-1 bg-white border-2 border-slate-500 hover:border-red-500 py-2 rounded-lg font-bold shadow-md shodow-indigo-100 transition-all active:scale-95"
                wire:click="minusAssets"
                >
                    - Kurang Aset
                </button>
            </div>
        </div>
        <div class="p-8 bg-slate-50 rounded-2xl border border-slate-300 transition-hover hover:border-indigo-700">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Transaksi</p>
            <p class="text-3xl font-black text-slate-800 mt-2"> {{$transactionCount}} </p>
        </div>
        <div class="p-8 bg-indigo-600 rounded-2xl border border-indigo-500 text-white shadow-xl shadow-indigo-200">
            <p class="text-indigo-100 text-xs font-bold uppercase tracking-widest text-opacity-70">Progress Belajar</p>
            <p class="text-3xl font-black mt-2">Bab 4 : Form & Validasi</p>
        </div>
    </div>

    <div class="mt-12 p-10 bg-slate-900 rounded-3xl text-white shadow-2xl">
        <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
            ⚡ Top Up Kustom
        </h2>

        <form wire:submit="topUp" class="flex flex-col md:flex-row gap-6 items-end">
            <input 
            type="number"
            wire:model="nominal"
            class="bg-slate-800 border-none rounded-xl px-6 py-4 text-xl font-bold text-indigo-300 focus:ring-2 focus:ring-indigo-500 outline-none transition-all placeholder:text-slate-700"
            placeholder="Mininal Top Up 10.000"
            >
            
            <button
            wire:loading.attr="disabled"
            type="submit"
            class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-500 px-10 py-4 rounded-xl font-black uppercase tracking-widest shaddow-lg shadow-indigo-900/50 transition-all active:scale-95 disabled:opacity-50"
            >Top Up</button>
            @error('nominal')
                <span class="text-red-400 text-xs font-bold mt-1  tracking-tight">⚠️ {{$message}} </span>
            @enderror
        </form>
    </div>
</div>
