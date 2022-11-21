<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../view.css">
</head>


<body>
    <br>
    <center>
    <h2>Daftar Transaksi</h2>
    <table class="table-bordered" border = "2" cellspacing = "0" cellpadding = "10">
    <br>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>ID Kasir</th>
                <th>Tanggal Transaksi</th>
                <th>Kategori Pelanggan</th>
                <th>Total Bayar</th>
                <th>Bayar</th>
                <th>Kembalian</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include('../koneksi.php');
            $query = "SELECT * FROM tb_pelanggan INNER JOIN tb_transaksi ON tb_pelanggan.idpelanggan = tb_transaksi.idpelanggan";
            $hasil = mysqli_query($koneksi, $query);
            while($row = mysqli_fetch_assoc($hasil)){
            ?>
            <tr>
                <td><?php echo $row ['idtransaksi']?></td>
                <td><?php echo $row ['namalengkap']?></td>
                <td><?php echo $row ['idkasir']?></td>
                <td><?php echo $row ['tgltransaksi']?></td>
                <td><?php echo $row ['kategoripelanggan']?></td>
                <td><?php echo $row ['totalbayar']?></td>
                <td><?php echo $row ['bayar']?></td>
                <td><?php echo $row ['kembali']?></td>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

    <script>
    window.print();
    </script>

    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>