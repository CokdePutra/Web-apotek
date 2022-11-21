<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
elseif(@$_SESSION['leveluser'] == 'karyawan'){
    echo"<script>alert('Maaf tidak bisa mengakses karena Anda adalah Karyawan');location.href='../dashboard.php'</script>";
}

include('../koneksi.php');

$id = $_GET['iddetailtransaksi'];

$query = "DELETE FROM tb_detail_transaksi WHERE iddetailtransaksi ='$id'";

$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal Menghapus data Obat " . mysqli_error($koneksi, $query));
}

else{
    echo "<script>
        alert('Data Di delete')
        document.location.href='../view/viewdetail_transaksi.php';
        </script>
        ";
}