<!DOCTYPE html>
<html>
<head>
	<title>M4RKET</title>
</head>
		  <meta charset="UTF-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <meta http-equiv="X-UA-Compatible" content="ie=edge">
		  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		  <link rel="stylesheet" type="text/css" href="FontAwosome/css/all.min.css">
		  <link rel="stylesheet" type="text/css" href="Allcss.css">

	<style type="text/css">
		body{
			background-color: #ddd;
		}
		.table1{
			background-color: white;
			margin-left: 17px;
			margin-top: 25px;
			border-radius: 5px;
			height: 270px;
		}
		.table2{
			background-color : white;
			height: 270px;
			border-radius: 5px;
			margin-top: 25px;
			padding: 10px;
			width: 103.5%;
		}
		.table3{
			background-color: white;
			margin-top:25px;
			border-radius: 5px; 
			min-height: 300px;
			width: 100%;
		}
		img{
			margin-top: 10px;
			margin-bottom: 10px;
			margin-left: 10px;
			width: 200px;
			height: 250px;
		}
		input{
			width: 500px;
		}
		textarea{
			width: 500px;
			height: 100px;
		}
		input{
			margin-top: 10px;
		}
		textarea{
			margin-top: 10px;
		}
		select{
			margin-top: 10px;
		}
		button{
			margin-right: 10px;
		}
		.bedakeun{
			padding-left: 20px;
		}
		.bedakeun1{
			margin: 100px;
		}
		.row{
			margin-right: 0px;
		}
	</style>
<body>
	
<div class="row">
	<div class="col-sm-5">
		<div class="table1">
				<table class="table1">
					<tr>
						<td rowspan="4"><img src="orang.png" class="img-fluid img-thumbnail"></td>
						<td class="bedakeun">Nama Penjual</td>
					</tr>
					<tr>
						<td class="bedakeun">Nama Produk</td>
					</tr>
					<tr>
						<td class="bedakeun">Harga</td>
					</tr>
					<tr>
						<td class="bedakeun">Jumlah</td>
					</tr>
					<tr>
						<td colspan="1" align="center" class="bedakeun1">CRT 29</td>
					</tr>
				</table>
		</div>
</div>
	<div class="col-sm-7">
		<div class="container-sm">
		<form>
			<div class="table2">
				<div class="from-group">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
				</div>
				<div class="from-group">
					<input type="text" name="nohp" placeholder="NO. HP" class="form-control">
				</div>
				<div class="from-group">
					<textarea style="resize: none;" spellcheck="" name="alamat" placeholder="Alamat" class="form-control"></textarea>
				</div>
				<div class="from-group">
					<select id="inputState" class="form-control">
        				<option selected>-- Metode Pembayaran --</option>
        				<option>COD</option>
        				<option>Transfer</option>
        				<option>Pulsa</option>
      				</select>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
</div>
<div class="container-fluid">
	<table class="table3">	
			<tr>
				<td style="padding: 10px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>	
			</tr>
			<tr>
				<td style="float: right;padding-top: 100px;"><button class="btn btn-danger">Batal</button> <button class="btn btn-success">Beli</button></td>
			</tr>
	</table>
</div>
</body>
</html>