<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $admin = "INSERT INTO admin (username, password)
VALUES ('$username', '$password')";

if ($koneksi->query($admin) === TRUE) {
    ?>
    <script>
        alert('Admin berhasil ditambahkan, Silahkan Login');
        window.location="loginadmin.html";
    </script>
s
<?php
} else {
  echo "Error: " . $admin . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>