<?php
include "koneksi.php";

$ProdukID = $_GET['ProdukID'];
$query = mysqli_query ($koneksi, "DELETE from produk WHERE ProdukID='$ProdukID'");

if ($query) {
    //Pesan berhasil
?>
<script>
    alert('Produk Berhasil Dihapus');
    window.location = "tampilanproduk.php";
</script>
<?php
} else {
    //Pesan warning ketika terjadi kesalahan
?>
<script>
    alert('Gagal hapus data produk. Silahkan coba lagi.');
    window.location = "tampilanproduk.php";
</script>
<?php
}