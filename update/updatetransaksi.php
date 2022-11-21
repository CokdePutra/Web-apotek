<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');

$id = $_GET['idtransaksi'];

$query = "SELECT * From tb_transaksi WHERE idtransaksi='$id'";

$hasil = mysqli_query($koneksi, $query);

while($data = mysqli_fetch_assoc($hasil)){
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="update.css">
</head>
<body><br><br><br>
<table>
<form action="proses_update_transaksi.php" method="post">
<br>
<center>
    <h2>Ubah Data Transaksi</h2>
    </center>
    <br>
    <div class="row justify-content-center">
        <div class="form-floating col-1">
            <input type="text" class="form-control" id="floatingInput" name="idtransaksi" required value="<?php echo $data['idtransaksi']; ?>">
            <label for="floatingInput">ID Transaksi</label>
        </div>
        <div class="form-floating col-3">
            <label for="inputState" class="form-label"></label>
            <select id="inputState" class="form-select" name="idpelanggan" required value="<?php echo $data['idpelanggan']; ?>">
            <?php
            include ('../koneksi.php');
            $query = "SELECT idpelanggan, namalengkap FROM tb_pelanggan";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>
                <option value="<?php echo $row['idpelanggan']; ?>"><?php echo $row['namalengkap']; ?></option>

            <?php
            }
            ?>
            </select>
        </div>



        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-2">
            <label for="inputState" class="form-label"></label>
            <select id="inputState" class="form-select" name="idkaryawan" required value="<?php echo $data['idkaryawan']; ?>">
            <?php
            $query = "SELECT idkaryawan, namakaryawan FROM tb_karyawan";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>
                <option value="<?php echo $row['idkaryawan']; ?>"><?php echo $row['namakaryawan']; ?></option>

            <?php
            }
            ?>
            </select>
        </div>
        <div class="form-floating col-2">
            <input type="date" class="form-control" id="floatingInput" name="tgltransaksi" required value="<?php echo $data['tgltransaksi']; ?>">
            <label for="floatingInput">Tanggal Transaksi</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" name="kategoripelanggan" required value="<?php echo $data['kategoripelanggan']; ?>">
            <label for="floatingInput">Kategori Pelanggan</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" name="totalbayar" required value="<?php echo $data['totalbayar']; ?>">
            <label for="floatingInput">Total Bayar</label>
        </div>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" name="bayar" required value="<?php echo $data['bayar']; ?>">
            <label for="floatingInput">Bayar</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" name="kembali" required value="<?php echo $data['kembali']; ?>">
            <label for="floatingInput">Kembalian</label>
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
        <div class="form-floating col-11">
            <a href="../view/viewtransaksi.php"><button type="button" class="btn btn-info">BACK</button></a>
        </div>
    </div>
    </form>
    </table>
    <?php
}
    ?>
</body>
</html>