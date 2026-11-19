<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Barang Masuk</h1>
            <p class="text-sm text-slate-500">Catat penambahan stok barang ke dalam sistem.</p>
        </div>
        <a href="<?= base_url('products') ?>" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
            ← Kembali
        </a>
    </div>

    <!-- Alert Error -->
    <?php if (session()->has('error')): ?>
        <div class="p-4 bg-rose-50 border border-rose-100 rounded-2xl text-sm text-rose-600">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <!-- Form Card -->
    <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs">
        <form action="<?= base_url('movements/process-in') ?>" method="post" class="space-y-5">
            <?= csrf_field() ?>

            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Pilih Produk</label>
                <select name="product_id" required class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
                    <?php foreach($products as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= $p['name'] ?> (Stok saat ini: <?= $p['stock'] ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Jumlah Barang</label>
                <input type="number" name="qty" min="1" required placeholder="Masukkan jumlah barang..." class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Asal Barang / Keterangan</label>
                <input type="text" name="destination" required placeholder="Contoh: Pembelian Supplier / Retur" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-100">
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm rounded-xl shadow-sm shadow-indigo-100 transition-all">
                    Simpan Barang Masuk
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>