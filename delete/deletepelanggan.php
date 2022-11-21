<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
elseif(@$_SESSION['leveluser'] == 'karyawan'){
    echo"<script>alert('Maaf tidak bisa mengakses karena Anda adalah Karyawan');location.href='../dashboard.php'</script>";
}

include('../koneksi.php');

$id = $_GET['idpelanggan'];

$query = "DELETE FROM tb_pelanggan WHERE idpelanggan ='$id'";

$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal Menghapus data Pelanggan " . mysqli_error($koneksi));
}

else{
    echo "<script>
        alert('Data DIdelete')
        document.location.href='../view/viewpelanggan.php';
        </script>
        ";
}