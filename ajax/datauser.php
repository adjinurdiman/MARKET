<?php 
 require '../function.php';
 if ($_GET['keyword']!=null) {
 	$keyword = $_GET['keyword'];
 $query = "SELECT * FROM data_user 
			WHERE 
			nama LIKE '%$keyword%' OR
			nama_pelapak LIKE '%$keyword%' OR
			username LIKE '%$keyword%' OR
			password LIKE '%$keyword%' 
			";
$data_user = query($query);
 
 

 ?>
 <table border="2" cellpadding="10" width="75%" align="center" bgcolor="indianred">
	<tr><th>No</th><th>Nama</th><th>Nama pelapak</th><th>Username</th><th>Password</th><th>Action</th></tr>
<?php  

$no=1;
foreach ($data_user as $_row) {
		echo "<tr>
	  	 <td>$no</td>
	  	 <td>".$_row['nama']."</td> 
	  	 <td>".$_row['nama_pelapak']."</td>
	  	 <td>".$_row['username']."</td>
	  	 <td>".$_row['password']."</td>
	  	 <td><button type='submit' class='btn'><a href='ubah.php?id_user=".$_row['id_user']."'>Edit</a></button> |
			<button type='submit' class='btn'><a href='hapus.php?id_user=".$_row['id_user']."'>Delete</a></button>
	  	 </tr>";
	  	 $no++;
	}
}
else{
	echo "<script>
			$('#tbl').show();
		 </script>
			";
}
?>
</table>
