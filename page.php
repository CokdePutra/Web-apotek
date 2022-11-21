<?php

    switch ($_GET['page']){
        case "obat":
            include "view/viewobat.php";
            break;
        case "supplier":
            include "view/viewsupplier.php";
            break;
        case "karyawan":
            include "view/viewkaryawan.php";
            break;
        case "pelanggan":
            include "view/viewpelanggan.php";
            break;
        case "transaksi":
            include "view/viewtransaksi.php";
            break;
        case "detail-transaksi":
            include "view/viewdetail_transaksi.php";
            break;

    }

?>