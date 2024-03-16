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

<form action="inputdetailpenjualan.php" style="max-width:500px;margin:auto" method="post">
  <h2>Form Tambah Pelanggan</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <select name="pelangganid" class="input-field">
      <option>Sillahkan Plih PenjualanID</option>
      <?php
      include "koneksi.php";
      $query = mysqli_query($koneksi," SELECT * FROM penjualan")
      or die(mysqli_error($koneksi));
      while ($data = mysqli_fetch_array($query)) {
        echo "<option value $data[PenjualanID]>$data[PenjualanID]</option>";
      }
      ?>
    </select>
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <select name="pelangganid" class="input-field">
      <option>Sillahkan Plih ProdukID</option>
      <?php
      include "koneksi.php";
      $query = mysqli_query($koneksi," SELECT * FROM produk")
      or die(mysqli_error($koneksi));
      while ($data = mysqli_fetch_array($query)) {
        echo "<option value $data[ProdukID]>$data[ProdukID]</option>";
      }
      ?>
    </select>
  </div>
  
  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Jumlah Produk" name="JumlahProduk">
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Subtotal" name="Subtotal">
  </div>

  <button type="submit" name="submit" class="btn">Tambah</button><br><br>
  <button type="text" class="btn"><a href="tampilandetailpenjualan.php">Batal Tambah</button></a>

</form>

</body>
</html>
