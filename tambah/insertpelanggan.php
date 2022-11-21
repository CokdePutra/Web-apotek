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
    <title>Insert Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="insert.css">
</head>
<body><br><br><br>
<table>
<form action="proses_insert_pelanggan.php" method="post" enctype="multipart/form-data">
<br>
<center>
    <h2>Masukan Data Pelanggan</h2>
    </center>
    <br>
    <div class="row justify-content-center">
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="namalengkap">
            <label for="floatingInput">Nama Lengkap</label>
        </div>
            <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="alamat">
            <label for="floatingInput">Alamat</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-3">
            <input type="text" class="form-control" id="floatingInput" required name="telp">
            <label for="floatingInput">Nomor Telepon</label>
        </div>
        <div class="form-floating col-1">
            <input type="text" class="form-control" id="floatingInput" required name="usia">
            <label for="floatingInput">Usia</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="col-4">
            <label for="exampleFormControlInput1" class="form-label">Bukti Foto Resep:</label>
            <input type="file" class="form-control" cols="2" id="exampleFormControlInput1" placeholder="Masukan Gambar.." name="buktifotoresep">
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-1">
            <input type="submit" class="btn btn-success" value="INSERT">
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
        <div class="form-floating col-11">
            <a href="../view/viewpelanggan.php"><button type="button" class="btn btn-info">BACK</button></a>
        </div>
    </div>
    </form>
    </table>
</body>
</html>

<?php
}
?>