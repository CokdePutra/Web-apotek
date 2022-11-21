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
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../view.css">
</head>


<body>
<br>
    <center>
    <h2>Detail Transaksi</h2>
    <table class="table-bordered" border = "2" cellspacing = "0" cellpadding = "10">
        <thead>
            <tr>
                <th>ID Detail Transaksi</th>
                <th>ID Transaksi</th>
                <th>ID Obat</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include('../koneksi.php');
            $query = "SELECT * FROM tb_detail_transaksi";
            $hasil = mysqli_query($koneksi, $query);
            while($row = mysqli_fetch_assoc($hasil)){
            ?>
            <tr>
                <td><?php echo $row ['iddetailtransaksi']?></td>
                <td><?php echo $row ['idtransaksi']?></td>
                <td><?php echo $row ['idobat']?></td>
                <td><?php echo $row ['jumlah']?></td>
                <td><?php echo $row ['hargasatuan']?></td>
                <td><?php echo $row ['totalharga']?></td>
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
</body>

</html>