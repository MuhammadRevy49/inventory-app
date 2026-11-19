<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="mx-auto space-y-6">
    <h1 class="text-2xl font-bold">Riwayat Transaksi</h1>

    <div class="bg-white border border-slate-200 rounded-2xl shadow-xs overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-600 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4">Produk</th>
                    <th class="px-6 py-4">Tipe</th>
                    <th class="px-6 py-4">Jumlah</th>
                    <th class="px-6 py-4">Tujuan/Asal</th>
                    <th class="px-6 py-4">Oleh</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($logs as $log): ?>
                <tr>
                    <td class="px-6 py-4 text-slate-500"><?= date('d M Y, H:i', strtotime($log['created_at'])) ?></td>
                    <td class="px-6 py-4 font-medium text-slate-900"><?= $log['product_name'] ?></td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase 
                            <?= $log['type'] == 'IN' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' ?>">
                            <?= $log['type'] ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 font-mono"><?= $log['qty'] ?></td>
                    <td class="px-6 py-4 text-slate-600"><?= $log['destination'] ?></td>
                    <td class="px-6 py-4 text-slate-500"><?= $log['user_name'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>