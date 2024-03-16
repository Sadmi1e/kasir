<?php
include "koneksi.php";

$DetailID = $_GET['DetailID']; // Memperbaiki variabel yang digunakan di sini

$query = mysqli_query($koneksi, "DELETE FROM detailpenjualan WHERE DetailID='$DetailID'");

if ($query) {
    //Pesan berhasil
?>
<script>
    alert('Penjualan Berhasil Dihapus');
    window.location = "tampilandetailpenjualan.php";
</script>
<?php
} else {
    //Pesan warning ketika terjadi kesalahan
?>
<script>
    alert('Gagal hapus data penjualan. Silahkan coba lagi.');
    window.location = "tampilandetailpenjualan.php";
</script>
<?php
}
?>
