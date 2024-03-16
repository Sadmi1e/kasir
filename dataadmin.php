<?php
    include "koneksi.php";

    $table = "SELECT * FROM admin";
    $data = mysqli_query($koneksi,$table);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data admin</title>
    <style>
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
    <table border="solid">
        <thead>
        <th>USERNAME</th>
        <th>PASSWORD</th>
        <th colspan="2">AKSI</th>
        </thead>
        <?php 
        while ($tampil = mysqli_fetch_assoc($data)){
        ?>
        <tbody>
            <tr>
            <td><?php echo $tampil['username'];?></td>
            <td><?php echo $tampil['password'];?></td>
            <td><button type="text"><a style="color: black;text-decoration:none"style="color: black;text-decoration:none" href="editadmin.php?id=<?php echo $tampil['pelangganid'];?>">EDIT</a></button></td>
            <td><button type="text"><a style="color: black;text-decoration:none" href="hapusadmin.php?id=<?php echo $tampil['id'];?>">Hapus</a></button></td>
            </tr>
            <?php
        }
            ?>
        </tbody>
    </table>



</body>
</html>