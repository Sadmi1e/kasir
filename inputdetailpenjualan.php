<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $PenjualanID = $_POST['PenjualanID'];
    $ProdukID = $_POST['ProdukID'];
    $JumlahProduk = $_POST['JumlahProduk'];
    $Subtotal = $_POST['Subtotal'];

    $detailpenjualan = "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk,Subtotal)
VALUES ('$PenjualanID', '$ProdukID', '$JumlahProduk', '$Subtotal' )";

if ($koneksi->query($detailpenjualan) === TRUE) {
    ?>
    <script>
        alert('Data berhasil ditambahkan');
        window.location="tampilandetailpenjualan.php";
    </script>

<?php
} else {
  echo "Error: " . $detailpenjualan . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>