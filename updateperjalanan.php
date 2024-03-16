<?php
include "Jaringan.php";

if(isset($_POST['Edit'])){
$id = $_POST['id'];
$tanggal = $_POST['tanggal'];
$hari = $_POST['hari'];
$bulan = $_POST['bulan'];
$estimasi_kegiatan = $_POST['estimasi_kegiatan'];
$lokasi_kegiatan = $_POST['lokasi_kegiatan'];
$biaya_perjalanan = $_POST['biaya_perjalanan'];
   
    $query = mysqli_query($jaringan, "UPDATE kegiatan SET tanggal='$tanggal', hari='$hari', bulan='$bulan', estimasi_kegiatan='$estimasi_kegiatan', lokasi_kegiatan='$lokasi_kegiatan', biaya_perjalanan='$biaya_perjalanan' WHERE id='$id'"); 
   

 if ($query) {
    ?>
    <script>
    alert('Berhasil Mengedit Data');
    window.location="MIDPweb.php";
    </script>
    <?php
   }else {
 ?>   
   <script>
    alert('Gagal Mengedit Data');
    window.location="MIDPweb.php";
    </script>
<?php
   }
}