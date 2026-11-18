<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Tambah Kategori Baru</h1>
            <p class="text-sm text-slate-500">Masukkan detail informasi pemasok inventori.</p>
        </div>
        <a href="<?= base_url('categories') ?>" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
            ← Kembali
        </a>
    </div>

    <!-- Alert Error Validation -->
    <?php if (session()->has('errors')): ?>
        <div class="p-4 bg-rose-50 border border-rose-100 rounded-2xl text-sm text-rose-600">
            <p class="font-semibold mb-1">Terjadi kesalahan validasi:</p>
            <ul class="list-disc list-inside space-y-0.5 text-xs">
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form Card -->
    <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xs">
        <form action="<?= base_url('categories') ?>" method="post" class="space-y-5">
            <?= csrf_field() ?>

            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="<?= old('nama_kategori') ?>" required placeholder="Masukkan nama kategori..." class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-100">
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm rounded-xl shadow-sm shadow-indigo-100 transition-all">
                    Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>