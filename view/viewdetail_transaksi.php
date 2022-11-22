<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo"<script>alert('anda belum login');location.href='login/login.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Detail Transaksi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="../Sidebar/style.css">
  <link rel="stylesheet" href="../dashboard.css">
  <link rel="stylesheet" href="view.css">
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
        $query = "SELECT * FROM tb_obat INNER JOIN tb_detail_transaksi ON tb_obat.idobat = tb_detail_transaksi.idobat";
        $keyword = $_POST['keyword'];
        // var_dump($keyword);
        if(isset($_POST["cari"])){
            $query = "SELECT * FROM tb_obat INNER JOIN tb_detail_transaksi using(idobat) WHERE iddetailtransaksi like '%$keyword%' or
                                                    idtransaksi like '%$keyword%' or
                                                    namaobat like '%$keyword%'";
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
                <th>ID Detail Transaksi</th>
                <th>ID Transaksi</th>
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                    <?php
                    if(@$_SESSION['leveluser'] == 'admin'){

                    }else{
                        
                    }
                    ?>
            </tr>
            <div class="d-flex justify-content-around">
            <div class="form-floating col-1">
            <a href="" class="printbutt print" onclick="window.print()"><i class="fa-sharp fa-solid fa-print"></i></a>
            <a href="../tambah/inserttransaksi.php" class="plusbutt print"><i class="fa-solid fa-square-plus"></i></a>
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
                <?php echo $row ['iddetailtransaksi']?>
            </div>
              </td>
                <td>
                  <div class="tampilan">   
                <?php echo $row ['idtransaksi']?>
            </div>
              </td>
                <td>
                  <div class="tampilan">   
                <?php echo $row ['namaobat']?>
            </div>
              </td>
                <td>
                  <div class="tampilan">   
                <?php echo $row ['jumlah']?>
            </div>
              </td>
                <td>
                  <div class="tampilan">   
                <?php echo $row ['hargasatuan']?>
            </div>
              </td>
                <td>
                  <div style="float:left; width:150px;">
                  <?php echo $row ['totalharga']?>
                  </div>
                  <div style="float:right;">
                  <a class="trashbutt" href="../delete/deletedetail_transaksi.php?iddetailtransaksi=<?php echo $row['iddetailtransaksi'];?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')"><i class="fa-sharp fa-solid fa-trash print"></i></a>
                  <a class="viewbutt" href="../update/updatedetail_transaksi.php?iddetailtransaksi=<?php echo $row['iddetailtransaksi'];?>?>"><i class="fa-solid fa-pen-to-square"></i></a>
                  </div>
                </td>
                <?php
                if(@$_SESSION['leveluser'] == 'admin'){
                ?>
                <?php
                }else{
                    
                }
                ?>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
  </div>

</body>
</html>
