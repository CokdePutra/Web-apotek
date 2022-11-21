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
  <title>Tabel Transaksi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="../Sidebar/style.css">
  <link rel="stylesheet" href="../dashboard.css">

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
        // $query = "SELECT * FROM tb_pelanggan INNER JOIN tb_transaksi ON tb_pelanggan.idpelanggan = tb_transaksi.idpelanggan INNER JOIN tb_transaksi ON tb_karyawan.idkaryawan = tb_transaksi.idkaryawan ";
        $query = "SELECT * FROM tb_transaksi INNER JOIN tb_pelanggan USING(idpelanggan) INNER JOIN tb_karyawan USING(idkaryawan)";
        $keyword = $_POST['keyword'];
        // var_dump($keyword);
        if(isset($_POST["cari"])){
            $query = "SELECT * FROM tb_pelanggan INNER JOIN tb_transaksi USING(idpelanggan) INNER JOIN tb_karyawan USING(idkaryawan) WHERE idtransaksi like '%$keyword%' or
                                                       namalengkap like '%$keyword%' or
                                                       namakaryawan like '%$keyword%' or
                                                       tgltransaksi like '%$keyword%' or
                                                       kategoripelanggan like '%$keyword%'";
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
  <table border = "2" cellspacing = "0" cellpadding = "10">
        <thead>
        <tr>
                <th>ID Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Transaksi</th>
                <th>Kategori Pelanggan</th>
                <th>Total Bayar</th>
                <th>Bayar</th>
                <th>Kembalian</th>
                <th class="print"></th>
                    <?php
                    if(@$_SESSION['leveluser'] == 'admin' || 'karyawan'){
                    ?>
                <th class="print"><a href="../tambah/inserttransaksi.php"><button type="submit" class="btn btn-success">INSERT</button></a></th>
                    <?php
                    }else{
                        
                    }
                    ?>
            </tr>
            <div class="d-flex justify-content-around">
            <div class="form-floating col-1">
            <a href=""><button type="submit" class="btn btn-secondary print" onclick="window.print()">PRINT</button></a>
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
                <td><?php echo $row ['idtransaksi']?></td>
                <td><?php echo $row ['namalengkap']?></td>
                <td><?php echo $row ['namakaryawan']?></td>
                <td><?php echo $row ['tgltransaksi']?></td>
                <td><?php echo $row ['kategoripelanggan']?></td>
                <td><?php echo number_format($row['totalbayar'],0,',','.');?></td>
                <td><?php echo number_format($row['bayar'],0,',','.');?></td>
                <td><?php echo number_format($row['kembali'],0,',','.');?></td>
                    <?php
                    if(@$_SESSION['leveluser'] == 'admin' || 'karyawan'){
                    ?>
                <td class="print">
                    <?php
                    $id = $row['idtransaksi'];
                    $querydelete = "SELECT idtransaksi FROM tb_detail_transaksi INNER JOIN tb_transaksi USING(idtransaksi)
                    WHERE idtransaksi='$id'";
                    $hasildelete = mysqli_query($koneksi,$querydelete);
                    $cek = mysqli_num_rows($hasildelete);
                    if($cek == 0){
                    ?>
                    <a href="../delete/deletetransaksi.php?idtransaksi=<?php echo $row['idtransaksi'];?>"><button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus data ini ?')">DELETE</button></a>
                    <!-- diatas ni sebenernya ga guna yaa ingetttt
                         diatas tu cuma codingan pas data belum didelete di detail transaksi -->
                    <?php
                    }else{
                    ?>
                        <a href="../delete/deletetransaksi.php?idtransaksi=<?php echo $row['idtransaksi'];?>"><button type="submit" class="btn-btn-light" onclick="return confirm('Anda yakin mau menghapus data ini ?')">DELETE</button></a>
                        <!-- ingetttt codingan delete yang asli cuma 1 barisss -->
                    <?php
                    }
                    ?>
                </td>
                <td class="print"><a href="../tambah/insertdetail_transaksi.php?idtransaksi=<?php echo $row['idtransaksi'];?>"><button type="submit" class="btn btn-primary">Lihat Detail Transaksi</button></a></td>
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
