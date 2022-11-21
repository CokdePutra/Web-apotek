<?php

include ('../../database/koneksi.php');

$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$usia = $_POST['usia'];
$buktifotoresep = $_FILES['buktifotoresep']['name'];

if ($buktifotoresep !="") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x                      = explode(".",$buktifotoresep);
    $ekstensi               = strtolower(end($x));
    $file_tmp               = $_FILES['buktifotoresep']['tmp_name'];
    $nama_gambar_baru       = $buktifotoresep;

        if(in_array($ekstensi,$ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, '../simpanfoto/'.$nama_gambar_baru);
        
        $query = "INSERT INTO tb_pelanggan (namalengkap, alamat, telp, usia, buktifotoresep) VALUES ('$namalengkap','$alamat','$telp','$usia','$nama_gambar_baru')";

        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die ("Query gagal dijalankan: " . mysqli_errno($koneksi,$query). "-" .mysqli_error($koneksi,$query));
        } else {
            echo "<script>alert('Data berhasil masuk'); location.href='../../dashboard.php?page=pelanggan';</script>";
}
        
    }else {
            echo "<script>alert('Extensi gambar hanya boleh png, jpeg, jpg.');window.location='insert_pelanggan.php';</script>";
        }
    } 
    else{
    $query = "INSERT INTO tb_pelanggan (namalengkap, alamat, telp, usia, buktifotoresep) VALUES ('$namalengkap','$alamat','$telp','$usia','$nama_gambar_baru')";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
            die ("Query gagal dijalankan: " . mysqli_errno($koneksi,$query). "-" .mysqli_error($koneksi,$query));
        } else {
            echo "<script>alert('Data berhasil masuk'); location.href='../../dashboard.php?page=pelanggan';</script>";
}
}

?>