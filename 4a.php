<?php
// Data produk dari hasil query SQL
$results = [
    ['product_id' => 1, 'product_name' => 'Barang A', 'total_penjualan' => 2, 'total_penjualan_value' => 70000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 250000.00, 'stok' => 8],
    ['product_id' => 2, 'product_name' => 'Barang B', 'total_penjualan' => 2, 'total_penjualan_value' => 90000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 120500.00, 'stok' => 8],
    ['product_id' => 3, 'product_name' => 'Barang C', 'total_penjualan' => 2, 'total_penjualan_value' => 150000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 500000.00, 'stok' => 8],
    ['product_id' => 4, 'product_name' => 'Barang D', 'total_penjualan' => 2, 'total_penjualan_value' => 150000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 180250.00, 'stok' => 8],
    ['product_id' => 5, 'product_name' => 'Barang E', 'total_penjualan' => 2, 'total_penjualan_value' => 78000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 150000.00, 'stok' => 8],
    ['product_id' => 6, 'product_name' => 'Barang F', 'total_penjualan' => 2, 'total_penjualan_value' => 64000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 300000.00, 'stok' => 8],
    ['product_id' => 7, 'product_name' => 'Barang G', 'total_penjualan' => 2, 'total_penjualan_value' => 110000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 200500.00, 'stok' => 8],
    ['product_id' => 8, 'product_name' => 'Barang H', 'total_penjualan' => 2, 'total_penjualan_value' => 84000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 375750.00, 'stok' => 8],
    ['product_id' => 9, 'product_name' => 'Barang I', 'total_penjualan' => 2, 'total_penjualan_value' => 140000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 225250.00, 'stok' => 8],
    ['product_id' => 10, 'product_name' => 'Barang J', 'total_penjualan' => 2, 'total_penjualan_value' => 182000.00, 'total_pembelian' => 10, 'total_pembelian_value' => 275500.00, 'stok' => 8]
];

// Batasan
$maxBudget = 1000000;

// Inisialisasi variabel untuk hasil terbaik
$bestCombination = [];
$maxProfit = 0;

// Algoritma untuk mencari kombinasi terbaik (metode kasar)
function findBestCombination($results, $maxBudget)
{
    $maxProfit = 0;
    $jumlahProduk = count($results);
    $combinations = 2 ** $jumlahProduk;
    $bestCombination = [];

    for ($i = 1; $i < $combinations; $i++) {
        $currentCombination = [];
        $currentBudget = 0;
        $currentProfit = 0;

        for ($j = 0; $j < $jumlahProduk; $j++) {
            if ($i & (1 << $j)) {
                $product = $results[$j];
                $quantity = min($product['stok'], floor(($maxBudget - $currentBudget) / $product['total_penjualan_value']));
                $currentCombination[] = [
                    'nama' => $product['product_name'],
                    'jumlah' => $quantity,
                    'nilai' => $product['total_penjualan_value'],
                ];
                $currentBudget += $quantity * $product['total_penjualan_value'];
                $currentProfit += $quantity * $product['total_penjualan_value'];
            }
        }

        if ($currentProfit > $maxProfit) {
            $maxProfit = $currentProfit;
            $bestCombination[] = $currentCombination;
        }
    }
    return $bestCombination;
}

// Temukan kombinasi terbaik
$bestCombination = findBestCombination($results, $maxBudget);

// Hasil terbaik
echo "Kombinasi Produk Terbaik:<br>";
foreach ($bestCombination as $item) {
    echo "{$item['jumlah']} {$item['nama']} - Harga: {$item['nilai']}<br>";
}
echo "Keuntungan Maksimum: $maxProfit";
