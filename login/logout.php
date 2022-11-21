<?php
session_start();
session_destroy();

echo "<script>alert('berhasil logout');location.href='login.php'</script>";