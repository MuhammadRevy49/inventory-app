<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventory Management</title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased flex items-center justify-center min-h-screen">
    
    <div class="w-full max-w-md p-6 sm:p-8 bg-white border border-slate-200/80 rounded-2xl shadow-sm">
        <!-- Header Logo / Title -->
        <div class="text-center mb-8">
            <div class="w-12 h-12 rounded-2xl bg-indigo-600 text-white font-bold flex items-center justify-center mx-auto mb-4 shadow-md shadow-indigo-100 text-lg">
                IA
            </div>
            <h1 class="text-xl font-bold tracking-tight text-slate-900">Selamat Datang Kembali</h1>
            <p class="text-sm text-slate-500 mt-1">Silakan masuk ke akun Anda.</p>
        </div>

        <!-- Notifikasi Error Flashdata -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="mb-5 p-3.5 bg-rose-50 border border-rose-100 rounded-xl text-xs font-medium text-rose-600 text-center">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form action="<?= base_url('auth/login') ?>" method="post" class="space-y-4">
            <?= csrf_field() ?>
            
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Email Administrator</label>
                <input type="email" name="email" value="<?= old('email') ?>" required placeholder="nama@domain.com" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full px-3.5 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-all">
            </div>

            <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm rounded-xl shadow-sm shadow-indigo-100 transition-all mt-2">
                Masuk ke Sistem
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-xs text-slate-400">Ada kendala ? <a href="">klik bantuan disini.</a></p>
        </div>
    </div>

</body>
</html>