<?php
class DatabaseConnection
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;
    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }
    public function connect()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Koneksi gagal: " . $this->connection->connect_error);
        }
    }
    public function getConnection()
    {
        return $this->connection;
    }
    public function closeConnection()
    {
        $this->connection->close();
    }
}

class Pembelian
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAllPurchases()
    {
        $query = "SELECT * FROM TabelPembelian";
        $result = $this->connection->getConnection()->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "idPembelian: " . $row["idPembelian"] . " - NamaPembelian: " . $row["NamaPembelian"] . "<br>";
            }
        } else {
            echo "Tidak ada data dalam TabelPembelian.";
        }
    }
}

class Penjualan
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAllSales()
    {
        $query = "SELECT * FROM TabelPenjualan";
        $result = $this->connection->getConnection()->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "idPenjualan: " . $row["idPenjualan"] . " - NamaPenjualan: " . $row["NamaPenjualan"] . "<br>";
            }
        } else {
            echo "Tidak ada data dalam TabelPenjualan.";
        }
    }
}

class Supplier
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAllSuppliers()
    {
        $query = "SELECT * FROM TabelSupplier";
        $result = $this->connection->getConnection()->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "idSupplier: " . $row["idSupplier"] . " - NamaSupplier: " . $row["NamaSupplier"] . "<br>";
            }
        } else {
            echo "Tidak ada data dalam TabelSupplier.";
        }
    }
}

class Pelanggan
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAllCustomers()
    {
        $query = "SELECT * FROM TabelPelanggan";
        $result = $this->connection->getConnection()->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "idPelanggan: " . $row["idPelanggan"] . " - NamaPelanggan: " . $row["NamaPelanggan"] . "<br>";
            }
        } else {
            echo "Tidak ada data dalam TabelPelanggan.";
        }
    }
}

$host = "localhost";
$username = "root";
$password = "";
$database = "baruDB";

$connection = new DatabaseConnection($host, $username, $password, $database);
$pembelian = new Pembelian($connection);
$pembelian->getAllPurchases();
$penjualan = new Penjualan($connection);
$penjualan->getAllSales();
$supplier = new Supplier($connection);
$supplier->getAllSuppliers();
$pelanggan = new Pelanggan($connection);
$pelanggan->getAllCustomers();
