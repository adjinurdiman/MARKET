<style type="text/css">
	td{
		text-align: center;
		background-color: pink;
	}
	th{
		background-color: yellow;
	}

</style>
<h2 align="center">List Mahasiswa</h2>
<body background="ping.jpg"></body>
<table border="2" width="75%" align="center" bgcolor="indianred">
	<tr><th>No</th><th>Nim</th><th>Nama</th><th>Gender</th><th>Jurusan</th><th>Action</th></tr>
<?php  
include "koneksi.php";
$mahasiswa = mysqli_query($conn, "SELECT * from mahasiswa");
$no=1;
$row = mysqli_fetch_array($mahasiswa);
foreach ($mahasiswa as $_row) {
	$jenis_kelamin = $_row['jenis_kelamin']=='P'?'perempuan':'Laki laki';
	if ($_row['jurusan']=='RPL'){
		$jurusan='RPL';
	}elseif ($_row['jurusan']=='TKJ') {
		$jurusan='TKJ';
	}else{$jurusan='MM';}
		echo "<tr>
	  	 <td>$no</td><td>".$_row['nim']."</td>
	  	 <td>".$_row['nama']."</td>
	  	 <td>".$jenis_kelamin."</td>
	  	 <td>".$jurusan."</td>
	  	 <td><a href='form-edit.php?id_mahasiswa=$row[id_mahasiswa]'>Edit</a>
	  	 	 <a href='delete.php?id_mahasiswa=$row[id_mahasiswa]'>Delete</a>
	   	 </td>
	  	 </tr>";
	  	 $no++;
	}
?>
</table>