<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Edit Data Pengguna</h1>
            <p class="text-sm text-slate-500">Perbarui informasi detail Pengguna inventori.</p>
        </div>
        <a href="<?= base_url('users') ?>" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-all">
            ← Kembali
        </a>
    </div>

    <!-- Validation -->
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
        <form action="<?= base_url('users/update/' . $users['id']) ?>" method="post" class="space-y-5">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Nama Pengguna</label>
                    <input type="text" name="name" value="<?= old('sku', $users['name']) ?>" required class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Email</label>
                    <input type="text" name="email" value="<?= old('name', $users['email']) ?>" required class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password baru jika ingin diubah..." value="" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
                </div>
                <div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Role</label>
                        <select name="role" required class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
                            <?php
                            $roles = ['Super Admin', 'Gudang', 'Teknisi'];
                            $currentRole = old('role', $users['role']);
                            ?>
                            
                            <!-- Opsi yang terpilih (muncul pertama) -->
                            <option value="<?= esc($currentRole) ?>" selected><?= esc($currentRole) ?></option>
                            
                            <!-- Opsi lainnya -->
                            <?php foreach ($roles as $role): ?>
                                <?php if ($role !== $currentRole): ?>
                                    <option value="<?= esc($role) ?>"><?= esc($role) ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-100">
                <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm rounded-xl shadow-sm shadow-indigo-100 transition-all">
                    Perbarui Pengguna
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>