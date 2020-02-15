<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			padding: 0;
			margin: 0;
			font-family: agency fb;
			font-size: 24px;
			background-color: #1abc9c;
			color: #34495e;
		}

		table{
			width: 75%;
			border: 3px #34495e solid;
			margin-left: auto;
			margin-right: auto;
		}

		h1{
			text-transform: uppercase;
			font-family: ailerons;

		}

		textarea{
			resize: none;
			background: none;
			border: none;
			width: 150px;
			color: #34495e;
			font-size: 17px;
		}

		.txt{
			padding: 0;
			width: 160px;
		}

		a{
			text-decoration: none;
		}

		div{
			border: none;
			transition: 0.4s;
			text-align: center;
		}

		div:hover{
			background-color: #34495e;
			border-radius: 5px;
			color: #1abc9c;
		}

		.pls{
			color: #34495e;
			transition: 0.4s;
			font-size: 40px;
			cursor: pointer;
		}

		a i{
			line-height: 50px;

		}

		.pls:hover{
			color: black;
		}

		#chk{
			position: absolute;
			z-index: -1111;
			visibility: hidden;
		}

		@media screen and (max-width: 800px) {
		.btn{
			display: block;
		}

		#chk:checked{
			right: 0;
		}
}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/d0a822ed1f.js" crossorigin="anonymous"></script>
</head>
<body>

	
	
	<?php
	include 'lib/main.php';

	$sql = 'SELECT * FROM produk_saya';
	$listBarang = $mysqli->query($sql);
	?>

	<center>
	<h1>Barang Saya</h1>
	<table border="2" cellspacing="0" cellpadding="5">
		<thead>
			<th>No</th>
			<th>ID</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Kategori</th>
			<th>Deskripsi</th>
			<th colspan="2">Aksi</th>
		</thead>

		<tbody>
			<?php 
				$i = 1;
				while ($barang = $listBarang->fetch_array()) {
			?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= $barang['id'] ?></td>
				<td><?= $barang['nama_barang'] ?></td>
				<td><?= $barang['harga'] ?></td>
				<td><?= $barang['kategori'] ?></td>
				<td class="txt"><center><textarea><?= $barang['deskripsi'] ?></textarea></center></td>
				<td><a href="edit.php?id=<?= $barang['id'] ?>"><div>Edit</div></a></td>
				<td><a href="delete.php?id<?= $barang['id']?>"><div>Delete</div></a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<input type="checkbox" id="chk">
	<label for="chk" class="btn">
		<a class="pls" href="v_tambah_brg.php"><i class="fas fa-plus-square"></i></a>
	</label>
	</center>
</body>
</html>