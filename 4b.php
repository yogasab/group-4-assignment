<?php
$host = "localhost";
$port = "5433";
$database = "postgres";
$user = "postgres";
$password = "";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$database";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Gagal melakukan koneksi: " . $e->getMessage();
}
// 2. Eksekusi Query SQL
$query = "SELECT
    p.idbarang,
    br.namabarang AS nama_barang,
    SUM(p.jumlahpenjualan) AS total_penjualan,
    AVG(p.hargajual) AS rata_rata_harga_penjualan,
    SUM(b.jumlahpembelian) AS total_pembelian,
    AVG(b.hargabeli) AS rata_rata_harga_pembelian,
    (SUM(p.jumlahpenjualan) * AVG(p.hargajual)) - (SUM(b.jumlahpembelian) * AVG(b.hargabeli)) AS rugi_laba
FROM
    penjualan AS p
JOIN
    pembelian AS b
ON
    p.idbarang = b.idbarang
RIGHT JOIN 
    barang br
ON 
	p.idbarang = br.idbarang 
GROUP BY
    p.idbarang, br.namabarang";

$result = $pdo->query($query);
$results = $result->fetchAll(PDO::FETCH_ASSOC);
$data = array();
foreach ($results as $row) {
    // convert Rp 35.000,00 to Rp 35000
    $row['rata_rata_harga_penjualan'] = "Rp " . number_format($row['rata_rata_harga_penjualan'], 0, ',', '.');
    $row['rata_rata_harga_pembelian'] = "Rp " . number_format($row['rata_rata_harga_pembelian'], 0, ',', '.');
    $row['rugi_laba'] = "Rp " . number_format($row['rugi_laba'], 0, ',', '.');
    $data[] = $row;
}

$jsonData = json_encode(array("data" => $data));
echo json_encode(array("data" => $data));
