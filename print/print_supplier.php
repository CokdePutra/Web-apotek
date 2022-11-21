<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
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
    <title>Daftar Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../view.css">
</head>


<body>
<br>
    <center>
    <h2>Daftar Supplier</h2>
    <table class="table-bordered" border = "2" cellspacing = "0" cellpadding = "10">
        <br>
        <thead>
            <tr>
                <th>ID Supplier</th>
                <th>Perusahaan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include('../koneksi.php');
            $query = "SELECT * FROM tb_supplier";
            $hasil = mysqli_query($koneksi, $query);
            while($row = mysqli_fetch_assoc($hasil)){
            ?>
            <tr>
                <td><?php echo $row ['idsupplier']?></td>
                <td><?php echo $row ['perusahaan']?></td>
                <td><?php echo $row ['keterangan']?></td>
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

<?php
}
?>