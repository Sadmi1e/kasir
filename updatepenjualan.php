<?php
include "koneksi.php";
$NamaPelanggan = "SELECT * FROM penjualan JOIN
pelanggan ON penjualan.PelangganID = $NamaPelanggan";


if (isset($_POST['edit'])) {
    $PenjualanID = $_POST['PenjualanID'];
    $TanggalPenjualan = $_POST['TanggalPenjualan'];
    $TotalHarga = $_POST['TotalHarga'];
    $NamaPelanggan = $_POST['PelangganID'];

    // Jalankan query SQL untuk melakukan UPDATE
    $query = mysqli_query($koneksi, "UPDATE penjualan SET TanggalPenjualan='$TanggalPenjualan', TotalHarga='$TotalHarga'  PelangganID='$NamaPelanggan'  WHERE PenjualanID='$PenjualanID'");
    // Periksa apakah query berhasil dijalankan
    if ($query) {
        // Pesan berhasil jika query berhasil
?>
    <script>
        alert('Penjualan Berhasil Diedit');
        window.location = "tampilanpenjualan.php";
    </script>
<?php
    } else {
        // Pesan kesalahan jika terjadi kesalahan saat menjalankan query
?>
    <script>
        alert('Terjadi kesalahan saat mengedit penjualan. Silakan coba lagi.');
        window.location = "tampilanpenjualan.php";
    </script>
<?php
        // Tampilkan pesan kesalahan MySQL jika ada
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
