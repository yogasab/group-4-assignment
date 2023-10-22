import java.util.Scanner;
import java.util.ArrayList;
import java.util.List;

public class Main {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        DataPenjualan dataPenjualan = new DataPenjualan(); // Kelas untuk menyimpan data penjualan

        while (true) {
            System.out.println("=== Menu Utama ===");
            System.out.println("1. Lihat Laporan Penjualan");
            System.out.println("2. Catat Pemasukan");
            System.out.println("3. Catat Pengeluaran");
            System.out.println("4. Backup Data");
            System.out.println("5. Keluar");
            System.out.print("Pilihan: ");
            int choice = input.nextInt();
            input.nextLine(); // Membersihkan newline

            switch (choice) {
                case 1:
                    dataPenjualan.tampilkanLaporanPenjualan();
                    break;
                case 2:
                    dataPenjualan.catatPemasukan(input);
                    break;
                case 3:
                    dataPenjualan.catatPengeluaran(input);
                    break;
                case 4:
                    dataPenjualan.backupData();
                    break;
                case 5:
                    System.out.println("Terima kasih telah menggunakan aplikasi.");
                    System.exit(0);
                    break;
                default:
                    System.out.println("Pilihan tidak valid. Silakan coba lagi.");
                    break;
            }
        }
    }
}

class DataPenjualan {
    private List<PenjualanItem> penjualanItems = new ArrayList<>();
    private List<PemasukanItem> pemasukanItems = new ArrayList<>();
    private List<PengeluaranItem> pengeluaranItems = new ArrayList<>();

    public void tampilkanLaporanPenjualan() {
        System.out.println("=== Laporan Penjualan ===");
        // Tampilkan data penjualan
        for (PenjualanItem item : penjualanItems) {
            System.out.println(item);
        }
        System.out.println("Total Penjualan: " + hitungTotalPenjualan());
        System.out.println();

        System.out.println("=== Laporan Pemasukan ===");
        // Tampilkan data pemasukan
        for (PemasukanItem item : pemasukanItems) {
            System.out.println(item);
        }
        System.out.println("Total Pemasukan: " + hitungTotalPemasukan());
        System.out.println();

        System.out.println("=== Laporan Pengeluaran ===");
        // Tampilkan data pengeluaran
        for (PengeluaranItem item : pengeluaranItems) {
            System.out.println(item);
        }
        System.out.println("Total Pengeluaran: " + hitungTotalPengeluaran());
        System.out.println();
    }

    public void catatPemasukan(Scanner input) {
        System.out.println("=== Catat Pemasukan ===");
        System.out.print("Jumlah uang yang diterima: ");
        double jumlahUang = input.nextDouble();
        input.nextLine(); // Membersihkan newline
        System.out.print("Kategori pemasukan: ");
        String kategori = input.nextLine();
        System.out.print("Tanggal transaksi: ");
        String tanggal = input.nextLine();

        // Menyimpan data pemasukan
        PemasukanItem pemasukanItem = new PemasukanItem(jumlahUang, kategori, tanggal);
        pemasukanItems.add(pemasukanItem);
        System.out.println("Pemasukan berhasil dicatat.");
    }

    public void catatPengeluaran(Scanner input) {
        System.out.println("=== Catat Pengeluaran ===");
        System.out.print("Jumlah uang yang dikeluarkan: ");
        double jumlahUang = input.nextDouble();
        input.nextLine(); // Membersihkan newline
        System.out.print("Kategori pengeluaran: ");
        String kategori = input.nextLine();
        System.out.print("Tanggal transaksi: ");
        String tanggal = input.nextLine();

        // Menyimpan data pengeluaran
        PengeluaranItem pengeluaranItem = new PengeluaranItem(jumlahUang, kategori, tanggal);
        pengeluaranItems.add(pengeluaranItem);
        System.out.println("Pengeluaran berhasil dicatat.");
    }

    public void backupData() {
        System.out.println("Melakukan backup data...");
        // Implementasi backup data disini
    }

    private double hitungTotalPemasukan() {
        double total = 0;
        for (PemasukanItem item : pemasukanItems) {
            total += item.getJumlahUang();
        }
        return total;
    }

    private double hitungTotalPengeluaran() {
        double total = 0;
        for (PengeluaranItem item : pengeluaranItems) {
            total += item.getJumlahUang();
        }
        return total;
    }

    private double hitungTotalPenjualan() {
        double total = 0;
        // Hitung total penjualan dari data penjualanItems
        // Implementasikan sesuai kebutuhan Anda
        return total;
    }
}

class PenjualanItem {
    private double jumlahUang;
    private String keterangan;
    private String tanggal;

    public PenjualanItem(double jumlahUang, String keterangan, String tanggal) {
        this.jumlahUang = jumlahUang;
        this.keterangan = keterangan;
        this.tanggal = tanggal;
    }

    public double getJumlahUang() {
        return jumlahUang;
    }

    @Override
    public String toString() {
        return "Jumlah: " + jumlahUang + ", Keterangan: " + keterangan + ", Tanggal: " + tanggal;
    }
}

class PemasukanItem {
    private double jumlahUang;
    private String kategori;
    private String tanggal;

    public PemasukanItem(double jumlahUang, String kategori, String tanggal) {
        this.jumlahUang = jumlahUang;
        this.kategori = kategori;
        this.tanggal = tanggal;
    }

    public double getJumlahUang() {
        return jumlahUang;
    }

    @Override
    public String toString() {
        return "Jumlah: " + jumlahUang + ", Kategori: " + kategori + ", Tanggal: " + tanggal;
    }
}

class PengeluaranItem {
    private double jumlahUang;
    private String kategori;
    private String tanggal;

    public PengeluaranItem(double jumlahUang, String kategori, String tanggal) {
        this.jumlahUang = jumlahUang;
        this.kategori = kategori;
        this.tanggal = tanggal;
    }

    public double getJumlahUang() {
        return jumlahUang;
    }

    @Override
    public String toString() {
        return "Jumlah: " + jumlahUang + ", Kategori: " + kategori + ", Tanggal: " + tanggal;
    }
}
