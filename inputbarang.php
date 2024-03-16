<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $namaproduk = $_POST['namaproduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $produk = "INSERT INTO produk (NamaProduk, Harga, Stok, Keterangan)
VALUES ('$namaproduk', '$harga', '$stok','$keterangan')";

if ($koneksi->query($produk) === TRUE) {
    ?>
    <script>
        alert('data berhasil ditambahkan');
        window.location="tampilanproduk.php";
    </script>

<?php
} else {
  echo "Error: " . $produk . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>