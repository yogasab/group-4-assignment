<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rugi Laba</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <h1>Data Laporan Rugi Laba</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="laporanTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Total Penjualan</th>
                                <th>Rata-rata Harga Penjualan</th>
                                <th>Total Pembelian</th>
                                <th>Rata-rata Harga Pembelian</th>
                                <th>Rugi Laba</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#laporanTable').DataTable({
                "ajax": {
                    "url": "http://localhost/group-4-assignment/4b.php",
                    "dataSrc": "data"
                },
                "columns": [{
                        "data": "idbarang"
                    },
                    {
                        "data": "nama_barang"
                    },
                    {
                        "data": "total_penjualan"
                    },
                    {
                        "data": "rata_rata_harga_penjualan"
                    },
                    {
                        "data": "total_pembelian"
                    },
                    {
                        "data": "rata_rata_harga_pembelian"
                    },
                    {
                        "data": "rugi_laba"
                    }
                ]
            });
        });
    </script>
</body>

</html>