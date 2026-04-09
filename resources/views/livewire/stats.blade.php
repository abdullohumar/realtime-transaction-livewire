<div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="p-8 bg-slate-50 rounded-2xl border border-slate-300 transition-hover hover:border-indigo-700">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Total Aset</p>
            <p class="text-3xl font-black text-slate-800 mt-2">Rp {{number_format($asset, 0, ',', '.')}} </p>
            
            <button wire:click="minusAssets" class="mt-4 w-full bg-white border-2 border-red-200 text-red-500 py-2 rounded-lg font-bold hover:bg-red-50 transition-all">- Tarik 50rb</button>
        </div>
        <div class="p-8 bg-indigo-600 rounded-2xl border border-indigo-500 text-white shadow-xl shadow-indigo-200">
            <p class="text-indigo-100 text-xs font-bold uppercase tracking-widest text-opacity-70">Progress Belajar</p>
            <p class="text-3xl font-black mt-2">Bab 9 : Component & Event</p>
        </div>
    </div>