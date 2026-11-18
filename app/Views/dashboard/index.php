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
        </div>

        <?php foreach ($categories as $cat): ?>
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-start justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider"><?= esc($cat['name']) ?></p>
                <p class="text-2xl font-bold text-slate-800 mt-2"><?= $cat['total_products'] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>