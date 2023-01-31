<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo"<script>alert('anda belum login');location.href='login/login.php'</script>";
}
elseif(@$_SESSION['leveluser'] == 'karyawan'){
  echo"<script>alert('Maaf tidak bisa mengakses karena Anda adalah Karyawan');location.href='../dashboard.php'</script>";
}

else{
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Tabel Karyawan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="../Sidebar/style.css">
  <link rel="stylesheet" href="../dashboard.css">
  <link rel="stylesheet" href="view.css">
  <link rel="stylesheet" href="switch.css">
  <link rel="stylesheet" href="dark-mode.css">
  <script src="https://kit.fontawesome.com/2470e0aebf.js" crossorigin="anonymous"></script>

  <style>
    @media print {
      .print{
        display: none !important;
      }
    }
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
<header class="header print">
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

  <form action="" method="POST">
  <?php
  include('../koneksi.php');
  $query = "SELECT * FROM tb_karyawan";
  $keyword = $_POST['keyword'];
  // var_dump($keyword);
  if(isset($_POST["cari"])){
      $query = "SELECT * FROM tb_karyawan WHERE idkaryawan like '%$keyword%' or
                                                 namakaryawan like '%$keyword%' or
                                                 alamat like '%$keyword%' or
                                                 telp like '%$keyword%'";
  }
  ?>

  <div class="search-input">
    <input type="text" name="keyword" autocomplete="off"></input>
    <button type="submit" name="cari">Search/Refresh</button>
  </div>
  </form>

  
  <div class="right-zone">
    <div class="notification">
      <i class="fa fa-bell" aria-hidden="true"></i>
    </div>
    <div class="user-avatar">
      <a href="../login/ubah_data.php?username=<?php echo $_SESSION['username'];?>"><img src="../img/user.png" alt="" class="user-img"></a>
    </div>
    <div class="switch" style="margin-left:20px;">
        <label class="switch">
          <input type="checkbox" style="width:40px;">
          <span class="slider" onclick="myFunction()"></span>
        </label>
    </div>
  </div>
</header>
<nav id="side-nav">
  <div class="nav-list print">
    <ul>
      <li><a href="../dashboard.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i><span>HOME</span></a></li>
      <li class="dropdown"><a href="#" class="nav-link"><i class="fa fa-question-circle" aria-hidden="true"></i><span class="dropbtn">List Table</span></a>
        <div class="dropdown-content">
        <?php
          if(@$_SESSION['leveluser'] == 'admin'){
          ?>
        <a href="viewobat.php">Tabel Obat</a>
        <a href="viewsupplier.php">Tabel Supplier</a>
        <a href="viewkaryawan.php">Tabel Karyawan</a>
        <?php
          } else {

          }
        ?>
        <a href="viewpelanggan.php">Tabel Pelanggan</a>
        <a href="viewtransaksi.php">Tabel Transaksi</a>
        <a href="viewdetail_transaksi.php">Tabel Detail Transaksi</a>
        </div>    
      </li>
      <li><a href="../login/registration.php" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i><span>NEW ACC</span></a></li>
      <li><a href="../login/logout.php" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i><span>LOGOUT</span></a></li>
    </ul>
  </div>
</nav>
<!-- partial -->
  <script  src="../Sidebar/script.js"></script>
<!-- Akhir Sidebar -->

  <div class="row">
  <div class="column">
  <table cellspacing = "0" cellpadding = "10" class="viewtabel">
        <thead>
            <tr class="headview">
                <th>ID Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
            </tr>
            <div class="d-flex justify-content-around">
            <div class="form-floating col-1">
            <a href="" class="printbutt print" onclick="window.print()"><i class="fa-sharp fa-solid fa-print"></i></a>
            <a href="../tambah/insertkaryawan.php" class="plusbutt print"><i class="fa-solid fa-square-plus"></i></a>
            </div>
            </div>
            <br>
        </thead>
        <tbody>
            <?php
            $hasil = mysqli_query($koneksi, $query);
            while($row = mysqli_fetch_assoc($hasil)){
            ?>
            <tr>
                <td>
                  <div class="tampilan">     
                <?php echo $row ['idkaryawan']?>
            </div>
              </td>
                <td>
                  <div class="tampilan">     
                <?php echo $row ['namakaryawan']?>
            </div>
              </td>
                <td>
                  <div class="tampilan">     
                <?php echo $row ['alamat']?>
            </div>
              </td>
                <td>
                <div style="float:left; width:150px;">
                <?php echo $row ['telp']?>
                </div>
                  <div style="float:right;">
                  <a class="trashbutt" href="../delete/deletekaryawan.php?idkaryawan=<?php echo $row['idkaryawan'];?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')"><i class="fa-sharp fa-solid fa-trash print"></i></a>
                  <a class="viewbutt" href="../update/updatekaryawan.php?idkaryawan=<?php echo $row['idkaryawan'];?>?>"><i class="fa-solid fa-pen-to-square print"></i></a>
                  </div>
              </td> 
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
  </div>

  <?php
  
  ?>
  <script>
    function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
    }
  </script>

</body>
</html>


<?php
}
?>