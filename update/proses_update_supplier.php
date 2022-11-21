<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}


$idsupplier = $_POST['idsupplier'];
$perusahaan = $_POST['perusahaan'];
$keterangan = $_POST['keterangan'];

$query = "UPDATE tb_supplier set idsupplier='$idsupplier', perusahaan='$perusahaan', keterangan='$keterangan' where idsupplier='$idsupplier'";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal memasukan data Obat " . mysqli_query($koneksi));
}

else{
    echo "<script>
        alert('Data Berhasil di Update')
        document.location.href='../view/viewsupplier.php';
        </script>
        ";
}