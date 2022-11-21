<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}


$iddetailtransaksi = $_POST['iddetailtransaksi'];
$idtransaksi = $_POST['idtransaksi'];
$idobat = $_POST['idobat'];
$jumlah = $_POST['jumlah'];
$hargasatuan = $_POST['hargasatuan'];
$totalharga = $_POST['totalharga'];

$query = "UPDATE tb_detail_transaksi set iddetailtransaksi='$iddetailtransaksi', idtransaksi='$idtransaksi', idobat='$idobat', jumlah='$jumlah', hargasatuan='$hargasatuan', totalharga='$totalharga' where iddetailtransaksi='$iddetailtransaksi'";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal memasukan data Obat " . mysqli_query($koneksi));
}

else{
    echo "<script>
        alert('Data Berhasil di Update')
        document.location.href='../view/viewdetail_transaksi.php';
        </script>
        ";
}