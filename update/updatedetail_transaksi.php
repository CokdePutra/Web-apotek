<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');

$id = $_GET['iddetailtransaksi'];

$query = "SELECT * From tb_detail_transaksi WHERE iddetailtransaksi='$id'";

$hasil = mysqli_query($koneksi, $query);

while($data = mysqli_fetch_assoc($hasil)){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="update.css">
</head>
<body><br><br><br>
<table>
<form action="proses_update_detail_transaksi.php" method="post">
<br>
<center>
    <h2>Masukan Data Detail Transaksi</h2>
    </center>
    <br>
        <tr>
            <td><label for="" hidden>ID Detail Transaksi</label></td>
            <td hidden >:</td>
            <td hidden > <input type="text" name="iddetailtransaksi" value="<?php echo $data['iddetailtransaksi']; ?>"></td>
        </tr>
    <div class="row justify-content-center">
    <div class="form-floating col-4">
        <label for="inputState" class="form-label"></label>
            <select id="inputState" class="form-select" name="idtransaksi">
            <?php
            include ('../koneksi.php');
            $query = "SELECT idtransaksi FROM tb_transaksi";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>
                <option value="<?php echo $row['idtransaksi']; ?>"><?php echo $row['idtransaksi']; ?></option>

            <?php
            }
            ?>
            </select>
        </div>
            <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-3">
            <label for="floatingInput"></label>
            <select id="inputState" class="form-select" name="idobat">
            <?php
            $query = "SELECT idobat,namaobat FROM tb_obat";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>
                <option value="<?php echo $row['idobat']; ?>"><?php echo $row['namaobat']; ?></option>

            <?php
            }
            ?>
            </select>
        </div>
        <div class="form-floating col-1">
            <input type="text" class="form-control" id="floatingInput" required name="jumlah" value="<?php echo $data['jumlah']; ?>">
            <label for="floatingInput">Jumlah </label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" required name="hargasatuan" value="<?php echo $data['hargasatuan']; ?>">
            <label for="floatingInput">Harga Satuan </label>
        </div>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" required name="totalharga" value="<?php echo $data['totalharga']; ?>">
            <label for="floatingInput">Total Harga </label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-1">
        <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        <div class="form-floating col-11">
            <a href="../view/viewdetail_transaksi.php"><button type="button" class="btn btn-info">BACK</button></a>
        </div>
    </div>
    </form>
    </table>
</body>
</html>

<?php
}
?>