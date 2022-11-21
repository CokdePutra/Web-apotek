<?php

session_start();
$username = $_POST['username'];
$password = $_POST['password'];

include "../koneksi.php";

// $query ="SELECT * FROM tb_login WHERE username='$username' AND 
// password='$password'";

// //var_dump($query);

// $hasil = mysqli_query($koneksi, $query);

// $cek = mysqli_num_rows($hasil);

$query ="SELECT * FROM tb_login WHERE username='$username'";
$hasil = mysqli_query($koneksi, $query);
$baris = mysqli_fetch_assoc($hasil);
$cek_pass = password_verify($password, $baris['password']);

if($cek_pass > 0 ){

    $data = mysqli_fetch_assoc($hasil);

    $_SESSION['username'] = $username;
    $_SESSION['leveluser'] = $baris['leveluser'];
    $_SESSION['idkaryawan'] = $baris['idkaryawan'];
    header('location:../dashboard.php');
}else{
    echo "<script>alert('GAGAL LOGIN');location.href='login.php';</script>";
}