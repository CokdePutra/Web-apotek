<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity=                       "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Insert pelanggan</title>
</head>
<body>
        <p><center><b><font size="+2">INPUT TABEL PELANGGAN</font></b></center></p>
        <hr/>

    <center>

    <table>
    <form action="proses_insert_pelanggan.php" method="post">

        <tr>
            <td><label for="">Nama Lengkap</label></td>
            <td>:</td>
            <td> <input class="form-control" type="text" name="namalengkap"></td>
        </tr>

        <tr>
            <td><label for="">Alamat</label></td>
            <td>:</td>
            <td> <input class="form-control" type="text" name="alamat"></td>
        </tr>

        <tr>
            <td><label for="">Telpon</label></td>
            <td>:</td>
            <td> <input class="form-control" type="text" name="telp"></td>
        </tr>

        <tr>
            <td><label for="">Usia</label></td>
            <td>:</td>
            <td> <input class="form-control" type="text" name="usia"></td>
        </tr>

        <tr>
            <td><label for="">Bukti Foto Resep</label></td>
            <td>:</td>
            <td> <input type="file" placeholder="name@example.com" name="buktifotoresep"></td>
        </tr>
        <td>
            <td></td>
            <td><input type="submit" name="Simpan" value="Simpan" class="btn btn-success"></td>
        </td>

        <!--  <td>
            <td></td>
            <td><button class="btn btn-success">Simpan</button></td>
        </td> --> 
    </form>
    </table>
    </center>
</body>
</html>