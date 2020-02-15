<?php 
include 'koneksi.php';
require 'function.php';

if(isset($_POST["submit"])){
	if(registrasi($_POST)>0){
		echo "<script>
				document.location.href='index.php';
				</script>
		";
	}
	else{
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="daftar2.css">
</head>

<body vlink="black">
	<center>
	<form method="post" action="" autocomplete="off" class="box">
	<h1>Daftar</h1>
	<input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required="required" autofocus="on" autocomplete="off">
		<input type="text" name="pelapak" placeholder="Nama Pelapak" required="required" autocomplete="off">
		<input type="text" name="wa" placeholder="No. Whatsapp" required="required" autocomplete="off" maxlength="14" minlength="11">
		<input type="text" name="user" placeholder="username" required="required" autocomplete="off">
		<input type="password" name="pass" placeholder="Password" required="required" autocomplete="off" minlength="8">
		<input type="password" name="pass2" placeholder="Konfimasi Password" required="required" autocomplete="off">
	<input type="submit" name="submit" value="Daftar">
		<p>Sudah punya akun? <a href="FormLogin.php">Login</a></p>
	</form>
</center>
</body>
</html>

