<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Dashboard Overview</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Total Produk -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-start justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Produk</p>
                <p class="text-2xl font-bold text-slate-800 mt-2"><?= $totalProducts ?></p>
            </div>
            <div class="p-2 text-indigo-600 rounded-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
        </div>

        <!-- Perangkat Jaringan -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-start justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Perangkat Jaringan</p>
                <p class="text-2xl font-bold text-slate-800 mt-2"><?= $totalProductPJ ?></p>
            </div>
            <div class="p-2 text-indigo-600 rounded-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9"></path></svg>
            </div>
        </div>

        <!-- Kabel & Aksesoris -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-start justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Kabel & Aksesoris</p>
                <p class="text-2xl font-bold text-slate-800 mt-2"><?= $totalProductKA ?></p>
            </div>
            <div class="p-2 text-indigo-600 rounded-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
        </div>

        <!-- Perangkat Server -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-start justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Server & Komputer</p>
                <p class="text-2xl font-bold text-slate-800 mt-2"><?= $totalProductPK ?></p>
            </div>
            <div class="p-2 text-indigo-600 rounded-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>