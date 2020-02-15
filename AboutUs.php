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
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Allcss.css">
	<link rel="stylesheet" type="text/css" href="FontAwosome/css/all.min.css">
	<style type="text/css">
		body{
			background-image: url('Gambar/depan.jpg');
			background-attachment: fixed;
			background-size: 100% 100%;
		}
		.about{
			border: 4 solid ;
			margin: auto;
			height: 600px;
			width: 800px;
			background-color: rgba(173,173,173,0.7);
			background-size: contain;
			margin-top: 120px;
		}
		.bebas{
			border: 2px solid;
			border-radius: 100px;
			text-align: center;
			font-size: 25px;
		}
    .gmbr{
      width: 600px;
      height: 300px;
    }
	</style>
	<title>M4RKET</title>
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

<br><br><br><br>

	<div class="row row-cols-1 row-cols-md-3" style="margin:auto;" align="center">
  <div class="col-xl-3" style="padding-bottom:40px;">
    <div class="card h-10">
      <img src="Gambar/aji.jpg" class="card-img-top img-fluid gmbr" alt="...">
      <div class="card-body">
        <h5 class="card-title" align="center">Adji Nurdiman</h5>
        <p class="card-text">Web Programmer</p>
      </div>
    </div>
  </div>
  <div class="col-xl-3" style="padding-bottom:40px;">
    <div class="card h-10">
      <img src="Gambar/diazs.jpg" class="card-img-top img-fluid gmbr" alt="...">
      <div class="card-body">
        <h5 class="card-title" align="center">Diaszs Martiansyah</h5>
        <p class="card-text">Database Administrator</p>
      </div>
    </div>
  </div>
  <div class="col-xl-3" style="padding-bottom:40px;">
    <div class="card h-10">
      <img src="Gambar/rio.jpg" class="card-img-top img-fluid gmbr" alt="...">
      <div class="card-body">
        <h5 class="card-title" align="center">Lamdario Zidni I.S.</h5>
        <p class="card-text">Web Designer</p>
      </div>
    </div>
  </div>
  <div class="col-xl-3" style="padding-bottom: 40px;">
    <div class="card h-10">
      <img src="Gambar/hafidz.jpg" class="card-img-top img-fluid gmbr" alt="...">
      <div class="card-body">
        <h5 class="card-title" align="center">M.Hafidz Fadillah</h5>
        <p class="card-text">Web Administrator</p>
      </div>
    </div>
  </div>
  </div>
<div class="row row-cols-1 row-cols-md-4" style="margin: auto;" align="center">
  <div class="col-xl-3" style="padding-bottom: 40px;margin: auto;">
    <div class="card h-10">
      <img src="Gambar/valen.jpg" class="card-img-top img-fluid gmbr" alt="...">
      <div class="card-body">
        <h5 class="card-title" align="center">Valentio Aditama</h5>
        <p class="card-text">Web Programmer</p>
      </div>
    </div>
  </div>
  <div class="col-xl-3" style="padding-bottom: 40px;margin: auto;">
    <div class="card h-10">
      <img src="Gambar/yusuf.jpg" class="card-img-top img-fluid gmbr" alt="...">
      <div class="card-body">
        <h5 class="card-title" align="center">Yusuf Dwi Munif</h5>
        <p class="card-text">Web Designer</p>
      </div>
    </div>
  </div>
</div>

		<footer>
				<h3 align="center">Contact Us</h3>
				<h1 class="kontak" style="text-align: center;"><a href="https://www.instagram.com/m4rket_/?hl=id"><i class="fab fa-instagram"></i></a>
									<a href="http://line.me/ti/p/~@262wsqjs"><i class="fab fa-line"></i></a>
									<a href="https://twitter.com/m4rketbdg"><i class="fab fa-twitter"></i></a> 
									<a href=""><i class="fab fa-facebook-square"></i></a></h1>
        <h6 align="center" style="margin-top: 20px;">Copyright © 2019-2020 M4RKET. All rights reserved.</h6>
		</footer>
</body>
</html>