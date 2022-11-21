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
    <title>Daftar Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../view.css">
</head>


<body>
    <br>
    <center>
    <h2>Daftar Pelanggan</h2>
    <table class="table-bordered" border = "2" cellspacing = "0" cellpadding = "10">
        <thead>
            <tr>
                <th>ID Pelanggan</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Telpon</th>
                <th>Usia</th>
                <th>Bukti Foto Resep</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include('../koneksi.php');
            $query = "SELECT * FROM tb_pelanggan";
            $hasil = mysqli_query($koneksi, $query);
            while($row = mysqli_fetch_assoc($hasil)){
            ?>
            <tr>
                <td><?php echo $row ['idpelanggan'];?></td>
                <td><?php echo $row ['namalengkap'];?></td>
                <td><?php echo $row ['alamat'];?></td>
                <td><?php echo $row ['telp'];?></td>
                <td><?php echo $row ['usia'];?></td>
                <td style="text-align: center;"><img src="../pict/<?php echo $row ['buktifotoresep']; ?>" style="width: 120px;"></td>
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