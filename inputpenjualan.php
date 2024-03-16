<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    // Memeriksa apakah kunci "namapelanggan" ada dalam $_POST
    if(isset($_POST['namapelanggan'])){
        $tanggal = $_POST['tanggal'];
        $totalharga = $_POST['totalharga'];
        $pelangganid = $_POST['pelangganid'];

        // Periksa ketersediaan PelangganID di tabel pelanggan
        $check_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE PelangganID = '$pelangganid'");
        
        if(mysqli_num_rows($check_pelanggan) > 0) { // Jika PelangganID valid
            // Gunakan JOIN untuk mendapatkan informasi pelanggan saat menyisipkan data penjualan
            $penjualan = "INSERT INTO penjualan (TanggalPenjualan, TotalHarga, PelangganID) 
                          SELECT '$tanggal', '$totalharga', pelanggan.PelangganID
                          FROM pelanggan
                          WHERE pelanggan.PelangganID = '$pelangganid'";

            if ($koneksi->query($penjualan) === TRUE) {
?>
                <script>
                    alert('Data berhasil ditambahkan');
                    window.location="tampilanpenjualan.php";
                </script>
<?php
            } else {
                echo "<script>alert('Error: " . $koneksi->error . "');</script>";
            }
        } else { // Jika PelangganID tidak valid
            echo "<script>alert('PelangganID tidak valid');</script>";
        }
        $koneksi->close();
    } else {
        // Handle ketika kunci "namapelanggan" tidak ada dalam $_POST
        echo "<script>alert('Kunci namapelanggan tidak ditemukan dalam POST');</script>";
    }
}
?>
