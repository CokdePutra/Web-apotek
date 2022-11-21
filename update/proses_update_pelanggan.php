<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}


include ('../koneksi.php');

$idpelanggan = $_POST['idpelanggan'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$usia = $_POST['usia'];
$buktifotoresep = $_FILES ['buktifotoresep']['name'];

if ($buktifotoresep !="") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x                      = explode(".",$buktifotoresep);
    $ekstensi               = strtolower(end($x));
    $file_tmp               = $_FILES['buktifotoresep']['tmp_name'];
    $nama_gambar_baru       = $buktifotoresep;

        if(in_array($ekstensi,$ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, '../pict/'.$nama_gambar_baru);
        
        $query = "UPDATE tb_pelanggan set namalengkap='$namalengkap', alamat='$alamat', telp='$telp', usia='$usia', buktifotoresep='$nama_gambar_baru'";

        $query .= "WHERE idpelanggan = '$idpelanggan'";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            die ("Data Gagal Dimasukan" .mysqli_errno($koneksi, $query)." - ".mysqli_error($koneksi, $query));
        } else {
            echo "<script>alert('Data Berhasil Ditambahkan.');window.location='../view/viewpelanggan.php';</script>";
        }
        
    }else {
            echo "<script>alert('Extensi gambar hanya boleh png, jpeg, jpg.');window.location='proses_insert_pelanggan.php';</script>";
        }
    } 
else{
    $query = "UPDATE tb_pelanggan set namalengkap='$namalengkap', alamat='$alamat', telp='$telp', usia='$usia'";
    
    $query .= "WHERE idpelanggan = '$idpelanggan'";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die ("Data Gagal Dimasukan" .mysqli_errno($koneksi, $query)."-".mysqli_error($koneksi, $query));
    }else {
        echo "<script>alert('Data Berhasil Ditambahkan.');window.location='../view/viewpelanggan.php';</script>";
}
}
?>