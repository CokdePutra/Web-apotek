<?php
session_start();
if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

include('../koneksi.php');

$id = $_GET['idobat'];

$query = "SELECT * From tb_obat WHERE idobat='$id'";

$hasil = mysqli_query($koneksi, $query);

while($data = mysqli_fetch_assoc($hasil)){
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="update.css">
</head>
<body><br><br><br>
<table>
<form action="proses_update_obat.php" method="post">
<br>
    <center>
    <h2>Ubah Data Obat</h2>
    </center>
    <br>
        <tr>
            <td><label hidden for="">ID Obat</label></td>
            <td hidden>:</td>
            <td> <input hidden type="text" name="idobat" required value="<?php echo $data['idobat']; ?>"></td>
        </tr>
    <div class="row justify-content-center">
        <div class="form-floating col-4">
        <label for="inputState" class="form-label"></label>
            <select id="inputState" class="form-select" name="idsupplier">
            <?php
            include ('../koneksi.php');
            $query = "SELECT idsupplier, perusahaan FROM tb_supplier";
            $hasil = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_assoc($hasil)){
            ?>
                <option value="<?php echo $row['idsupplier']; ?>"><?php echo $row['perusahaan']; ?></option>

            <?php
            }
            ?>
            </select>
        </div>

        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="namaobat" value="<?php echo $data['namaobat']; ?>">
            <label for="floatingInput">Nama Obat</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="kategoriobat" value="<?php echo $data['kategoriobat']; ?>">
            <label for="floatingInput">Kategori Obat</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" required name="hargajual" value="<?php echo $data['hargajual']; ?>">
            <label for="floatingInput">Harga Jual</label>
        </div>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" required name="hargabeli" value="<?php echo $data['hargabeli']; ?>">
            <label for="floatingInput">Harga Beli</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="stok_obat" value="<?php echo $data['stok_obat']; ?>">
            <label for="floatingInput">Stok Obat</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <textarea name="keterangan" id="" cols="64" rows="10" placeholder="Keterangan"><?php echo $data['keterangan']; ?></textarea>
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
        <div class="form-floating col-11">
            <a href="../view/viewobat.php"><button type="button" class="btn btn-info">BACK</button></a>
        </div>
    </div>
<br>
    </form>
    </table>
    <?php }?>
</body>
</html>