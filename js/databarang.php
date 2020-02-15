<?php 
require '../function.php';
	$keyword=$_GET['keyword'];
	$query = "SELECT * FROM barang 
			WHERE 
			nama_barang LIKE '%$keyword%' OR
			kategori_barang LIKE '%$keyword%' OR
			harga_barang LIKE '%$keyword%' OR
			deskripsi LIKE '%$keyword%'
			";
$barang = query($query);
?>
<table border="2" cellpadding="10" width="75%" align="center" bgcolor="indianred">
	<tr><th>No</th><th>Nama barang</th><th>kategori barang</th><th>harga barang</th><th>deskripsi</th><th>Action</th></tr>
<?php  
include "koneksi.php";

$no=1;
foreach ($barang as $_row) {
		echo "<tr>
	  	 <td>$no</td>
	  	 <td>".$_row['nama_barang']."</td> 
	  	 <td>".$_row['kategori_barang']."</td>
	  	 <td>".$_row['harga_barang']."</td>
	  	 <td>".$_row['deskripsi']."</td>
	  	 <td><button type='submit' class='btn'><a href='ubah_barang.php?id_barang=".$_row['id_barang']."'>Edit</a></button> |
			<button type='submit' class='btn'><a href='hapus_barang.php?id_barang=".$_row['id_barang']."'>Delete</a></button>
	  	 </tr>";
	  	 $no++;
	}
?>
</table>