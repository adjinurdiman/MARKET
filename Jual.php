<?php 
session_start();
require 'function.php';
	if (!isset($_SESSION["login"])) {
		echo "<script>
					alert('Gagal Masuk');
					document.location.href='index.php';
					</script>";
					exit();
	}
$id = $_SESSION['login'];
$sql = "SELECT profile,nama FROM data_user WHERE id_user = $id";
$result = query($sql);
if(isset($_POST['Jual']))
{
	if(tambahbrg($_POST,$id)>0)
	{
		echo "Data berhasil ditambahkan ";
		header("Location: m4rket.php");
	}
}

?>

<html>
<head>
	<link rel="shortcut icon" href="favicon.ico">
	<title>M4RKET</title>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="FontAwosome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Allcss.css">
	<style type="text/css">
		body{
			background-color: #ddd;
		}
		header{
			width: 100%;
			height: 50px;
			background: blue;
			font-size: 40px;
		}
		hr{
			border: 0.5px solid black;
			margin: auto;
		}
		
		a{
			text-decoration: none;
			color: black;
		}
		h1{
			text-align: center;
			font-size: 40px;
			font-family: sans-serif;
			margin-top: 30px;
		}
		.beda{
			width: 30px;
			height: 35px;
			margin-left: 25px;
			margin-right: -7px;
			background-color: white;
			border-right: transparent;
			border: 2px solid black;
			padding-left: 1px;
			padding-right: 1px;
		}
		.utama5{
			background-color: white;
			padding-left: 45px;
		}
		.utama6{
			margin-top: -10px;
			margin-left: 15px;
			width: 390px;
			background-color: white;
		}
		.garis{
			color: gray;
			position: absolute;
			width: 850px;
			margin-left: -4px;
			height: 1px;
			background-color: gray;
		}
		.kategori2{
				font-size: 20px;
				font-family: sans-serif;	
				padding-left: 15px;
				margin-top: 10px;
		}
		.pajangan{
			position: absolute;
			margin-top: -33px;
			font-family: sans-serif;
			font-size: 18px;
			margin-left: 11px;
			color: black;
		}
		.pajangan1{
			position: absolute;
			width: 2px;
			height: 25px;
			background-color: #ddd;
			margin-top: -32px;
			margin-left: 40px;
		}
		.pajangan2{
			position: absolute;
			margin-top: 10px;
			font-family: sans-serif;
			font-size: 18px;
			margin-left: 20px;
		}
		.bulat{
			font-size: 80px;
			margin-left: 15px;
			margin-top: -10px;
		}
		.utama7{
			margin: auto;
			width: 82.5%;
			display: block;
			padding-left: 5px;
			margin-left: 120px;
			margin-top: -65px;
		}
		.kategori1{
			font-size: 13px;
			font-family: sans-serif;	
			padding-left: 15px;
			margin-top: 10px;
		}
		.utama8{
			position: relative;
			width: 390px;
			height: 40px;
			background-color: white;
			margin: auto;
			display: block;
			padding-left: 5px;
			border: 1px solid black;
			margin-left: 15px;
			margin-top: -10px;
		}
		.mancing{
			height: 120px;
		}
		.iklan{
			margin-top: 120px;
		}
		[type=text]{
			font-size: 18px;
			outline: none;
		}
		[type=number]{
			font-size: 18px;
			outline: none;
		}
		.box{
			padding-left: 35px;
			word-spacing: 2px;
			height: 30px;
			font-size: 13px;
		}
		label{
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="atas" style="margin-top: -32px;">
      <tr>
        <td><a href="ContactUs.php" class="atas1"> Contact Us</a></td>
        <td><a href="AboutUs.php" class="atas2">About Us</a></td>
        <td><a href="Jual.php" class="atas3">Jual</a></td>
      </tr>
    </div>
  <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-#2e2eb8">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a href="m4rket.php" class="logo" style="margin-left: 32px;margin-top: 5px;"><img src="Gambar/logo market pth.jpg" class="logo"></a>
      </li>
      <li>
      	<form class="form-inline my-2 my-lg-0">
      		<i class="fas fa-search"></i>
      <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search" style="width: 710px;height: 30px;outline: none;margin-left: 50px;margin-top: 8px;padding-left: 30px;">
      <button class="find" type="submit" style="height: 30px;margin-left: -14px;background-color: #2e2eb8;border: 2px solid #fff;border-radius: 6px;margin-top: 8px;font-size: 15px;padding-bottom: 10px;">Search</button>
    </form>

    <div class="dropdown1">
    <div class="dropbtn1">Kategori 
      <i class="fa fa-caret-down"></i>
    </div>
    <div class="dropdown1-content1">
      <a href="beli.php?kt=perlengkapan_Sekolah">Perlengkapan Sekolah</a>
      <a href="beli.php?kt=gadget">Gadget</a>
      <a href="beli.php?kt=aksesoris">Aksesoris</a>
      <a href="beli.php?kt=makanan_minuman">Makanan/Minuman</a>
      <a href="beli.php?kt=lain-lain">Lain-lain</a>
    </div>
  </div> 
  <li style="margin-top: 7px;">
  	<a href="" style="margin-left: 15px;font-size: 27px;"><i class="far fa-bell"></i></a>
  </li>
  <li style="margin-top: 7px;">
  	<a href="" style="margin-left: 15px;font-size: 27px;"><i class="fas fa-shopping-basket"></i></a>
  </li>
      </li>
      <li class="nav-item justify-content-end" style="float: right;margin-left: 28px;margin-top: 6px;">
        <div class="dropdown" style="">
  <div class="dropbtn"><p class="namanya"><?=$result[0]['nama'] ?></p><?php if (isset($result[0]['profile'])) : ?> 
            <img class="profile" src="Profile\<?= $result[0]['profile'] ?>" >
          <?php else: ?>
            <i class="fas fa-user-circle">Diazs</i>
        <?php endif; ?>
      </div>
  <div class="dropdown-content">
    <a href="Profile.php">Edit</a>
    <a href="logout.php">Logout</a>
  </div>
 </div>
      </li>
    </ul>
  </div>
</nav>



	<h1>Pasang Iklan Anda</h1>
	<div class="container lg">
		<div class="row-sm-10">
			<div class="col-sm-9 iklanjual">
				<form method="post" action="" enctype="multipart/form-data" class="">
					<div class="form-group">
						<label>Kategori Barang</label>
						<select class="form-control" id="exampleFormControlSelect1">
							    <option value="perlengkapan_sekolah">Perlengkapan Sekolah</option>
								<option value="gadget">Gadget</option>
								<option value="aksesoris">Aksesoris</option>
								<option value="makanan_minuman">Makanan/Minuman</option>
								<option value="lain-lain">Lain-lain</option>
					    </select>
					</div>
					<div class="form-group"><hr>
						<label>Lengkapi Data Barang</label>
						<input type="text" name="nama_barang" placeholder="Nama Barang" class="jarakjual form-control" autocomplete="off" required="">
						<input type="number" name="stok_barang" class="jarakjual form-control" placeholder="Stok Barang" autocomplete="off" required="">
						<textarea rows="7" placeholder="Deskripsi Barang" class="jarakjual form-control" autocomplete="off" style="resize: none;" name="deskripsi" required=""></textarea>
					</div>
					<div class="form-group"><hr>
						<label>Tentukan Harga</label>
					<input type="number" name="harga_barang" placeholder="harga barang" autocomplete="off" required="" class="utama5 form-control"><p class="pajangan">Rp</p><p class="pajangan1"></p>
					</div>
					<div class="form-group"><hr>
						<label>Foto Barang</label>
						<input type="file" name="gambar" accept="image/*" class="form-control-file" required="">
					</div>
					<div class="form-group"><hr>
						<label>Cek Profil Anda</label>
					<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control jarakjual" autocomplete="off"  value="<?= @$profile[0]['nama']?>">
					<p class="kategori1">Periksa nomor hp anda agar tidak terjadi hal yang tidak diingankan</p>
					<input type="text" name="wa" placeholder="No. Whatsapp"  autocomplete="off" maxlength="14" class="form-control">
					</div><hr>	
					<div class="btnjual">
						<input type="submit" name="Jual" value="Jual" class="btn btn-success">
						<a href="m4rket.php" class="btn btn-danger">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div><br>	
	

		<footer>
				<h3 align="center">Contact Us</h3>
				<h1 class="kontak" style="text-align: center;"><a href="https://www.instagram.com/m4rket_/?hl=id"><i class="fab fa-instagram"></i></a>
									<a href="http://line.me/ti/p/~@262wsqjs"><i class="fab fa-line"></i></a>
									<a href="https://twitter.com/m4rketbdg"><i class="fab fa-twitter"></i></a> 
									<a href=""><i class="fab fa-facebook-square"></i></a></h1>
				<h6 align="center" style="margin-top: 0px;">Copyright © 2019-2020 M4RKET. All rights reserved.</h6>
		</footer>
</body>
</html>
