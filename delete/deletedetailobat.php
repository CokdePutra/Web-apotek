<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');

$id = $_GET['iddetailtransaksi'];

$hasil = mysqli_query($koneksi, "DELETE FROM tb_detail_transaksi WHERE iddetailtransaksi='$id'");

if(!$hasil) {
    die("Gagal Menghapus data Transaksi " . mysqli_error($koneksi));
}

else{
    echo "<script>
        alert('Data DIdelete')
        document.location.href='../view/viewtransaksi.php';
        </script>
        ";
}