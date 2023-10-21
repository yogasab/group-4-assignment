<?php

class PembelianController
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllPurchases()
    {
        // Memanggil model atau melakukan operasi database untuk mendapatkan data pembelian
        $pembelianModel = new PembelianModel($this->connection);
        $purchases = $pembelianModel->getAllPurchases();

        // Mengirim data ke tampilan atau mengembalikan data sebagai hasil
        return $purchases;
    }
}

class PembelianController
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllPurchases()
    {
        // Memanggil model atau melakukan operasi database untuk mendapatkan data pembelian
        $pembelianModel = new PembelianModel($this->connection);
        $purchases = $pembelianModel->getAllPurchases();

        // Mengirim data ke tampilan atau mengembalikan data sebagai hasil
        return $purchases;
    }
}

class PenjualanController
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllSales()
    {
        // Memanggil model atau melakukan operasi database untuk mendapatkan data penjualan
        $penjualanModel = new PenjualanModel($this->connection);
        $sales = $penjualanModel->getAllSales();

        // Mengirim data ke tampilan atau mengembalikan data sebagai hasil
        return $sales;
    }
}

class SupplierController
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllSuppliers()
    {
        // Memanggil model atau melakukan operasi database untuk mendapatkan data supplier
        $supplierModel = new SupplierModel($this->connection);
        $suppliers = $supplierModel->getAllSuppliers();

        // Mengirim data ke tampilan atau mengembalikan data sebagai hasil
        return $suppliers;
    }
}

class PelangganController
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllCustomers()
    {
        // Memanggil model atau melakukan operasi database untuk mendapatkan data pelanggan
        $pelangganModel = new PelangganModel($this->connection);
        $customers = $pelangganModel->getAllCustomers();

        // Mengirim data ke tampilan atau mengembalikan data sebagai hasil
        return $customers;
    }
}

$host = "localhost";
$username = "root";
$password = "";
$database = "baruDB";

$connection = new DatabaseConnection($host, $username, $password, $database);

// Menganalisis permintaan (misalnya, menggunakan URL atau parameter GET/POST)
$request = isset($_GET['request']) ? $_GET['request'] : null;

// Menentukan controller yang akan dipanggil berdasarkan permintaan
switch ($request) {
    case 'pembelian':
        $pembelianController = new PembelianController($connection);
        $data = $pembelianController->getAllPurchases();
        // Lakukan sesuatu dengan data, seperti menampilkan di tampilan
        break;
    case 'penjualan':
        $penjualanController = new PenjualanController($connection);
        $data = $penjualanController->getAllSales();
        // Lakukan sesuatu dengan data, seperti menampilkan di tampilan
        break;
    case 'supplier':
        $supplierController = new SupplierController($connection);
        $data = $supplierController->getAllSuppliers();
        // Lakukan sesuatu dengan data, seperti menampilkan di tampilan
        break;
    case 'pelanggan':
        $pelangganController = new PelangganController($connection);
        $data = $pelangganController->getAllCustomers();
        // Lakukan sesuatu dengan data, seperti menampilkan di tampilan
        break;
    default:
        // Tindakan default jika permintaan tidak ditemukan
        echo "Permintaan tidak valid.";
        break;
}

// Contoh tampilan data
if (!empty($data)) {
    foreach ($data as $item) {
        echo $item . "<br>";
    }
}
