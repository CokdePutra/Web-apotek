<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}
elseif(@$_SESSION['leveluser'] == 'karyawan'){
    echo"<script>alert('Maaf tidak bisa mengakses karena Anda adalah Karyawan');location.href='../dashboard.php'</script>";
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
        margin-top: 36px;
    }
</style>
</head>
<body><br><br><br>
<table>
<form action="proses_insert_transaksi2.php" method="post">
<br>
<center>
    <h2>Masukan Data Transaksi</h2>
    </center>
    <br>
    <div class="row justify-content-center">
        <div class="form-floating col-4">
            <label for="inputState" class="form-label"></label>
            <select id="inputState" class="form-select" name="idpelanggan">
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
            <select id="inputState" class="form-select" name="idkaryawan">
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
            <input type="date" class="form-control" id="floatingInput" required name="tgltransaksi">
            <label for="floatingInput">Tanggal Transaksi</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="kategoripelanggan">
            <label for="floatingInput">Kategori Pelanggan</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" required name="totalbayar">
            <label for="floatingInput">Total Bayar</label>
        </div>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" required name="bayar">
            <label for="floatingInput">Bayar</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="kembali">
            <label for="floatingInput">Kembalian</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-1">
            <button type="submit" class="btn btn-success">INSERT</button>
        </div>
        <div class="form-floating col-12">
            </div>
        <div class="form-floating col-11 back">
            <a href="../view/viewtransaksi.php"><button type="button" class="btn btn-info">BACK</button></a>
        </div>
    </div>
    </form>
    </table>
</body>
</html>

<?php
}
?>