<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
elseif(@$_SESSION['leveluser'] == 'karyawan'){
    echo"<script>alert('Maaf tidak bisa mengakses karena Anda adalah Karyawan');location.href='../dashboard.php'</script>";
}

else{


$idsupplier = $_POST['idsupplier'];
$namaobat = $_POST['namaobat'];
$kategoriobat = $_POST['kategoriobat'];
$hargajual = $_POST['hargajual'];
$hargabeli = $_POST['hargabeli'];
$stok_obat = $_POST['stok_obat'];
$keterangan = $_POST['keterangan'];


$query = "INSERT INTO tb_obat values('','$idsupplier','$namaobat','$kategoriobat','$hargajual','$hargabeli','$stok_obat','$keterangan')";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal memasukan data Obat " . mysqli_query($koneksi));
}

else{
    echo "<script>
        alert('pesan berhasil di simpan')
        document.location.href='../view/viewobat.php';
        </script>
        ";
}

}