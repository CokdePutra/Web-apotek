<?php
session_start();
include('koneksi.php');
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

  <style>
* {
  box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 90%;
  padding: 200px;
  margin-left:130px;
  margin-top:-50px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* On screens that are 992px wide or less, go from four columns to two columns */
@media screen and (max-width: 992px) {
  .column {
    width: 50%;
  }
}

/* On screens that are 600px wide or less, make the columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
</style>

</head>
<body>
<!-- partial:index.partial.html -->
<header class="header">
  <div class="left-zone">
    <div id="toggle">
      <div class="one bar"></div>
      <div class="two bar"></div>
      <div class="three bar"></div>
    </div>
    <div class="logo">
      <a href="#">LOGO</a>
    </div>
  </div>


  <div class="right-zone">
    <div class="notification">
      <i class="fa fa-bell" aria-hidden="true"></i>
    </div>
    <div class="user-avatar">
      <a href="login/ubah_data.php?username=<?php echo $_SESSION['username'];?>"><img src="img/user.png" alt="" class="user-img"></a>
    </div>
  </div>
</header>
<nav id="side-nav">
  <div class="nav-list">
    <ul>
      <li><a href="dashboard.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i><span>HOME</span></a></li>
      <li class="dropdown"><a href="#" class="nav-link"><i class="fa fa-question-circle" aria-hidden="true"></i><span class="dropbtn">List Table</span></a>
        <div class="dropdown-content">
        <?php
          if(@$_SESSION['leveluser'] == 'admin'){
          ?>
        <a href="view/viewobat.php">Tabel Obat</a>
        <a href="view/viewsupplier.php">Tabel Supplier</a>
        <a href="view/viewkaryawan.php">Tabel Karyawan</a>
        <?php
          } else {

          }
        ?>
        <a href="view/viewpelanggan.php">Tabel Pelanggan</a>
        <a href="view/viewtransaksi.php">Tabel Transaksi</a>
        <a href="view/viewtransaksi.php">Tabel Detail Transaksi</a>
        </div>    
        <!-- <a href="view.php?page=obat">Tabel Obat</a>
        <a href="view.php?page=supplier">Tabel Supplier</a>
        <a href="view.php?page=karyawan">Tabel Karyawan</a>
        <a href="view.php?page=pelanggan">Tabel Pelanggan</a>
        <a href="view.php?page=transaksi">Tabel Transaksi</a>
        <a href="view.php?page=transaksi">Tabel Detail Transaksi</a> -->
      </li>
      <li><a href="login/registration.php" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i><span>NEW ACC</span></a></li>
      <li><a href="login/logout.php" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i><span>LOGOUT</span></a></li>
    </ul>
  </div>
</nav>
<!-- partial -->
  <script  src="Sidebar/script.js"></script>
<!-- Akhir Sidebar -->

  <div class="row">
  <div class="column">
    <h2>Selamat Datang <?php echo $_SESSION['leveluser']; ?> <?php echo $_SESSION['username']?></h2>
  </div>

</body>
</html>
