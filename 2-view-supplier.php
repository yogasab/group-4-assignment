<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Supplier</h1>

    <!-- Filter dan Pencarian -->
    <div>
        <form action="view_supplier.php" method="POST">
            <label for="filter">Filter berdasarkan Kategori:</label>
            <select name="filter">
                <option value="Semua">Semua</option>
                <option value="Pemasok Elektronik">Pemasok Elektronik</option>
                <option value="Pemasok Pakaian">Pemasok Pakaian</option>
                <option value="Pemasok Makanan">Pemasok Makanan</option>
                <!-- Tambahkan kategori lain jika diperlukan -->
            </select>
            <input type="submit" value="Filter">
        </form>
        <form action="view_supplier.php" method="POST">
            <label for="search">Cari Supplier:</label>
            <input type="text" name="search" placeholder="Nama Supplier">
            <input type="submit" value="Cari">
        </form>
    </div>

    <table>
        <tr>
            <th>ID Supplier</th>
            <th>Nama Supplier</th>
            <th>Kategori</th>
            <th>Alamat</th>
            <th>Kontak</th>
        </tr>
        <?php
        // Mendapatkan filter dan kata kunci pencarian dari form
        $filter = isset($_POST['filter']) ? $_POST['filter'] : 'Semua';
        $search = isset($_POST['search']) ? $_POST['search'] : '';

        // Mengambil data supplier dari database sesuai dengan filter dan pencarian
        $query = "SELECT * FROM TabelSupplier";
        if ($filter !== 'Semua') {
            $query .= " WHERE KategoriSupplier='$filter'";
        }
        if ($search !== '') {
            $query .= ($filter !== 'Semua') ? " AND " : " WHERE ";
            $query .= "NamaSupplier LIKE '%$search%'";
        }

        // Eksekusi query dan tampilkan data
        // ...

        // Contoh data supplier
        $dataSupplier = [
            // Data supplier dalam bentuk array asosiatif
        ];

        foreach ($dataSupplier as $supplier) {
            echo "<tr>";
            echo "<td>" . $supplier['IDSupplier'] . "</td>";
            echo "<td>" . $supplier['NamaSupplier'] . "</td>";
            echo "<td>" . $supplier['KategoriSupplier'] . "</td>";
            echo "<td>" . $supplier['Alamat'] . "</td>";
            echo "<td>" . $supplier['Kontak'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
