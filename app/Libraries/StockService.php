<?php

namespace App\Libraries;

use CodeIgniter\Database\Config;

class StockService
{
    /**
     * @param int $productId ID produk
     * @param int $qtyChange Jumlah (positif untuk IN, negatif untuk OUT)
     * @param string $type 'IN' atau 'OUT'
     * @param string $destination Keterangan tujuan/asal
     * @param string $status 'Active/Installed', 'Returned', atau 'Damaged'
     */

    public function updateStock($productId, $qtyChange, $type, $destination, $status = 'Active/Installed')
    {
        $db = \Config\Database::connect();
        
        $db->transStart();

        // PENTING: Jika $type adalah 'OUT', pastikan $qtyChange bernilai negatif
        // Namun di controller, kita harus mengirimkan nilai yang benar.
        // Mari kita perbaiki logikanya di sini agar lebih aman:
        $actualChange = ($type === 'OUT') ? -abs($qtyChange) : abs($qtyChange);

        // 1. Update stok di tabel products
        // Pastikan nama kolom 'stock' di tabel 'products' Anda benar
        $db->table('products')
           ->where('id', $productId)
           ->set('stock', 'stock + ' . $actualChange, false) 
           ->update();

        // 2. Insert ke tabel stock_movements
        $db->table('stock_movements')->insert([
            'product_id'  => $productId,
            'user_id'     => session()->get('id'),
            'type'        => $type,
            'qty'         => abs($qtyChange), // Log selalu simpan angka positif
            'destination' => $destination,
            'status'      => $status
        ]);

        $db->transComplete();

        return $db->transStatus();
    }
}