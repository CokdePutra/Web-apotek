<?php
include('koneksi.php');
include('page.php');
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo"<script>alert('anda belum login');location.href='login/login.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="Sidebar/style.css">
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
