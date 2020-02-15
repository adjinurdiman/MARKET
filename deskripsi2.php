<?php
require 'function.php';
include 'koneksi.php';

$id = $_GET['id_barang'];
$query = "SELECT * FROM barang WHERE id_barang = $id";
$barang = query($query);
$data_user = query("SELECT u.id_user,b.id_barang,u.nama_pelapak,b.id_user,u.profile,u.nama FROM data_user u,barang b WHERE b.id_barang = $id AND u.id_user = b.id_user");
if (isset($_POST['beli'])&&$_POST['jml_beli']>0) {
  $jml = $_POST['jml_beli'];

  if (isset($jml)<=$barang[0]['stok_barang']){
    if (($barang[0]['stok_barang']-$jml)>=0){
      $jml_baru = $barang[0]['stok_barang']-$jml;
      if ($jml_baru==0) {
        echo"<script>alert('Terima kasih telah memborong ".$barang[0]['nama_barang']." ');
          window.location.href='beli.php';
        </script> ";
      }
      $query="UPDATE barang SET stok_barang = $jml_baru WHERE id_barang = $id";
      mysqli_query($conn, $query);
      $barang[0]['stok_barang']-=$jml;

    }else{
      echo "<script>alert('Jumlah melebihi stok');</script>";
    }
  }
}
?>

<head>
  <link rel="shortcut icon" href="favicon.ico">
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="FontAwosome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="FontAwosome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="Allcss.css">
  <title>M4RKET</title>
</head>
<style type="text/css">
* {box-sizing: border-box;}
.Header{
  background-color: red;
  max-width: 100%;
  height: 50px;
  color: white;
  position: fixed;
}
a:visited, a:link {
  text-decoration: none;
  background-color: none;
  float: right;
  margin: 12px;
  margin-right: 40px;
  color: white;
}
a:hover, a:active {
  color: red;
}

input[type:text] {
  float: right;
}

.search {
  float: right;
  padding: 6px;
  width: 80%;
  position: relative;
  display: flex;
}

.searchTem {
  margin-left: 130px;
  width: 80%;
  border: 3px solid orange;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: black;
}

.searchTem:focus {
  color: blue;
}

.serachButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
  background-color: #00B4CC;
}

.navigation{
  background-color: lightgray;
  width: 100%;
  height: 40px;
}

.content{
  background-color: #ddd;
  width: 72%;
  height: 550px;
  margin-left: 40px;
  padding: 20px;
}

img{
  margin-left: 30px;
  margin-top: 40px;
  
}

td.foto{
  height: 600px;
  position: absolute;
  top: auto;
}

td.judul{
  font-family: sans-serif;
  font-weight: bold;
  height: 100px;
  width: 700px;
  position: absolute;
  margin-left: 10px;
  margin-top: 40px;
  font-size: 24px;
}

.harga{
  font-family: sans-serif;
  font-weight: bold;
  height: 60px;
  width: 700px;
  position: absolute;
  margin-left: 10px;
  margin-top: 150px;
  font-size: 40px;
}

.stok_barang{
  font-family: sans-serif;
  font-weight: bold;
  height: 60px;
  width: 700px;
  position: absolute;
  margin-left: 10px;
  margin-top: 220px;
  font-size: 16px;
}

.a{
  font-family: sans-serif;
  font-size: 12px;
}

.beli{
  font-family: sans-serif;
  font-weight: bold;
  height: 40px;
  width: 700px;
  position: absolute;
  margin-left: 10px;
  margin-top: 290px;
  font-size: 16px;
}

.beli_sekarang{
  width: 100%;
}

.tambah_Kekeranjang{
  width: 350px;
  height: 40px;
  text-decoration: none;
  background-color: lightgray;
  border: none;
  margin-top: 5px;
}

.chat_pelapak{
width: 340px;
height: 40px;
text-decoration: none;
background-color: lightgray;
border: none;
position: absolute;
top: 44px;
left: 348px;
margin-left: 10px;
}

.nanya{
  position: absolute;
  top: 420px;
  left: 340px;
  border-radius: 30px;
}

.jaminan{
  position: absolute;
  top: 450px;
  left: 340px;
}

.c{
  font-family: cursive;
  font-size: 20px;
}

.content1{
  height: auto;
  width: 800px;
  margin-top: 20px;
  margin-left: 60px;
  padding: 30px;
}

.gambar{
  width: 200px;
  height: 250px;
  margin-left: 0px;
  margin-top: 0px;
}
.profil_pelapak{
  position: absolute;
  top: 150px;
  left: 1100px;
}
.boy{
  width: 100px;
  height: 100px;
}

.ab{
  position: relative;
  margin-top: 60px;
  width: 67%;
  margin-left: 55px;
}

.font_informasi_produk{
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

.opsi1{
  font-family: cursive;
  color:black;
  padding: 10px;
  position: absolute;
  right: 800px;
  top: 578px;
}

.opsi2{
  font-family: cursive;
  color:black;
  padding: 10px;
  position: absolute;
  right: 670px;
  top: 578px;
}

.opsi3{
  font-family: cursive;
  color:black;
  padding: 10px;
  position: absolute;
  right: 470px;
  top: 578px;
}

.icon-book {
  height: 30px;
  position: absolute;
  right: 945px;
  top: 543px;
}

.icon-star{
  height: 30px;
  position: absolute;
  right: 735px;
  top: 543px;
}

.icon-chat{
  height: 30px;
  position: absolute;
  right: 595px;
  top: 543px;
}
.img-zoom-container{
  position: relative;
  cursor: crosshair;
}
.img-zoom-lens {
  position: absolute;
  border: 1px solid #d4d4d4;
  width: 60px;
  height:60px;
}
img{
  position: relative;
}
.content{
  margin-top: 10px;
}
.img-zoom-result {
  border: 1px solid #d4d4d4;
  width: 725px;
  margin-top: -15px;
  height: 530px;
  position: absolute;
}
.profiles img{
  border: 2px solid black;
  border-radius: 50%;
  width: 120px;
  height: 120px;
  position: relative;
  left: 10px;
  top: -20px;
}

.profile{
  height: 600px;
  width: 300px;
  float: right;
  position: absolute;
  right: 40px;
  top: 50px;
  padding: 0;
  margin: 0;
}

.foto_profiles{
  position: absolute;
  left: 60px;
}

.tulisan_profiles{
  color: black;
  font-family: cursive;
  position: absolute;
  top: 180px;
  left: 35px;
}

.Header{
  margin-top: -8px;
  margin-left: -8px;
  background-color: black;
  width: 100%;
  height: 50px;
  color: white;
  position: inherit;
}
.kembali{
 width: 100px;
 color: white;
 height: 20px;
 position: relative;
 left: -1300px;
 background-color: red;
 border-radius: 25px;
 text-align: center;
}
.kembali:hover{
   background-color: indianred;
}
p{
  margin-top: 2px;
  text-align: center;
}
hr{
  width: 240px;
  position: absolute;
  left: -10px;
}

.hr1{
  width: 300px;
  position: absolute;
  left: -75px;
}

.judul_pelapak{
  font-family: cursive;
  position: absolute;
  top: -160px;
  left: -80px;
  font-weight: bold;
}

.instagram_logo{
  height: 40px;
  position: absolute;
  top: 120px;
  left: -80px;
}

.facebook_logo{
  height: 40px;
  position: absolute;
  top: 120px;
  left: -10px;
}

.line_logo{
    height: 40px;
    position: absolute;
    top: 120px;
    left: 60px;
}

.twitter_logo{
  height: 40px;
  position: absolute;
  top: 120px;
  left: 130px;
}
.boy{
  border-radius: 50%;
}

</style>
<body>
  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-9">
        <section>
          <table>
      <tr>
        <td class="gambarproduk" valign="top">
        <div class="img-zoom-container">
          <img class="gambar img-fluid img-thumbnail" onmouseenter="show();" onmouseleave="hide();" id="myimage" src="img\<?= $barang[0]['gambar_barang'] ?>">
          </div>
        </td>
        <td valign="top">
          <div id="myresult" class="img-zoom-result"></div>
        </td>
        <td class="judul d">
          <?php word_limit($barang[0]['nama_barang'],30);  ?>
        </td>
        <td class="harga d">
          RP.<?= $barang[0]['harga_barang'] ?>
        </td>
        <td class="stok_barang d">
          <?php if ($barang[0]['stok_barang']>1){
            echo"Tersedia > ".($barang[0]['stok_barang']-1);
          }else{
            echo"Tersedia ". $barang[0]['stok_barang'];
          }?> stok barang <br>
          <font class="a d">masukan jumlah yang diinginkan</font><br>
          <div class="form-group">
            <input type="number" name="jml_beli" required="" autofocus="" class="form-control">
          </div>
        </td>
        <td class="beli d">
          <input type="submit" class="beli_sekarang d btn btn-success" name="beli" value="Beli" onclick="confirm('Anda yakin ingin membeli?')"<?php if(isset($_POST['beli'])&&isset($jml)) : ?>
          <?php if ($jml>0): ?>              
            onclick=" 
            var r = confirm('Anda yakin ingin membeli <?php word_limit($barang[0]['nama_barang'],20) ?>')
            "
            <?php endif; ?>
          <?php endif; ?> > <br>
          <input type="button" class="tambah_Kekeranjang btn btn-secondary" name="" value="tambahkan ke keranjang">
          <input type="button" class="chat_pelapak btn btn-secondary" name="" value="Chat Pelapak">
        </td>
        <td class="nanya">
          <input type="button" class="bertanya1 btn btn-secondary" name="" value="apakah stok masih ada?">
          <input type="button" class="bertanya2 btn btn-secondary" name="" value="saya pesan sekarang ya ">
        </td>
        <td class="jaminan d">
          <font class="c d">Jaminan 100% Aman</font>
          Uang pasti kembali. Sistem pembayaran bebas penipuan.<br>
          Barang tidak sesuai pesanan? Ikuti langkah retur barang disini.
        </td>
      </tr>
      
    </table>
        </section>
      </div>
      <div class="col-sm-3 profile">
        <form action="" method="post">
  <div class="profile">
    <div class="foto_profiles">
        <a href="penjual.php?id=<?=$data_user[0]['id_user']?>">
        <img class="boy" src="Profile/<?=$data_user[0]['profile'] ?>">
        </a>
        <hr class="hr2">
        <div class="tulisan_profiles">
          <p class="Nama_pelapak"><?=$data_user[0]['nama'] ?></p>
          <p class="judul_pelapak">Pelapak</p>
          <p class="alamat_pelapak">  </p><br>
          <p>SMKN 4 Bandung</p>
          <hr class="hr1">
          <p class="logo">
           <a href="https://www.instagram.com/adjinurdiman/?hl=id"><img src="instagram.png" class="instagram_logo" alt=""> </a>
           <a href="https://www.facebook.com/groups/MemeComicJonesIndonesia.MCJI/?ref=bookmarks"><img src="facebook.png" class="facebook_logo" alt=""> </a>
            <img src="line.png" class="line_logo" alt="">
            <img src="twitter.png" class="twitter_logo" alt="">
          </p>
      </div>
    </div>
      </div>
 
  </form>
      </div>
    </div>
  </div>

 <div class="opsi ">
            <a href="#">
            <img src="buku.png" class="icon-book"> <font class="opsi1">Informasi Produk</font>
            </a>
            <a href="#">
            <img src="star.png" class="icon-star" alt="">
              <font class="opsi2">Ulasan</font>
            </a>
            <a href="">
            <img src="chat.png" class="icon-chat" alt="">
            <font class="opsi3">Diskusi Produk</font>
            </a>
  </div>
  <hr class="ab">
  <div class="content1 ">
  <div class="informasi_produk d">
    <font class="font_informasi_produk d">

   <font>spesifikasi:
    <br>
    <br>
   <?=$barang[0]['deskripsi'] ?>
   </font>  <br>
    </font>
  </div>
  </div>



  


  <script src="js/zoom.js"></script>
  <script>
  imageZoom('myimage', 'myresult');
  var elems = document.getElementsByClassName('img-zoom-result');
   for(var i = 0; i < elems.length; i++) {
      elems[i].style.display = 'none';
    }
  function show(){
     var elems = document.getElementsByClassName('img-zoom-result');
      for(var i = 0; i < elems.length; i++) {
      elems[i].style.display = 'block';
    }
    var elems2 = document.getElementsByClassName('d');
      for(var i = 0; i < elems2.length; i++) {
      elems2[i].style.opacity = '2%';
    }
  }
  
  function hide(){
     var elems = document.getElementsByClassName('img-zoom-result');
      for(var i = 0; i < elems.length; i++) {
      elems[i].style.display = 'none';
    }
    var elems2 = document.getElementsByClassName('d');
      for(var i = 0; i < elems2.length; i++) {
      elems2[i].style.opacity = '100%';
    }
  }
  </script>

  <footer>
        <h3 align="center">Contact Us</h3>
        <h1 class="kontak" style="text-align: center;"><a href="https://www.instagram.com/m4rket_/?hl=id"><i class="fab fa-instagram"></i></a>
                  <a href="http://line.me/ti/p/~@262wsqjs"><i class="fab fa-line"></i></a>
                  <a href="https://twitter.com/m4rketbdg"><i class="fab fa-twitter"></i></a> 
                  <a href=""><i class="fab fa-facebook-square"></i></a></h1>
                  <h6 align="center" style="margin-top: 20px;">Copyright © 2019-2020 M4RKET. All rights reserved.</h6>
    </footer>
</body>
</div>