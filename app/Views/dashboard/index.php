<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Dashboard Overview</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Produk</p>
            <p class="text-2xl font-bold text-slate-800 mt-2"><?= $totalProducts ?></p>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Produk Elektronik</p>
            <p class="text-2xl font-bold text-slate-800 mt-2"><?= $totalProductE ?></p>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Produk Pakaian</p>
            <p class="text-2xl font-bold text-slate-800 mt-2"><?= $totalProductPf ?></p>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Produk Rumah Tangga</p>
            <p class="text-2xl font-bold text-slate-800 mt-2"><?= $totalProductPrt ?></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>