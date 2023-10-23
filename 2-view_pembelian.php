<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Pembelian</title>
</head>
<body>
    <h1>Manajemen Pembelian</h1>

    <?php
    // Kode PHP untuk menghubungkan ke database dan mengambil data pembelian jika diperlukan
    // Gantilah bagian ini sesuai dengan kebutuhan Anda
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "namadatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    $query = "SELECT * FROM TabelPembelian";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h2>Data Pembelian</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["nama_pembelian"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Tidak ada data pembelian.</p>";
    }

    $conn->close();
    ?>

    <h2>Tambah Pembelian</h2>
    <form action="create_pembelian.php" method="POST">
        Nama Pembelian: <input type="text" name="nama_pembelian">
        <input type="submit" value="Tambah">
    </form>

    <h2>Edit Pembelian</h2>
    <form action="update_pembelian.php" method="POST">
        Nama Pembelian: <input type="text" name="nama_pembelian">
        <input type="submit" value="Simpan Perubahan">
    </form>

    <h2>Hapus Pembelian</h2>
    <p>Apakah Anda yakin ingin menghapus pembelian ini?</p>
    <form action="delete_pembelian.php" method="POST">
        <input type="submit" value="Hapus">
    </form>
</body>
</html>
