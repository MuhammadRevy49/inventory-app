<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Data Barang</h1>
            <p class="text-sm text-slate-500">Daftar inventori barang, stok, dan harga barang Anda.</p>
        </div>
        <?php if (canAccessSG()): ?>
            <a href="/products/create" class="inline-flex items-center justify-center px-4 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold rounded-xl shadow-sm shadow-indigo-100 transition-all">+ Tambah Barang Baru</a>
        <?php endif; ?>
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
            <form action="<?= base_url('products') ?>" method="get" class="w-full sm:w-72 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="<?= request()->getGet('search') ?>"
                    placeholder="Cari nama barang atau SKU..." 
                    class="w-full pl-10 pr-3.5 py-2 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all"
                >
                <div class="absolute left-3.5 top-2.5 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <?php if(request()->getGet('search')): ?>
                    <a href="<?= base_url('products') ?>" class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </a>
                <?php endif; ?>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse overflow-auto whitespace-nowrap">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-semibold text-slate-400 uppercase tracking-wider">
                        <th class="py-3 px-6">SKU / Nama Barang</th>
                        <th class="py-3 px-6">Kategori</th>
                        <th class="py-3 px-6">Supplier</th>
                        <th class="py-3 px-6">Stok</th>
                        <th class="py-3 px-6">Harga Jual</th>
                        <?php if (canAccessSG()): ?>
                        <th class="py-3 px-6 text-right">Aksi</th>
                        <?php endif; ?>
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
                                <?php if (canAccessSG()): ?>
                                <a href="<?= base_url('products/edit/' . $p['id']) ?>" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                                <form action="<?= base_url('products/delete/' . $p['id']) ?>" method="post" class="inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="text-rose-600 hover:text-rose-900 font-medium ml-2" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <p class="text-sm font-medium text-slate-600">Belum ada data barang yang tersimpan.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>