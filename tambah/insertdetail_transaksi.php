<?php
session_start();
include('../koneksi.php');
if(@$_GET['idtransaksi']){
    $id = $_GET['idtransaksi'];
} else {
    $id = $_SESSION['idtransaksi'];
}


$query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE idtransaksi='$id'");
$row = mysqli_fetch_assoc($query);

$idpelanggan = $row['idpelanggan'];
$query_pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE idpelanggan='$idpelanggan'");
$row_pelanggan = mysqli_fetch_assoc($query_pelanggan);

$idkaryawan = $row['idkaryawan'];
$query_karyawan = mysqli_query($koneksi, "SELECT namakaryawan FROM tb_karyawan WHERE idkaryawan='$idkaryawan'");
$row_karyawan = mysqli_fetch_assoc($query_karyawan);

if(@$_POST['more']){
    $namaobat = $_POST['namaobat'];
    $queryidobat = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT idobat, hargajual FROM tb_obat WHERE namaobat='$namaobat'"));

    $idobat = $queryidobat['idobat'];
    $jumlah = $_POST['jumlah'];
    $hargsatuan = $queryidobat['hargajual'];
    $totalharga = $jumlah * $hargsatuan;

    $inserttransaksi = mysqli_query($koneksi, "INSERT INTO tb_detail_transaksi VALUES ('','$id','$idobat','$jumlah','$hargsatuan','$totalharga')");
}

if(@$_POST['tombolhapus']){
    $idhapusobat = $_POST['hapusobat'];
    $query = "DELETE FROM tb_detail_transaksi WHERE iddetailtransaksi ='$idhapusobat'";
    $hasil = mysqli_query($koneksi, $query);

}

if(!@$_SESSION['username']){
    echo"<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
}

else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="insert.css">
    <link rel="stylesheet" href="detailtr.css">
    <style>
        .buttondel {
            border-radius:20px;
        }
    </style>
</head>
<body><br><br><br>
<form action="" method="post">
<br>
<center>
    <h2>Masukan Data Detail Transaksi</h2>
    </center>
    <div class="pelanggans">
    <table class="mt-3" cellpadding="10">
            <tr>
                <td>Tanggal Transaksi</td>
                <td>:</td>
                <td><?= $row['tgltransaksi']; ?></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><?= $row_pelanggan['namalengkap']; ?></td>
            </tr>
            <tr>
                <td>Kategori Pelanggan</td>
                <td>:</td>
                <td><?= $row['kategoripelanggan']; ?></td>
            </tr>
            <tr>
                <td>Nama Karyawan</td>
                <td>:</td>
                <td><?= $row_karyawan['namakaryawan']; ?></td>
            </tr>
        </table>
        </div>

        <div class="container">
            <div class="row mt-5">
                <table class="table table-bordered border-dark">
                    <thead>
                        <th scope="col1">Nama Obat</th>
                        <th scope="col1">Jumlah</th>
                        <th scope="col1">Harga Satuan</th>
                        <th scope="col1">Total Harga</th>
                    </thead>
                    <tbody>
                        <?php
                        $hasildetail = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi WHERE idtransaksi='$id'");
                        while ($rowdetail = mysqli_fetch_assoc($hasildetail)){
                        ?>
                        <tr>
                            <td>
                                <?php
                                $rowidobat = $rowdetail['idobat'];
                                $nama_obat = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT namaobat FROM tb_obat WHERE idobat='$rowidobat'"));
                                echo $nama_obat['namaobat'];
                                ?>
                            </td>
                            <td><?= $rowdetail['jumlah'] ?></td>
                            <td><?= number_format($rowdetail['hargasatuan'],0,',','.')?></td>
                            <td>
                            <div style="float:left;">
                                <?= number_format($rowdetail['totalharga'],0,',','.')?>
                                </div>
                            <div style="float:right;">
                                <form action="" method="POST">
                                <input type="text" name="hapusobat" value="<?php echo $rowdetail['iddetailtransaksi'];?>" hidden>
                                <i><input type="submit" class="buttondel" onclick="return confirm('Anda yakin mau menghapus data ini ?')" name="tombolhapus" value="Hapus"></i>
                                </form>
                            </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>

                        <tr>
                            <td colspan="3"><b style="float:right;">Grand Total</b></td>
                            <td>
                                <b>
                                    <?php
                                    $grandtotal = mysqli_fetch_row(mysqli_query($koneksi, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi='$id'"));
                                    echo number_format($grandtotal[0],0,',','.');
                                    ?>
                                </b>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- Input total bayar -->
            <?php
            if(@$_POST['finish']){
            ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col"></div>
                    <div class="col4">
                        <input type="number" class="form-control mt3" name="bayar" required placeholder="Masukan Jumlah Bayar">
                        <input type="submit" class="btn btn-warning mt-3 mb-5" value="Simpan Transaksi" name="simpan_transaksi">
                    </div>
                    <div class="col"></div>
                </div>
            </form>

            <!-- Simpan transaksi terakhir dan tampilkan detail bayar -->
            <?php
            } elseif(@$_POST['simpan_transaksi']){
                $grandtotal = mysqli_fetch_row(mysqli_query($koneksi, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi='$id'"));
                $totalbayar = $grandtotal[0];
                $bayar = $_POST['bayar'];
                $kembali = $bayar - $totalbayar;

                mysqli_query($koneksi, "UPDATE tb_transaksi SET totalbayar='$totalbayar', bayar='$bayar', kembali='$kembali' WHERE idtransaksi='$id'");
                $transaksi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE idtransaksi='$id'"));
            ?>
            <table class="table table-bordered border-dark">
                <tr>
                    <td>Bayar</td>
                    <td><?= number_format($transaksi['bayar'],0,',','.'); ?></td>
                </tr>
                <tr>
                    <td>Total Bayar</td>
                    <td><?= number_format($totalbayar,0,',','.'); ?></td>
                </tr>
                <tr>
                    <td>Kembali</td>
                    <td><?= number_format($transaksi['kembali'],0,',','.'); ?></td>
                </tr>
            </table>
            <a href="../view/viewtransaksi.php"><input type="button" class="btn btn-warning mt-3" value="Lihat Semua Transaksi"></a>






            <!-- Input Obat -->
            <?php
            } else {
            ?>
            <div class="row">
                <div class="col">
                    <div class="col-4">
                        <form action="" method="POST">
                            <input list="list_obat" name="namaobat" class="form-control" autocomplete="off" onClick="this.select();" placeholder="Masukan Nama Obat">
                            <datalist id="list_obat">
                                <?php
                                $query = "SELECT * FROM tb_obat";
                                $hasil = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_assoc($hasil)){
                                ?>
                                <option value="<?= $row['namaobat']?>">
                                <?php
                                    }
                                ?>
                            </datalist>
                            <input type="number" class="form-control mt=3" value="1" onClick="this.select();" required name="jumlah" placeholder="Jumlah">
                            <input type="submit" class="btn btn-warning" value="Masukan Obat" name="more">
                            <input type="submit" class="btn btn-success" value="Selesai" name="finish">
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
                <?php
            }
                ?>
            </div>
        </div>
    <!-- <br>
        <tr>
            <td><label for="" hidden>ID Detail Transaksi</label></td>
            <td hidden >:</td>
            <td hidden > <input type="text" name="iddetailtransaksi"></td>
        </tr> -->

        <div class="form-floating col-12">
            </div>
        <div class="form-floating col-11 balik">
            <a href="../view/viewtransaksi.php"><button type="button" class="btn btn-info">BACK</button></a>
        </div>
    </div>
    </form>
</body>
</html>

<?php
}
?>