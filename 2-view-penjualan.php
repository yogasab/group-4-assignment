<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Penjualan</title>
</head>
<body>
    <h1>Manajemen Penjualan</h1>

    <h2>Tambah Penjualan</h2>
    <form action="create_penjualan.php" method="POST">
        Nama Penjualan: <input type="text" name="nama_penjualan"><br>
        Jumlah: <input type="number" name="jumlah"><br>
        Tanggal: <input type="date" name="tanggal"><br>
        <input type="submit" value="Tambah">
    </form>

    <h2>Data Penjualan</h2>
    <table>
        <tr>
            <th>ID Penjualan</th>
            <th>Nama Penjualan</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Kode PHP untuk mengambil dan menampilkan data penjualan dari database
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "namadatabase";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Koneksi ke database gagal: " . $conn->connect_error);
        }

        $query = "SELECT * FROM TabelPenjualan";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_penjualan"] . "</td>";
                echo "<td>" . $row["nama_penjualan"] . "</td>";
                echo "<td>";
                echo "<a href='edit_penjualan.php?id=" . $row["id_penjualan"] . "'>Edit</a>";
                echo " | ";
                echo "<a href='delete_penjualan.php?id=" . $row["id_penjualan"] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data penjualan.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <h2>Edit Penjualan</h2>
    <form action="update_penjualan.php" method="POST">
        <label for="nama_penjualan">Nama Penjualan:</label>
        <input type="text" name="nama_penjualan" id="nama_penjualan">
        <input type="submit" value="Simpan Perubahan">
    </form>

    <h2>Hapus Penjualan</h2>
    <p>Apakah Anda yakin ingin menghapus penjualan ini?</p>
    <form action="delete_penjualan.php" method="POST">
        <input type="submit" value="Hapus">
    </form>
</body>
</html>
