<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
    $petugas = $_POST['petugas'];
    $password = $_POST['password'];
    $login = mysqli_query($koneksi, "SELECT * FROM petugas WHERE petugas = '$petugas' AND password = '$password'");
 $cek = mysqli_num_rows($login);

     if ($cek) {

        //Pesan berhasil
?>
    <script>
        alert('USERNAME DAN PASSWORD BENAR. LOGIN BERHASIL');
        window.location = "dashboard.php";
    </script>
    <?php
    } else {
    //pesan jika terjadi kesalahan
    ?>
    <script>
        alert('USERNAME DAN PASSWORD TIDAK BENAR. SILAHKAN LOGIN ULANG!');
        window.location = "loginpetugas.html";
    </script>
<?php
}
}
?>