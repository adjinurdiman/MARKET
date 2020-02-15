<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["login"])) {
	echo "<script>
				alert('Gagal Masuk');
				document.location.href='index.php';
				</script>";
				exit();
}

?>
<html>
<title>M4RKET</title>
<link rel="shortcut icon" href="favicon.ico">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head><style type="text/css">
	.utama2
	{
		margin-top: 10px;
		width: 100%;
	}
	body
	{
		background-color: #ddd;
	}
	.user
	{
		font-size: 120px;
	}
	.gambar{
		
		border-radius: 50%;
		height: 150px;
		width: 150px;
	}

	.table1{
		text-align: center;
		margin-top: 30px;
		width: 100%;
		height: 600px;
		background-color: white;
		border: 1px solid gray;
		border-radius: 5px;
		padding: 10px;
	}
	.table2{
		width: 100%;
		height: 600px;
		border: 1px solid gray;
		background-color: white;
		margin-top: 30px;
		border-radius: 5px;
		padding: 10px;
	}
	label{
		margin-top: 10px;
	}
	.bawahan{
		margin-top: 20px;	
		margin-left: 40%;
	}
	.bawahan1{
		margin-top: 20px;
	}
</style>
<?php 
require 'function.php';
require 'koneksi.php';
$id = $_SESSION['login'];
$profile = query("SELECT * FROM data_user WHERE id_user = $id");
if(isset($_POST['Simpan']))
{
	if(ubah($_POST)>0)
	{
		echo "<script>
				alert('Data Berhasil Diubah!');
				document.location.href='m4rket.php?id=".$id."';
			 </script>";
	}
}
?>
	<title>Profile</title>
</head>
<body><script src="https://kit.fontawesome.com/6562c2a9ad.js">
		</script>

		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<form method="post" action="" enctype="multipart/form-data">
					<div class="table2">
						<label><h1 style="font-size: 50px;text-align: left;">Profil Saya</h1></label>
						<hr>
				<div class="from-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Ganti Nama Lengkap" class="form-control" autocomplete="off" autofocus="on" value="<?= @$profile[0]['nama']?>">
				</div>
				<div class="from-group">
					<label>Nama Lapak</label>
					<input type="text" name="pelapak" placeholder="Ganti Nama Lapak" class="form-control" autocomplete="off" value="<?= @$profile[0]['nama_pelapak']?>">
				</div>
				<div class="from-group">
					<label>Username</label>
					<input type="text" name="username" placeholder="Ganti Username" class="form-control" minlength="8" autocomplete="off" value="<?= @$profile[0]['username']?>">
				</div>
				<div class="from-group">
					<label>No Whatsapp</label>
					<input type="text" name="wa" class="form-control" minlength="8" autocomplete="off" value="<?= @$profile[0]['no_telepon']?>">
				</div>
				<div class="form-group">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-success bawahan">
					<a class="btn btn-danger bawahan1" href="m4rket.php">Batal</a>
				</div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="table1">
						<label><h1 style="font-size: 40px;">Foto Profil</h1></label>
						<?php if (isset($profile[0]['profile'])) : ?> 
						<img class="img-fluid gambar" src="Profile\<?= $profile[0]['profile'] ?>" >
					<?php else: ?>
						<i class="fas fa-user-circle"></i>
				<?php endif; ?>					
				<input type="file" name="gambar" accept="image/*" class="utama2">
					</div>
				</div>
			</div>
		</div>
</body>
</html>