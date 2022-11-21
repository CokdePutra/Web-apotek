<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
elseif(@$_SESSION['leveluser'] == 'karyawan'){
    echo"<script>alert('Maaf tidak bisa mengakses karena Anda adalah Karyawan');location.href='../dashboard.php'</script>";
}

else{


$idtransaksi = $_POST['idtransaksi'];
$idpelanggan = $_POST['idpelanggan'];
$idkaryawan = $_POST['idkaryawan'];
$tgltransaksi = $_POST['tgltransaksi'];
$kategoripelanggan = $_POST['kategoripelanggan'];
$totalbayar = $_POST['totalbayar'];
$bayar = $_POST['bayar'];
$kembali= $_POST['kembali'];


$query = "INSERT INTO tb_transaksi values('$idtransaksi','$idpelanggan','$idkaryawan','$tgltransaksi','$kategoripelanggan','$totalbayar','$bayar','$kembali')";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal memasukan data Transaksi " . mysqli_query($koneksi));
}

else{
    echo "<script>
        alert('Data Berhasil di Tambahkan')
        document.location.href='../view/viewtransaksi.php';
        </script>
        ";
}

}