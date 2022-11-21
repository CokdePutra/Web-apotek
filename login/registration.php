<?php
include('../koneksi.php');

session_start();
if(!isset($_SESSION['username'])){
    echo"<script>alert('anda belum login');location.href='login.php'</script>";
}
elseif(@$_SESSION['leveluser'] == 'karyawan'){
    echo"<script>alert('Maaf tidak bisa mengakses karena Anda adalah Karyawan');location.href='../dashboard.php'</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<form action="proses_registration.php" method="post">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Make An Account
					</span>

					<div class="" data-validate="">
						<select name="idkaryawan">
							<?php
							$querykaryawan = "SELECT * FROM tb_karyawan WHERE idkaryawan NOT IN (SELECT idkaryawan FROM tb_login)";
							$hasilkaryawan = mysqli_query($koneksi, $querykaryawan);
							$cek = mysqli_num_rows($hasilkaryawan);
							if ($cek > 0){
							while ($row = mysqli_fetch_assoc($hasilkaryawan)){
								
							?>
								<option value="<?php echo $row['idkaryawan'];?>"><?php echo $row['namakaryawan'];?></option>
								<?php
								}
							} else {

								?>
								<option value="">Semua karyawan sudah registrasi</option>
								<?php
																	
								}
							
								?>
						</select>
					</div>
							<br>
					<div class="" data-validate="">
						<select id="inputState" class="form-select" name="leveluser">
							<option>karyawan</option>
							<option>admin</option>
						</select>
					</div>
							<br>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" required name="username" autocomplete="off">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" required name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Create
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							<a href="../dashboard.php">Back To Dashboard</a>
						</span>

						<a class="txt2" href="#">
							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</form>
</body>
</html>