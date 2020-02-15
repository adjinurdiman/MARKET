<style type="text/css">
.deskripsi{
		resize: none;
		width: 300px;
		height: 100px;
}
.selec{
	width: 167px;
	height: 25px;
}
h1{
	margin-left: 2cm;
}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Barang</title>
</head>
<body>
		<?php  if (isset($_POST["submit"])) : echo " 
	<script type='text/javascript'>
		alert('Data Telah Ditambahkan');
		document.location.href = 'simpan_barang.php'
	</script>
	 "; endif; ?>
<form method="post" action="simpan_barang.php">
	<table border="0" cellpadding="10" cellspacing="0">
		<h1>Tambah Produk</h1>
		<tr>
			<td><label for="nama_barang">Masukan nama barang</label></td>
			<td>:</td>
			<td><input type="text" name="nama_barang" autocomplete="off" id="nama_barang"></td>
		</tr>
		<tr>
			<td><label for="kategori_barang">Pilih kategori</label></td>
			<td>:</td>
			<td><select name="kategori_barang" class="selec" required="kategori" id="kategori_barang">
					<option>Kategori barang</option>	
					<option value="Perlengkapan_sekolah" class="tkj">Perlengkapan sekolah</option>
					<option value="Gadget" class="rpl">Gadget</option>
					<option value="Perlengkapan rumah tangga" class="mm">Perlengkapan rumah tangga</option>
					<option value="Lainnya" class="lainnya">Lainnya</option>				
				</select><br>
			</td>
		</tr>
		<tr>
			<td><label for="harga_barang">Masukan harga barang</label></td>
			<td>:</td>
			<td><input type="text" name="harga_barang" id="harga_barang" autocomplete="off"></td>
		</tr>
		<tr>
			<td><label for="deskripsi">Masukan deskripsi barang</label></td>
			<td>:</td>
			<td><textarea name="deskripsi" class="deskripsi" required="deskripsi" placeholder="" autocomplete="off" id="deskripsi"></textarea></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>
</body>
</html>