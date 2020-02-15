<?php 
session_start();
require 'function.php';
include 'koneksi.php';
if(isset($_POST["login"])) {
	$username = $_POST["user"];
	$password = $_POST["pass"];
    $height = 300;
	$result = mysqli_query($conn, "SELECT * FROM data_user WHERE username = '$username'");
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password,$row["password"])) {
			$_SESSION["login"] = true;
			echo "<script>
				document.location.href='m4rket.php';
				</script>";
		}
	}
	$error = true;
}
?>
<?php if (isset($error)){
	$height = 400;
}

?>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
	.box{
	width: 400px;
	padding: 25px;
	position: absolute;
	top: 60%;
	left: 50%;
	transform: translate(-50%, -50%);
	background: #191919;
	text-align: center;
	border-radius: 15px;
	height: <?=$height ?> px;
	margin-top: -60px;
}

</style>
</head >
<body vlink="#2ecc71">
	<div class="animated-text">
		<div class="line">Selamat</div>
		<div class="line">Datang</div>
		<div class="line">di</div>
		<div class="line">M4rket</div>
	</div>
<body>

	<form class="box" action="" method="post">
		<h1>Login</h1>
		<input type="text" name="user" autofocus="on" placeholder="Username" required="required" autosave="on">
		<input type="password" name="pass" placeholder="Password" required="required" autosave="on">
		<input type="submit" name="login" value="Login">
		<?php 
		if(isset($error)) : ?>
			<p style="color: red; font-style: italic; " align="center">Username/Password Salah</p>
		 <?php endif; ?>
		<p>Belum punya akun? <a href="Register.php">Daftar</a></p>
		
	</form>

</body>
</html>