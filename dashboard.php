<?php

require 'function.php';

$barang = query("SELECT * FROM barang");
if (isset($_POST['cari-kategori'])) {
	$barang = crkategori($_POST['kategori_barang']);
}
if (isset($_POST["sorting"])) {
	$barang = asc($_POST["sort"],$_POST["kategori_barang"]);
}
if(isset($_POST["cari"])) {
	$barang =  caribrg($_POST["keyword"]);
	}

?>


<head>
	<title>M4RKET</title>
	<style type="text/css">
		.frm{
			position: relative;
			width: 100%;
		}
		body{
			background-image: url(smk.jpg);
			background-size: cover;
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
		nav {
    		height:60px;
    		background-color:black;
   	 		line-height:60px;
   			position:relative;
    		top:0px;
   			width: 101%;
    		margin:auto;
    		font-size: 20px;
    		margin-top: -20px;
    		margin-left: -8px;
		}
		nav ul{
    		list-style:none;
		}
		nav ul li a {
			margin-left: -40px;
    		float:left;
    		width:190px;
    		color:#fff;
    		text-decoration:none;
    		display:block;
    		text-align:left;
    		text-align: center;
		}
		nav ul li a:hover {
    		display: inline-block;
    		width: 190px;
    		color: #1a53ff;
		}
		nav ul li:hover .sub1 {
			display:block
		}
		nav ul .sub1 {
		    display:none;
		    position:absolute;
		    left:0px;
		    top:60px;
		    background-color:black;
		    width: 150px;
		    height: 591px;

		}
		.sub1 a:hover {
			color:#1a53ff;
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
		.box{
			position: absolute;
			margin-top: 25px;
			height: 24px;
			border: 2 solid white;
			margin-left: 50px;
			width: 720px;
			border-radius: 6px;
		}
		.find{
			height: 30px;
			margin-left: -9px;
			background-color: #1a53ff;
			border: solid #1a53ff;
			border-radius: 0px 6px 6px 0px;
		}
		.find:hover{	
			color: white;
		}
		.beda{
			float: right;
			font-size: 35px;
			margin-right: 100px;
			font-family: Bahnschrift SemiBold;
			color: #1a53ff;
		}
		.beda:hover{
			background-size: 10px;
			background-color: skyblue;
		}
		.beda1{
			padding-top: 30px;
			font-size: 120px;
			height: 150px;	
		}
		.beda1 :hover{
			color: #1a53ff;
			height: 100px;
		}
		td
		{
			background-color: white;
			width: 520px;
			height: 200px;
			opacity: 0.7;
			text-align: justify;
			padding-left: 15px;
			padding-right: 15px; 
			font-size: 18px;
			font-family: Bahnschrift SemiBold;
		}
		.satu
		{		
				margin-top: 40px;
				margin-left: 180px;
				position: absolute;
		}
		.dua
		{
				position: absolute;
				margin-left: 20cm;
				margin-top: 10cm;
				float: right;	
		}
		form{
			width: 100%;
		}
		</style>
	</head>
	<body><script src="https://kit.fontawesome.com/6562c2a9ad.js">
		</script>
	<nav><ul>
		<li><a href=""><i class="fas fa-bars"></i> Home</a>
		<ul class="sub1">
			<li class="beda1"><a href="Profile.html"><i class="fas fa-user-circle"></i></a></li>
			<li><a href="beli.php"><i class="fas fa-shopping-cart"></i> Beli</a></li>
			<li><a href="tambah_barang.php"><i class="fas fa-camera"></i> Jual</a></li>
			<li><a href="Contact Us.php"><i class="fas fa-phone-alt"></i> Contact Us</a></li>
			<li><a href="About.html"><i class="fas fa-code"></i> About Us</a></li>
		</ul>
		</li>
			<li><a href="" class="beda">M4RKET</a></li>
		</ul>
		<form method="get" target="" action="" class="frm">
		<input type="text" name='keyword' class="box"  placeholder="Cari Produk Disini..." autocomplete="off" id='keyword'>
	</form>
	</nav>
	<div id="container">
	</div>
		<table class="satu" id="tbl1">
			<tr>
				<td><p>Apa itu M4RKET?</p>
					<p>M4RKET atau market 4 adalah sebuah web jual beli online yang diperuntukan kepada seluruh warga SMKN 4 Bandung,
					 M4RKET dibuat agar warga SMKN 4 Bandung mudah untuk menjual maupun membeli barang yang tidak ada di toko online
					lainnya. M4RKET hanya tersedia di dalam lingkungan SMKN 4 Bandung, belum mencakup daerah luar lingkungan SMKN 4 
					Bandung.</p>
				</td>
			</tr>
		</table>
		<table class="dua" id="tbl2">
			<tr>
				<td>
					<p>Bagaimana Cara Kerja M4RKET?</p>
					<p>Kami dari tim development M4RKET memakai sistem jika ada barang yang akan dibeli oleh pembeli, kami akan mengambil uangnya terlebih dahulu dari pembeli setelah barang sampai ke pembeli kami akan menyerahkan uangnya kepada penjual. Bisa juga dengan bertemu langsung antara pembeli
					penjual(COD).</p>
				</td>
			</tr>
		</table>	
	</div>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/script3.js"></script>
</body>