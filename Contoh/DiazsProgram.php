<style type="text/css">
	.selek{
		width: 100%;
	}
	.ket{
		width: 100%;
	}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>Menginput Data Siswa</title>
</head>
<body>
	<form method="post" action="simpan.php">
	<table border="2">
		<tr>
			<td>NIM</td><td><input type="text" name="nim" class="ket"></td>
		</tr>
		<tr>
			<td>NAMA</td><td><input type="text" name="nama" class="ket"></td>
		</tr>
		
		<tr>
			<td>Jenis Kelamin</td>
			<td><input type="radio" name="jenis_kelamin" value="L">Laki-Laki</input>
				<input type="radio" name="jenis_kelamin" value="P">Perempuan</input>
			</td>
		</tr>
		<tr>			
			<td colspan="2">
			<select  name="jurusan" class="selek">				
				<option  >Jurusan</option>
				<option value="TKJ">Teknik Komputer dan Jaringan</option>
				<option value="RPL">Rekayasa Perangkat Lunak</option>
				<option value="MM">Multimedia</option>				
			</select> 
			</td>
		</tr>
		<tr><td colspan="2"><button type="submit" value="simpan">Simpan</button></td></tr>
	</table>
	</form>
</body>
</html>