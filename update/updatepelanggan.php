<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');

$id = $_GET['idpelanggan'];

$query = "SELECT * From tb_pelanggan WHERE idpelanggan='$id'";

$hasil = mysqli_query($koneksi, $query);

while($data = mysqli_fetch_assoc($hasil)){
    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="update.css">
</head>
<body><br><br><br>
<table>
<form action="proses_update_pelanggan.php" method="post" enctype="multipart/form-data">
<br>
<center>
    <h2>Masukan Data Pelanggan</h2>
    </center>
    <br>
    <div class="row justify-content-center">
        <div class="form-floating col-0">
            <input hidden type="text" class="form-control" id="floatingInput" required name="idpelanggan" value="<?php echo $data['idpelanggan']; ?>">
            <label hidden for="floatingInput">ID Pelanggan</label>
        </div>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="namalengkap" value="<?php echo $data['namalengkap']; ?>">
            <label for="floatingInput">Nama Lengkap</label>
        </div>
            <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="alamat" value="<?php echo $data['alamat']; ?>">
            <label for="floatingInput">Alamat</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-3">
            <input type="text" class="form-control" id="floatingInput" required name="telp" value="<?php echo $data['telp']; ?>">
            <label for="floatingInput">Nomor Telepon</label>
        </div>
        <div class="form-floating col-1">
            <input type="text" class="form-control" id="floatingInput" required name="usia" value="<?php echo $data['usia']; ?>">
            <label for="floatingInput">Usia</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="col-4">
            <label for="exampleFormControlInput1" class="form-label">Bukti Foto Resep:</label>
            <img src="../pict/<?php echo $data['buktifotoresep']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
            <input type="file" class="form-control" cols="2" id="exampleFormControlInput1" placeholder="Masukan Gambar.." name="buktifotoresep">
            <i style="float: left; font-size: 11px; color: red;">Abaikan Jika Tidak Merubah Foto</i>
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
        <div class="form-floating col-11">
            <a href="../view/viewpelanggan.php"><button type="button" class="btn btn-info">BACK</button></a>
        </div>
    </div>
    </form>
    </table>
    <?php
}
    ?>
</body>
</html>