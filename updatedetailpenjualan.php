<?php
include "koneksi.php";

if (isset($_POST['edit'])) {
    $DetailID = $_POST['DetailID'];
    $PelangganID = $_POST['PelangganID'];
    $ProdukID= $_POST['ProdukID'];
    $JumlahProduk = $_POST['JumlahProduk'];
    $Subtotal = $_POST['Subtotal'];

    // Jalankan query SQL untuk melakukan UPDATE
    $query = mysqli_query($koneksi, "UPDATE detailpenjualan SET PelangganID='$PelangganID', ProdukID='$ProdukID', JumlahProduk='$JumlahProduk' , Subtotal='$Subtotal' WHERE DetailID='$DetailID'");

    // Periksa apakah query berhasil dijalankan
    if ($query) {
        // Pesan berhasil jika query berhasil
?>
    <script>
        alert('Akun Anda Berhasil Diedit');
        window.location = "tampilandetailpenjualan.php";
    </script>
<?php
    } else {
        // Pesan kesalahan jika terjadi kesalahan saat menjalankan query
?>
    <script>
        alert('Terjadi kesalahan saat mengedit akun. Silakan coba lagi.');
        window.location = "tampilandetailpenjualan.php";
    </script>
<?php
        // Tampilkan pesan kesalahan MySQL jika ada
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
