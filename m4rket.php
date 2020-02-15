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

?>

<html>
<head>
	<link rel="shortcut icon" href="favicon.ico">
	<title>M4RKET</title>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/fpopper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="FontAwosome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="Allcss.css">
	<style type="text/css">
		body{
			background-color: white;
		}
		marquee{
			font-family: PanicButton BB;
			font-size: 50px;
			color: white;
		}
		.link-button{
			text-decoration: blink;
			background-color: black;
			color: white;
			padding: 4px 90px 4px 90px;
			border: 3px solid #c2c2c2;
			border-radius: 2px
		}
		.hp{
			font-size: 10px;
		}
		/*form {
    		width:500px;
   		 	margin:50px auto;
		}
		.search {
    		padding:8px 15px;
    		background:rgba(50, 50, 50, 0.2);
    		border:0px solid #dbdbdb;
		}
		.button {
    		position:relative;
    		padding:6px 15px;
    		left:-8px;
    		border:2px solid #53bd84;
    		background-color:#53bd84;
    		color:#fafafa;
		}
		.button:hover  {
		    background-color:#fafafa;
		    color:#207cca;
		}*/
		b{
			font-size: 30px;
		}
		.slidershow{
			width: 1230px;
			height: 500px;
			overflow: hidden;
			margin-left: 50px;
			margin-top: 50px;
		}		
		.navigation{
			position: absolute;
			bottom: 65px;
			left: 50%;
			transform: translateX(-50%);
			display: flex;
			margin-bottom: -70px;
		}
		.bar{
			width: 15px;
			height: 15px;
			border: 2px solid #fff;
			margin: 6px;
			cursor: pointer;
			transition: 0.4s;
			border-radius: 50%;
		}
		.bar:hover{
			background: #fff;
		}
		
		input[name = "r"]{
			position: absolute;
			visibility: hidden;
		}
		.slides{
			width: 500%;
			height: 100%;
			display: flex;

		}
		.slide{
			width: 20%;
			transition: 0.6s;
		}
		.slide img{
			width: 100%;
			height: 100%;
		}
		#r1:checked ~ .s1{
			margin-left: 0;
		}
		#r2:checked ~ .s1{
			margin-left: -20%;
		}
		#r3:checked ~ .s1{
			margin-left: -40%;
		}
		#r4:checked ~ .s1{
			margin-left: -60%;
		}
		.produk{
			float: left;
			margin-top: -40px;
		}
		.judulbaru{
			font-size: 25px;
			margin-left: 20px;
		}
		.hiasan{
			background-color: blue;
			height: 80px;
		}
		</style>
	</head>
<?php 

$G = query("SELECT * FROM barang WHERE kategori_barang = 'gadget' AND stok_barang>0 ORDER BY tanggal_barang ASC LIMIT 0,5");
$PS = query("SELECT * FROM barang WHERE kategori_barang = 'perlengkapan_sekolah' AND stok_barang>0 ORDER BY tanggal_barang ASC LIMIT 0,5");
$A = query("SELECT * FROM barang WHERE kategori_barang = 'aksesoris' AND stok_barang>0 ORDER BY tanggal_barang ASC LIMIT 0,5");
$MM = query("SELECT * FROM barang WHERE kategori_barang = 'makanan_minuman' AND stok_barang>0 ORDER BY tanggal_barang ASC LIMIT 0,5");
$L = query("SELECT * FROM barang WHERE kategori_barang = 'lain-lain' AND stok_barang>0 ORDER BY tanggal_barang ASC LIMIT 0,5");



 ?>
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

	<div class="slidershow">
		<div class="slides">
			<input type="radio" name="r" id="r1" checked="checked">
			<input type="radio" name="r" id="r2" checked="checked">
			<input type="radio" name="r" id="r3" checked="checked">
			<input type="radio" name="r" id="r4" checked="checked">
			<div class="slide s1">
				<img src="Gambar/smk.jpg" alt="">
			</div>
			<div class="slide">
				<img src="Gambar/jadul.jpg" alt="">
			</div>
			<div class="slide">
				<img src="Gambar/depan.jpg" alt="">
			</div>
			<div class="slide">
				<img src="Gambar/10.jpg" alt="">
			</div>
		<div class="navigation">
			<label for="r4" class="bar"></label>
			<label for="r1" class="bar"></label>
			<label for="r2" class="bar"></label>
			<label for="r3" class="bar"></label>
		</div>
	</div>
	</div>

<br>
<br>
<br>
<br>
<div class="hiasan">
	<p style="font-size: 25px;margin-bottom: 20px;margin-left: 20px;">Terbaru Di Handphone</p>
 <?php if (!empty($G)): ?>
	<?php foreach ($G as $data): ?>

	<div class="row float-left">
	<div class="col">
	<div class="" align="center">
	<a href="deskripsi2.php?id_barang=<?= $data['id_barang']?>">
  <div class="col mb-4">
    <div class="card h-100 w-100 produk" style="padding-top: 10px;">
      <img src="img/<?=$data['gambar_barang'] ?>" class="gambar" style="width: fixed;height: 200px;border: transparent;">
      <div class="card-body card" style="border-radius: 0px;">
        <h6 class="card-title" align="center" class="hp"><?=$data['nama_barang'] ?></h6>
        <p class="card-text">Rp.<?=$data['harga_barang']  ?></p>
      </div>
    </div>
  </div>
</a>
</div>
</div>
</div>

<?php endforeach; ?>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<?php echo ""; ?>
<?php endif; ?>
<div class="hiasan">
	<p style="font-size: 25px;margin-bottom: 20px;margin-left: 20px;">Terbaru Di Peralatan Sekolah</p>
<?php if (!empty($PS)): ?>
	
 <?php foreach ($PS as $data): ?>

 	
 	<div class="row float-left">
	<div class="col">
	<div class="" align="center">
	<a href="deskripsi2.php?id_barang=<?= $data['id_barang']?>">
  <div class="col mb-4">
    <div class="card h-100 w-100 produk" style="padding-top: 10px;">
      <img src="img/<?=$data['gambar_barang'] ?>" class="gambar" style="width: fixed;height: 200px;border: transparent;">
      <div class="card-body card" style="border-radius: 0px;">
        <h6 class="card-title" align="center" class="hp"><?=$data['nama_barang'] ?></h6>
        <p class="card-text">Rp.<?=$data['harga_barang']  ?></p>
      </div>
    </div>
  </div>
</a>
</div>
</div>
</div>


<?php endforeach; ?>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<?php endif; ?>
<div class="hiasan">
	<p style="font-size: 25px;margin-bottom: 20px;margin-left: 20px;">Terbaru Di Aksesoris</p>
<?php if (!empty($A)): ?>
	
 <?php foreach ($A as $data): ?>

	<div class="row float-left">
	<div class="col">
	<div class="" align="center">
	<a href="deskripsi2.php?id_barang=<?= $data['id_barang']?>">
  <div class="col mb-4">
    <div class="card h-100 w-100 produk" style="padding-top: 10px;">
      <img src="img/<?=$data['gambar_barang'] ?>" class="gambar" style="width: fixed;height: 200px;border: transparent;">
      <div class="card-body card" style="border-radius: 0px;">
        <h6 class="card-title" align="center" class="hp"><?=$data['nama_barang'] ?></h6>
        <p class="card-text">Rp.<?=$data['harga_barang']  ?></p>
      </div>
    </div>
  </div>
</a>
</div>
</div>
</div>

<?php endforeach; ?>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<?php endif; ?>
<div class="hiasan">
	<p style="font-size: 25px;margin-bottom: 20px;margin-left: 20px;">Terbaru Di Makanan</p>
<?php if (!empty($MM)): ?>

 <?php foreach ($MM as $data): ?>

	<div class="row float-left">
	<div class="col">
	<div class="" align="center">
	<a href="deskripsi2.php?id_barang=<?= $data['id_barang']?>">
  <div class="col mb-4">
    <div class="card h-100 w-100 produk" style="padding-top: 10px;">
      <img src="img/<?=$data['gambar_barang'] ?>" class="gambar" style="width: fixed;height: 200px;border: transparent;">
      <div class="card-body card" style="border-radius: 0px;">
        <h6 class="card-title" align="center" class="hp"><?=$data['nama_barang'] ?></h6>
        <p class="card-text">Rp.<?=$data['harga_barang']  ?></p>
      </div>
    </div>
  </div>
</a>
</div>
</div>
</div>	

<?php endforeach; ?>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<?php endif; ?>
<div class="hiasan">
	<p style="font-size: 25px;margin-bottom: 20px;margin-left: 20px;">Terbaru Di Lain-lain</p>
<?php if (!empty($L)): ?>

 <?php foreach ($L as $data): ?>

	<div class="row float-left">
	<div class="col">
	<div class="" align="center">
	<a href="deskripsi2.php?id_barang=<?= $data['id_barang']?>">
  <div class="col mb-4">
    <div class="card h-100 w-100 produk" style="padding-top: 10px;">
      <img src="img/<?=$data['gambar_barang'] ?>" class="gambar" style="width: fixed;height: 200px;border: transparent;">
      <div class="card-body card" style="border-radius: 0px;">
        <h6 class="card-title" align="center" class="hp"><?=$data['nama_barang'] ?></h6>
        <p class="card-text">Rp.<?=$data['harga_barang']  ?></p>
      </div>
    </div>
  </div>
</a>
</div>
</div>
</div>

<?php endforeach; ?>
</div>
<?php endif; ?>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3 align="center">Contact Us</h3>
				<h1 class="kontak" style="text-align: center;"><a href="https://www.instagram.com/m4rket_/?hl=id"><i class="fab fa-instagram"></i></a>
									<a href="http://line.me/ti/p/~@262wsqjs"><i class="fab fa-line"></i></a>
									<a href="https://twitter.com/m4rketbdg"><i class="fab fa-twitter"></i></a> 
									<a href=""><i class="fab fa-facebook-square"></i></a></h1>
				<h6 align="center" style="margin-top: 20px;">Copyright © 2019-2020 M4RKET. All rights reserved.</h6>
			</div>
		</div>
	</div>
</footer>

</body>
</html>