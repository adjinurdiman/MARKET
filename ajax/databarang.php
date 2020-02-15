<?php 
require '../function.php';
if ($_GET['keyword']!=null) {

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
<style type="text/css">
	table{
		float: left;
		height: 1cm;
		border-color: blue;
		font-size: relative;
	}
	.nama{
		height: 10px;
	}
	.foto{
		height: 50px;
	}
	.bottom{
		width: 5px;
	}
</style>

<?php  

$no=1;
foreach ($barang as $_row) {
		echo "
		<table border='3' width='2cm' bgcolor='skyblue' class='tabel'>
		<tr>
	  	 <td colspan='4' class='nama'><font size='5px'><center>".$_row['nama_barang']."</font></center></td>
	  	 </tr>
	  	 <tr><td colspan='4' class='foto'><center>Foto</center></td></tr>
	  	 <td class='bottom'><font size='2px'>".$_row['kategori_barang']."</font></td>
	  	 <td class='bottom'><font size='2px'>".$_row['harga_barang']."</font></td>
	  	 <td class='bottom'><font size='1px'>".$_row['deskripsi']."</font></td></table>";
	  	 }
	  	 }
	  	 else{
	  	 	echo "<script>
	  	 			$('#container').show();
	  	 		 </script>";
	  	 }

?>
