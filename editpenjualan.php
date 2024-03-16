<?php
include "koneksi.php";
$table = "SELECT * FROM penjualan JOIN
pelanggan ON penjualan.PelangganID = pelanggan.PelangganID";
$data = mysqli_query($koneksi,$table);

$PenjualanID = $_GET['PenjualanID'];
$edit = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE PenjualanID='$PenjualanID'");
$data = mysqli_fetch_array($edit);
if (!$data) {
    die("Data tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  
}

a {
    text-decoration: none;
    color: white;
}
.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<form action="updatepenjualan.php" style="max-width:500px;margin:auto" method="post">
  <h2>Edit Penjualan</h2>
  <input class="input-field" type="hidden" name="PenjualanID"  value="<?php echo $data['PenjualanID'];?>" required>

  <div class="input-container">
    <i class="fa fa fa-calendar icon"></i>
    <label class="input-field">Tanggal Penjualan</label>
    <input class="input-field" type="date" placeholder="Pilih Tanggal" name="TanggalPenjualan" value="<?php echo $data['TanggalPenjualan'];?>" >
  </div>

  <div class="input-container">
    <i class="fa fa-money icon"></i>
    <label class="input-field">Total Harga </label>
    <input class="input-field" type="text" placeholder="Masukkan Total Harga" name="TotalHarga" value="<?php echo $data['TotalHarga'];?>">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <label class="input-field">Nama Pelanggan</label>
    <select name="NamaPelanggan" class="input-field" ?>">
      <option>Sillahkan Plih Pelanggan</option>
      <?php
      include "koneksi.php";
      $query = mysqli_query($koneksi," SELECT * FROM pelanggan")
      or die(mysqli_error($koneksi));
      while ($data = mysqli_fetch_array($query)) {
        echo $tampil['PelangganID'], 
        "<option value $data[PelangganID]>$data[NamaPelanggan]</option>";
      }
      ?>
    </select>
  </div>


  <button type="submit" name="edit" class="btn">Edit</button><br><br>
  <button type="text" class="btn"><a href="tampilanpenjualan.php">Batal Edit</button></a>

</form>

</body>
</html>
