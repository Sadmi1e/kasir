<?php
include "koneksi.php";

// Periksa apakah parameter 'PelangganID' disertakan dalam URL
if (!isset($_GET['PelangganID'])) {
    die("Parameter PelangganID tidak disertakan dalam URL.");
}

$PelangganID = $_GET['PelangganID'];

// Periksa apakah data dengan ID yang diberikan ada dalam database
$edit = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE PelangganID='$PelangganID'");
$data = mysqli_fetch_array($edit);
if (!$data) {
    die("Data tidak ditemukan.");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT Pelanggan</title>
    <link rel="stylesheet" href="hm.css">
</head>
<body>
   <form class="bingkai" action="updatepelanggan.php" method="POST">
   <h2>SILAHKAN EDIT Pelanggan</h2>
   <input type="hidden" name="PelangganID" value="<?php echo $data['PelangganID'];?>" required><br><br>
   <input type="text" name="NamaPelanggan" value="<?php echo $data['NamaPelanggan'];?>"  placeholder="MASUKKAN NAMA ANDA" required><br><br>
   <input type="text" name="Alamat" value="<?php echo $data['Alamat'];?>"  placeholder="MASUKKKAN PASSWORD ANDA" required><br><br>
   <input type="text" name="NomorTelepon" value="<?php echo $data['NomorTelepon'];?>"  placeholder="MASUKKKAN PASSWORD ANDA" required><br><br>
   <button type="submit" name="edit">Edit</button><br><br>
   <button type="text"><a style="color: black;text-decoration:none" href="dataadmin.php">Batal Edit</a></button>
   <h3>Password mengandung angka,simbol,huruf besar,huruf kecil, dan tidak boleh lebih dari 10</h3>


    </form>
</body>
</html>
