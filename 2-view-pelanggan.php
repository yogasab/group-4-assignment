<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>
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
    <h1>Data Pelanggan</h1>

    <!-- Filter dan Pencarian -->
    <div>
        <form action="view_pelanggan.php" method="POST">
            <label for="filter">Filter berdasarkan Jenis Kelamin:</label>
            <select name="filter">
                <option value="Semua">Semua</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                <!-- Tambahkan jenis kelamin lain jika diperlukan -->
            </select>
            <input type="submit" value="Filter">
        </form>
        <form action="view_pelanggan.php" method="POST">
            <label for="search">Cari Pelanggan:</label>
            <input type="text" name="search" placeholder="Nama Pelanggan">
            <input type="submit" value="Cari">
        </form>
    </div>

    <table>
        <tr>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Email</th>
        </tr>
        <?php
        // Mendapatkan filter dan kata kunci pencarian dari form
        $filter = isset($_POST['filter']) ? $_POST['filter'] : 'Semua';
        $search = isset($_POST['search']) ? $_POST['search'] : '';

        // Mengambil data pelanggan dari database sesuai dengan filter dan pencarian
        $query = "SELECT * FROM TabelPelanggan";
        if ($filter !== 'Semua') {
            $query .= " WHERE JenisKelamin='$filter'";
        }
        if ($search !== '') {
            $query .= ($filter !== 'Semua') ? " AND " : " WHERE ";
            $query .= "NamaPelanggan LIKE '%$search%'";
        }

        // Eksekusi query dan tampilkan data
        // ...

        // Contoh data pelanggan
        $dataPelanggan = [
            // Data pelanggan dalam bentuk array asosiatif
        ];

        foreach ($dataPelanggan as $pelanggan) {
            echo "<tr>";
            echo "<td>" . $pelanggan['IDPelanggan'] . "</td>";
            echo "<td>" . $pelanggan['NamaPelanggan'] . "</td>";
            echo "<td>" . $pelanggan['JenisKelamin'] . "</td>";
            echo "<td>" . $pelanggan['Alamat'] . "</td>";
            echo "<td>" . $pelanggan['Email'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
