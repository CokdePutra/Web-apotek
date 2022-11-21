<?php

include "../koneksi.php";

session_start();
if(!isset($_SESSION['username'])){
    echo"<script>alert('anda belum login');location.href='login.php'</script>";
}

$username = $_POST['username'];
$password = $_POST['password'];
$leveluser = $_POST['leveluser'];
$idkaryawan = $_POST['idkaryawan'];

$pws_encript = password_hash($password, PASSWORD_DEFAULT);

$query_cek_user = "SELECT * FROM tb_login  WHERE username='$username'";
$hasil_user = mysqli_query($koneksi, $query_cek_user);
$cek_row_user = mysqli_num_rows($hasil_user);

if($cek_row_user > 0){
    echo "<script>
    alert('Maaf Username sudah di Registrasi, Silahkan ganti Username ');
    location.href='../dashboard.php';
    </script>";
} else {
    $query = "INSERT INTO tb_login VALUE ('$username', '$password', '$leveluser', '$idkaryawan')";
    $result = mysqli_query($koneksi, $query);

if(!$result){
    echo "<script>
    alert('Register failed!');
    location.href='register.php';
    </script>";
} else {
    echo "<script>
    alert('Anda Berhasil Registrasi, Silahkan login dengan akun yang sudah terdaftar ');
    location.href='../dashboard.php';
    </script>";
}
}

