<?php
include 'koneksi.php';

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM data_user WHERE id_user = $id");

	return mysqli_affected_rows($conn);

}

function tambah($data)
{
	global $conn;
	$nama = htmlspecialchars($data['nama']);
    $nama_pelapak = htmlspecialchars($data['namapelapak']);
	$username= htmlspecialchars($data['username']);
	$password = htmlspecialchars($data['password']);
	$password = password_hash($password, PASSWORD_DEFAULT);
	$query = "INSERT INTO data_user VALUES ('','$nama','$nama_pelapak','','$username','$password','')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function ubah($data){
	global $conn;

	$id = $data['id_user'];
	$nama = htmlspecialchars($data['nama']);
	$lapak = htmlspecialchars($data['pelapak']);
	$username= htmlspecialchars($data['username']);
	$gambar = $_FILES['gambar'];
	$gambarLama = $data['gambarlama'];
	$wa = $data['wa'];
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	} else{
		$gambar = upload("Profile");
	}
	if (!$gambar) {
		return false;
	}

	$query = "UPDATE data_user SET
				nama = '$nama',
				nama_pelapak = '$lapak',
				username = '$username',
				no_telepon = '$wa',
				profile = '$gambar'
				WHERE id_user = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM data_user 
			WHERE 
			nis LIKE '%$keyword%' OR
			nama LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%' OR
			username LIKE '%$keyword%' OR
			password LIKE '%$keyword%' 
			";
			return query($query);
}

function carit($keyword){
	$query = "SELECT * FROM transaksi 
			WHERE 
			harga_barang LIKE '%$keyword%' OR
			bayar LIKE '%$keyword%' OR
			kembalian LIKE '%$keyword%' OR
			tanggal_transaksi LIKE '%$keyword%'
			";
			return query($query);
}

function hapusbrg($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM barang WHERE id_barang = $id");

	return mysqli_affected_rows($conn);

}
function tambahbrg($data,$id)
{
	global $conn;
	$nama_barang = htmlspecialchars($data['nama_barang']);
	$kategori_barang = htmlspecialchars($data['kategori_barang']);
	$harga_barang = htmlspecialchars($data['harga_barang']);
	$stok_barang = $data['stok_barang'];
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$tanggal_barang = Date("Y-m-d H:i:s");
	$gambar = upload();
	if (!$gambar) {
		return false;
	}
	$query = "INSERT INTO barang VALUES ('','$nama_barang','$kategori_barang',$harga_barang,$stok_barang,'$deskripsi','$tanggal_barang','$gambar','$id')";
	mysqli_query($conn, $query);
	var_dump(mysqli_affected_rows($conn));

	return mysqli_affected_rows($conn);
}
function upload($dest="img"){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	if($error === 4) {
		echo "<script>
				alert('silahkan masukan gambar');
			</script>
		";
		return false;
	}
	$eksValid = ['jpg','jpeg','png'];
	$eksGambar = explode('.', "$namaFile");
	$eksGambar = strtolower(end($eksGambar));
	if (!in_array($eksGambar, $eksValid)) {
		echo "<script>
				alert('Yang anda upload bukan gambar');
			</script>
		";
		return false;
	}
	$namaFileBaru = uniqid();
	$namaFileBaru .= ".";
	$namaFileBaru .= $eksGambar;
	move_uploaded_file($tmpName, "$dest/".$namaFileBaru);
	return $namaFileBaru;
}
function ubahbrg($data){
	global $conn;

	$id_barang = $data['id_barang'];
	$nama_barang = htmlspecialchars($data['nama_barang']);
	$kategori_barang = htmlspecialchars($data['kategori_barang']);
	$harga_barang = htmlspecialchars($data['harga_barang']);
	$stok_barang = $data['stok_barang'];
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$gambarLama = htmlspecialchars($data['gambarlama']);
	$gambar = $_FILES['gambar'];
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	} else{
		$gambar = upload();
	}

	$query = "UPDATE barang SET
				nama_barang = '$nama_barang',
				kategori_barang = '$kategori_barang',
				harga_barang = $harga_barang,
				stok_barang = $stok_barang,
				deskripsi = '$deskripsi'
				gambar_barang = '$gambar'
				WHERE id_barang = $id_barang
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function caribrg($keyword,$JDPH=20){
$JD = count(query("SELECT * FROM barang WHERE stok_barang>0"));
$JH = ceil($JD / $JDPH);
$HA = (isset($_GET["page"])) ? $_GET["page"] : 1;
$AD =($JDPH * $HA) - $JDPH;
	if ($keyword=='') {
		$query = "SELECT * FROM barang WHERE stok_barang>0 LIMIT $AD,$JDPH";
	}else{
	$query = "SELECT * FROM barang 
			WHERE stok_barang > 0 AND
			nama_barang LIKE '%$keyword%' OR
			kategori_barang LIKE '%$keyword%' OR
			harga_barang LIKE '%$keyword%' 
			LIMIT $AD,$JDPH
			";
			
		}
				return query($query);
}
function asc($sort,$kategoribarang,$JDPH=20){
$JD = count(query("SELECT * FROM barang WHERE stok_barang>0"));
$JH = ceil($JD / $JDPH);
$HA = (isset($_GET["page"])) ? $_GET["page"] : 1;
$AD =($JDPH * $HA) - $JDPH;
	if ($kategoribarang!="semua") {
		if($sort=="asc"){
		$query = "SELECT * FROM barang WHERE stok_barang>0 AND kategori_barang = '$kategoribarang' ORDER BY harga_barang LIMIT $AD,$JDPH";
	}
	else if($sort=="dsc"){
		$query = "SELECT * FROM barang WHERE stok_barang>0 AND kategori_barang = '$kategoribarang' ORDER BY harga_barang DESC LIMIT $AD,$JDPH";
	}
	else if($sort=="newest"){
		$query = "SELECT * FROM barang WHERE stok_barang>0 AND kategori_barang = '$kategoribarang' ORDER BY tanggal_barang DESC LIMIT $AD,$JDPH";
	}
	else{
		$query = "SELECT * FROM barang WHERE stok_barang>0 AND kategori_barang = '$kategoribarang' ORDER BY tanggal_barang LIMIT $AD,$JDPH";
	}
	
	return query($query);
	}
	if($sort=="asc"){
		$query = "SELECT * FROM barang WHERE stok_barang>0  ORDER BY harga_barang LIMIT $AD,$JDPH";
	}
	else if($sort=="dsc"){
		$query = "SELECT * FROM barang WHERE stok_barang>0 ORDER BY harga_barang DESC LIMIT $AD,$JDPH";
	}
	else if($sort=="newest"){
		$query = "SELECT * FROM barang WHERE stok_barang>0 ORDER BY tanggal_barang DESC LIMIT $AD,$JDPH";
	}
	else{
		$query = "SELECT * FROM barang WHERE stok_barang>0 ORDER BY tanggal_barang LIMIT $AD,$JDPH";
	}
	
	return query($query);
	
}
function registrasi($data){
	global $conn;

	$nama = htmlspecialchars($data['nama_lengkap']);
	$nama_pelapak = htmlspecialchars($data['pelapak']);
	$username = htmlspecialchars(strtolower(stripslashes($data["user"])));
	$no_tlp = htmlspecialchars($data['wa']);
	$password = mysqli_real_escape_string($conn,$data["pass"]);
	$password2 = mysqli_real_escape_string($conn,$data["pass2"]);

	$result = mysqli_query($conn,"SELECT * FROM data_user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
			alert('username sudah ada!');
			</script>
			";
			return false;
	}
	if ($password!=$password2) {
		echo "<script>
				alert('Password tidak sesuai');
				</script>
			";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($conn,"INSERT INTO data_user VALUES('','$nama','$nama_pelapak','$no_tlp','$username','$password','')");
	return mysqli_affected_rows($conn);
}
function crkategori($kategoribarang,$JDPH=20){
$JD = count(query("SELECT * FROM barang WHERE stok_barang>0"));
$JH = ceil($JD / $JDPH);
$HA = (isset($_GET["page"])) ? $_GET["page"] : 1;
$AD =($JDPH * $HA) - $JDPH;
	if ($kategoribarang!="semua") {
		$query = "SELECT * FROM barang WHERE stok_barang>0 AND kategori_barang = '$kategoribarang' LIMIT $AD,$JDPH";
		return query($query);
	}
	$query = "SELECT * FROM barang WHERE stok_barang>0 LIMIT $AD,$JDPH";
		return query($query);
	
}

function word_limit($string, $limit=20){
    if (strlen($string)>$limit) {
    	$word = mb_substr($string,0,$limit-3)."...";
    }
    else{
    	$word = $string;
    }
    echo "$word";
}
?>