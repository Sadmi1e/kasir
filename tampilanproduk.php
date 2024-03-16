<?php
    include "koneksi.php";

    $table = "SELECT * FROM produk";
    $data = mysqli_query($koneksi,$table);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-size: cover;
}

.container {
  padding: 16px;
}


.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 15%;
  border-radius: 100%;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 14px 76px;
  text-decoration: none;
  display: block;
  text-align: right;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.sidebar {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 180px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>



<div class="navbar">
  <a href="#home">Toko Fry Banana</a>
  <div class="dropdown" style="float: right; margin-right: 30px;">
    <button class="dropbtn">Selamat Datang Admin
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="landingpage.html">Log Out</a>
     </div>
  </div> 
</div>

<div class="sidebar">
    <a h+ref="dashboard.php"><i class="fa 	fa fa-home"></i> Dashboard</a>
<br>
    <a href="tampilanpelanggan.php"><i class="fa fa-fw fa fa-users"></i> Pelanggan</a>
    <a href="tampilanproduk.php"><i class="fa fa-fw fa fa-hourglass-2"></i> Stok Barang</a>
    <a href="tampilanpenjualan.php"><i class="fa fa-fw fa fa-line-chart"></i> Penjualan</a>
    <a href="tampilandetailpenjualan.php"><i class="fa fa-fw	fa fa-power-off"></i>Detail Penjualan</a>
  </div>
  
  <div class="main"> 
    <h2>Data Produk</h2>
  <button type="text"> <a href="inputbarang.html">Tambah Produk</button></a>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

    <table id="myTable" border="solid">
        <thead>
        <th>Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th style="text-align: center;"  colspan=" 2">AKSI</th>
        </thead>
        <?php 
        while ($tampil = mysqli_fetch_assoc($data)){
        ?>
        <tbody>
            <tr>
            <td center><?php echo $tampil['NamaProduk'];?></td>
            <td><?php echo $tampil['Harga'];?></td>
            <td><?php echo $tampil['Stok'];?> </td>
            <td><button type="text"><a style="color: black;text-decoration:none"style="color: black;text-decoration:none, text-align: center;" href="editproduk.php?ProdukID=<?php echo $tampil['ProdukID'];?>"><i class="fa fa-fw	fa fa-edit"></i></a></button></td>
            <td><button type="text"><a style="color: black;text-decoration:none" href="hapusproduk.php?ProdukID=<?php echo $tampil['ProdukID'];?>"><i class="fa fa-fw	fa fa-trash-o"></i></a></button></td>
            </tr>
            <?php
        }
            ?>
        </tbody>
    </table>


    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
  </div>
</body>
</html>
