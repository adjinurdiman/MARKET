<?php  
include "koneksi.php";

$nama = $_POST["nama"];
$nim = $_POST['nim'];
$jenis_kelamin = $_REQUEST['jenis_kelamin'];
$jurusan = $_REQUEST['jurusan'];
$query = "INSERT INTO mahasiswa (nim,nama,jenis_kelamin,jurusan) VALUES('$nim','$nama','$jenis_kelamin','$jurusan')";
$result = mysqli_query($conn, $query);

	if ($result) {
		echo "<h2>Input berhasil</h2><a href=LihatDataDiri.php>Lihat Data<a>";
	}
	else{
		echo "input gagal";
	}

	mysqli_close($conn);
?>