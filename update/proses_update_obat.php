<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}


$idobat = $_POST['idobat'];
$idsupplier = $_POST['idsupplier'];
$namaobat = $_POST['namaobat'];
$kategoriobat = $_POST['kategoriobat'];
$hargajual = $_POST['hargajual'];
$hargabeli = $_POST['hargabeli'];
$stok_obat = $_POST['stok_obat'];
$keterangan = $_POST['keterangan'];


$query = "UPDATE tb_obat set idobat='$idobat', idsupplier='$idsupplier', namaobat='$namaobat', kategoriobat='$kategoriobat', hargajual='$hargajual', hargabeli='$hargabeli', stok_obat='$stok_obat', keterangan='$keterangan' where idobat='$idobat'";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal memasukan data Obat " . mysqli_query($koneksi));
}

else{
    echo "<script>
        alert('Data Berhasil diupdate')
        document.location.href='../view/viewobat.php';
        </script>
        ";
}