<?php
session_start();
include ('../koneksi.php');
if(@$_POST['simpan']){
        
    $namapelanggan = $_POST['namapelanggan'];
    $queryidpelang = mysqli_query($koneksi, "SELECT idpelanggan FROM tb_pelanggan WHERE namalengkap = '$namapelanggan'");
    $barispelang = mysqli_fetch_assoc($queryidpelang);

    $idpelanggan = $barispelang['idpelanggan'];
    $idkaryawan = $_SESSION['idkaryawan'];
    $tgltransaksi = date('Y-m-d');
    $kategoripelanggan ='langganan';

    $query_insert = mysqli_query($koneksi,  "INSERT INTO tb_transaksi VALUES ('','$idpelanggan','$idkaryawan','$tgltransaksi','$kategoripelanggan','0','0','0')");

    $querytransaksi = mysqli_query($koneksi, "SELECT LAST_INSERT_ID()");
    $hasilidtransaksi = mysqli_fetch_row($querytransaksi);
    $_SESSION['idtransaksi'] = $hasilidtransaksi['0'];

    if(!$hasilidtransaksi){
        die("Gagal memasukan data obat " . mysqli_error($koneksi));
    } else {
        echo "<script>window.location='../tambah/insertdetail_transaksi.php'</script>";
    }

} 
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
  
else{


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="insert.css">

    <style>
    .back{
        margin-top: 250px;
    }

    .kpelanggan{
    }
</style>

</head>
<body><br><br><br>
<br>
<center>
    <h2>Masukan Data Transaksi</h2>
    </center>
    <br>
<table>
    <form method="post" action="">
<div class="row justify-content-center">
    <div class="form-floating col-2 kpelanggan">
        <select class="form-select" name="kategoripelanggan" id="inputstate">
            <option value="langganan">Langganan</option>
            <option value="umum">Umum</option>
        </select>
    </div>
    <div class="form-floating col-2">
    <button type="submit" class="btn btn-success">Next</button>
    </div>
</div>
    </form>
    <?php
    if(@$_POST['kategoripelanggan']=='langganan'){
    ?>
<form method="POST" action="">

    <div class="row justify-content-center">
    <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input list="list_pelanggan" name="namapelanggan" autocomplete="off" class="form-control" type="text">
            <label for="inputState" class="form-label">Nama Pelanggan</label>
            <datalist id="list_pelanggan">
            <?php
            include ('../koneksi.php');
            $query = "SELECT namalengkap FROM tb_pelanggan";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>
                <option value="<?php echo $row['namalengkap']; ?>"></option>

            <?php
            }
            ?>
            </datalist>
        </div>

        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-1">
            <input type="submit" class="btn btn-success" name="simpan" value="SELANJUTNYA">
        </div>
        <div class="form-floating col-12">
            </div>
        <div class="form-floating col-11 back">
            <a href="../view/viewtransaksi.php"><button type="button" class="btn btn-info">BACK</button></a>
        </div>
    </div>
    </form>
    <?php
    } elseif(@$_POST['kategoripelanggan']=='umum'){
        $idpelanggan = '3005';
        $idkaryawan = $_SESSION['idkaryawan'];
        $tgltransaksi = date('Y-m-d');
        $kategoripelanggan ='umum';

        $query_insert = mysqli_query($koneksi,  "INSERT INTO tb_transaksi VALUES ('','$idpelanggan','$idkaryawan','$tgltransaksi','$kategoripelanggan','0','0','0')");

        $querytransaksi = mysqli_query($koneksi, "SELECT LAST_INSERT_ID()");
        $hasilidtransaksi = mysqli_fetch_row($querytransaksi);
        $_SESSION['idtransaksi'] = $hasilidtransaksi['0'];

        if (!$hasilidtransaksi){
            die("Gagal"). mysqli_error($koneksi);
        } else {
            echo "<script>window.location='insertdetail_transaksi.php';</script>";
        }
    }
    ?>
    </table>
</body>
</html>

<?php
}
?>