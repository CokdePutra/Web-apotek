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
    <title>Insert obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="insert.css">
</head>
<body><br><br><br>
<table>
<form action="proses_insert_obat.php" method="post">
    <br>
    <center>
    <h2>Masukan Data Obat</h2>
    </center>
    <br>
    
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
            <input type="text" class="form-control" id="floatingInput" required name="namaobat">
            <label for="floatingInput">Nama Obat</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="kategoriobat">
            <label for="floatingInput">Kategori Obat</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" required name="hargajual">
            <label for="floatingInput">Harga Jual</label>
        </div>
        <div class="form-floating col-2">
            <input type="text" class="form-control" id="floatingInput" required name="hargabeli">
            <label for="floatingInput">Harga Beli</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <input type="text" class="form-control" id="floatingInput" required name="stok_obat">
            <label for="floatingInput">Stok Obat</label>
        </div>
        <div class="form-floating col-12">
            </div>
            <br>
        <div class="form-floating col-4">
            <textarea name="keterangan" id="" cols="64" rows="10" placeholder="Keterangan"></textarea>
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
        <div class="form-floating col-11">
            <a href="../view/viewobat.php"><button type="button" class="btn btn-info">BACK</button></a>
        </div>
    </div>
<br>

    </form>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>