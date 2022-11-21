<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
elseif(@$_SESSION['leveluser'] == 'karyawan'){
    echo"<script>alert('Maaf tidak bisa mengakses karena Anda adalah Karyawan');location.href='../dashboard.php'</script>";
}

else{


$namakaryawan = $_POST['namakaryawan'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];


$query = "INSERT INTO tb_karyawan values('','$namakaryawan','$alamat','$telp')";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal memasukan data Karyawan " . mysqli_query($koneksi));
}

else{
    echo "<script>
        alert('Data Berhasil di Tambahkan')
        document.location.href='../view/viewkaryawan.php';
        </script>
        ";
}

}