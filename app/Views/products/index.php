<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Manajemen Produk</h1>
            <p class="text-sm text-slate-500">Kelola daftar inventori barang, stok, dan harga produk Anda.</p>
        </div>
        <a href="<?= base_url('products/create') ?>" class="inline-flex items-center justify-center px-4 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold rounded-xl shadow-sm shadow-indigo-100 transition-all">
            + Tambah Produk Baru
        </a>
    </div>

    <!-- Flash Success Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-2xl text-sm font-medium text-emerald-600">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Table Container -->
    <div class="bg-white border border-slate-200/80 rounded-2xl shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <!-- Search Bar -->
            <div class="w-full sm:w-72">
                <input type="text" placeholder="Cari nama produk atau SKU..." class="w-full px-3.5 py-2 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse overflow-auto whitespace-nowrap">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-semibold text-slate-400 uppercase tracking-wider">
                        <th class="py-3 px-6">SKU / Nama Produk</th>
                        <th class="py-3 px-6">Kategori</th>
                        <th class="py-3 px-6">Supplier</th>
                        <th class="py-3 px-6">Stok</th>
                        <th class="py-3 px-6">Harga Jual</th>
                        <th class="py-3 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    <?php if (!empty($products) && is_array($products)): ?>
                        <?php foreach ($products as $p): ?>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 px-6 font-medium text-slate-800">
                                <?= esc($p['name']) ?>
                                <span class="block text-xs text-slate-400 font-normal"><?= esc($p['sku']) ?></span>
                            </td>
                            <td class="py-4 px-6 text-slate-600"><?= esc($p['category_name'] ?? '-') ?></td>
                            <td class="py-4 px-6 text-slate-600"><?= esc($p['supplier_name'] ?? '-') ?></td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold <?= $p['stock'] > 5 ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' ?>">
                                    <?= esc($p['stock']) ?> Pcs
                                </span>
                            </td>
                            <td class="py-4 px-6 font-medium text-slate-800">Rp <?= number_format($p['selling_price'], 0, ',', '.') ?></td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="<?= base_url('products/edit/' . $p['id']) ?>" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                <form action="<?= base_url('products/delete/' . $p['id']) ?>" method="post" class="inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="text-rose-600 hover:text-rose-900 font-medium ml-2" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <p class="text-sm font-medium text-slate-600">Belum ada data produk yang tersimpan.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>