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
        </div>
        <div class="p-8 bg-slate-50 rounded-2xl border border-slate-300 transition-hover hover:border-indigo-700">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Transaksi</p>
            <p class="text-3xl font-black text-slate-800 mt-2"> {{$transactionCount}} </p>
        </div>
        <div class="p-8 bg-indigo-600 rounded-2xl border border-indigo-500 text-white shadow-xl shadow-indigo-200">
            <p class="text-indigo-100 text-xs font-bold uppercase tracking-widest text-opacity-70">Progress Belajar</p>
            <p class="text-3xl font-black mt-2">Bab 2 : Data Binding</p>
        </div>
    </div>
</div>
