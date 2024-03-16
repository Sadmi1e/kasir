<?php
include "koneksi.php";

$id = $_GET['id'];
$query = mysqli_query ($koneksi, "DELETE from admin WHERE id='$id'");

if ($query) {
    //Pesan berhasil
?>
<script>
    alert('Admin Berhasil Dihapus');
    window.location = "dataadmin.php";
</script>
<?php
} else {
    //Pesan warning ketika terjadi kesalahan
?>
<script>
    alert('Gagal hapus data admin. Silahkan coba lagi.');
    window.location = "dataadmin.php";
</script>
<?php
}