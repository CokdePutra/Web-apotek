<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
elseif(@$_SESSION['leveluser'] == 'karyawan'){
    echo"<script>alert('Maaf tidak bisa mengakses karena Anda adalah Karyawan');location.href='../dashboard.php'</script>";
}

else{


$perusahaan = $_POST['perusahaan'];
$keterangan = $_POST['keterangan'];


$query = "INSERT INTO tb_supplier values('','$perusahaan','$keterangan')";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal memasukan data Obat " . mysqli_query($koneksi));
}

else{
    echo "<script>
        alert('Data Berhasil di Tambahkan')
        document.location.href='../view/viewsupplier.php';
        </script>
        ";
}

}