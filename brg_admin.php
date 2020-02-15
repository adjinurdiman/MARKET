<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			padding: 0;
			margin: 0;
			font-family: agency fb;
			font-size: 22px;
			background-color: #34495e;
			color: #1abc9c;
		}

		h1{
			text-transform: uppercase;
			font-family: ailerons;
		}

		table{
			width: 75%;
			border: 3px #1abc9c solid;
		}

		a{
			text-decoration: none;
		}

		div{
			border: none;
			transition: 0.4s;
			text-align: center;
			color: gray;
		}

		div:hover{
			background-color: #1abc9c;
			border-radius: 5px;
			color: #34495e;
		}

		.txt{
			padding: 0;
			width: 160px;
		}

		textarea{
			resize: none;
			height: 100px;
			color: #1abc9c;
			background: none;
			border: none;
			font-size: 17px;
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<?php  
	
	include 'koneksi.php';
	include 'function.php';

	$sql = 'SELECT * FROM barang';
	$listBarang = query($sql);

	?>

	<center>
		<h1>Data Barang</h1>
	<table border="2" cellspacing="0" cellpadding="5">
		<thead>
			<th>No</th>
			<th>ID</th>
			<th>Foto Barang</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Kategori</th>
			<th>Deskripsi</th>
			<th colspan="2">Aksi</th>
		</thead>

		<tbody>
			<?php 
				$i = 1;
				foreach ($listBarang as $barang) :
			?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= $barang['id_barang'] ?></td>
				<td><img width="100" height="100" src="img/<?=$barang['gambar_barang']?>"></td>
				<td><?= $barang['nama_barang'] ?></td>
				<td><?= $barang['harga_barang'] ?></td>
				<td><?= $barang['kategori_barang'] ?></td>
				<td class="txt"><center><textarea readonly="readonly"><?= $barang['deskripsi'] ?></textarea></center></td>
				<td><a href="edit.php?id=<?= $barang['id'] ?>"><div>Edit</div></a></td>
				<td><a href="delete.php?id<?= $barang['id']?>"><div>Delete</div></a></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</center>
</body>
</html>