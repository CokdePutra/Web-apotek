<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}


$idtransaksi = $_POST['idtransaksi'];
$idpelanggan = $_POST['idpelanggan'];
$idkaryawan = $_POST['idkaryawan'];
$tgltransaksi = $_POST['tgltransaksi'];
$kategoripelanggan = $_POST['kategoripelanggan'];
$totalbayar = $_POST['totalbayar'];
$bayar = $_POST['bayar'];
$kembali = $_POST['kembali'];


$query = "UPDATE tb_transaksi set idtransaksi='$idtransaksi', idpelanggan='$idpelanggan', idkaryawan='$idkaryawan', tgltransaksi='$tgltransaksi', kategoripelanggan='$kategoripelanggan', totalbayar='$totalbayar', bayar='$bayar', kembali='$kembali' where idtransaksi='$idtransaksi'";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal memasukan data Transaksi " . mysqli_query($koneksi));
}

else{
    echo "<script>
        alert('Data Berhasil diupdate')
        document.location.href='../view/viewtransaksi.php';
        </script>
        ";
}