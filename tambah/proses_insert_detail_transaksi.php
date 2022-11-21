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
$idobat = $_POST['idobat'];
$jumlah = $_POST['jumlah'];
$hargasatuan = $_POST['hargasatuan'];
$totalharga = $_POST['totalharga'];


$query = "INSERT INTO tb_detail_transaksi VALUES('','$idtransaksi','$idobat','$jumlah','$hargasatuan','$totalharga')";

include ('../koneksi.php');
$hasil = mysqli_query($koneksi, $query);

if(!$hasil) {
    die("Gagal memasukan data Detail Transaksi " . mysqli_error($koneksi, $query));
    
}

else{
    echo "<script>
        alert('Data Berhasil di Tambahkan')
        document.location.href='../view/viewdetail_transaksi.php';
        </script>
        ";
}

}