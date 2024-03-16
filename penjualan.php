<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $tanggal = $_POST['tanggal'];
    $totalharga = $_POST['totalharga'];
    $namapelanggan = $_POST['namapelanggan'];

    $penjualan = "INSERT INTO penjualan (TanggalPenjualan, TotalHarga, PelenganID)
VALUES ('$tanggal', '$totalharga', '$namapelanggan')";

if ($koneksi->query($penjualan) === TRUE) {
    ?>
    <script>
        alert('data berhasil ditambahkan');
        window.location="tampilanproduk.php";
    </script>

<?php
} else {
  echo "Error: " . $penjualan . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>