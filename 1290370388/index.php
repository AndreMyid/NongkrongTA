<?php
session_start();
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/highslide.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/utilities.js"></script>
	<script type="text/javascript" src="js/highslide-with-html.js"></script>
	<script type="text/javascript" src="js/slideshow.js"></script>
	<link rel="shortcut icon" href="images/icon.png" />
	<script type="text/javascript">
		hs.graphicsDir = './images/';
		hs.outlineType = 'rounded-white';
		hs.wrapperClassName = 'draggable-header';
	</script>
	<title>Delima Online Shop</title>
</head>

<body>
<?php
include('koneksi.php');
?>
	<div id="menu-atas">
		<div id="atas"><div class="logo"><img src="images/logo.png" /></div>
			<div id="head">
				<div id="imgSShow" align="center">
					<img src="images/header.jpg" alt="large image" name="SLIDESIMG" id="SLIDESIMG" style="opacity: 1;">
					<script type="text/javascript" src="js/slide-2.js"></script>
				</div>
			</div>
			<div class="menu" id="nav">
				<ul>
					<li><a href="index.php">Beranda</a></li>
					<li><a href="product.php">Produk</a></li>
					<li><a href="shoppingcart.php">Shopping Cart</a></li>
					<li><a href="pembayaran.php">Pembayaran</a></li>
					<li><a href="hubungi.php">Hubungi Kami</a></li>
					<li><a href="hal-login.php">Login Admin</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div id="isi">
		<div id="kiri">
			<p>Selamat Datang di Delima Online Shop</p>
			Delima Online Shop merupakan situs e-commerce yang menjual berbagai jenis pakaian formal maupun non-formal. <br /><br />
			Situs ini menyediakan berbagai fasilitas untuk pemesanan dan pembelian secara online maupun offline.  <br /><br />
			<div id="judul">Rekomendasi Dari Kami</div>
			<?php
			$q = mysql_query("select * from barang order by id_barang DESC LIMIT 3");
			while($r = mysql_fetch_array($q))
			{
			echo"<div id='sub-barang'><div class='jdl-brg'>$r[nama_barang]</div><img src='barang/$r[gambar]' width='110' class='gambar'><div id='harga'><i>Harga Rp.$r[harga]</i>
			<a href='pesan.php?id_barang=$r[id_barang]'><div  class='submitButton3'>Buy This Item</div></a><a href='detail.php?id_barang=$r[id_barang]' onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\"><div  class='submitButton3'>Review Item</div></a>
			</div></div>";
			}
			?>
			<br />
			<br />
			<p align="center">Ingin melihat semua koleksi produk kami? Silahkan cek ke : </p>
			<a href="product.php"><div class="submitButton2">Produk Kami</div></a>
		</div>
		
		<div id="kanan">
		<?php
		if(empty($_SESSION['namamember'])){ //tadi kurang tanda petik
		?>
			<div id="judul">Member Log In</div>
			<div id="widget">
			<form method="post" action="log-member.php">
			<table>
			<tr><td>Username</td><td>:</td><td><input type="text" name="user" class="input" size="20"/></td></tr>
			<tr><td>Password</td><td>:</td><td><input type="password" name="pass" class="input" size="20"/></td></tr>
			<tr><td></td><td></td><td><input type="submit" value="Masuk" class="submitButton" /> <input type="reset" value="Hapus" class="submitButton" /></td></tr>
			</table>
			</form>
			<a href="registrasi.php"><div class="submitButton2">Daftar Akun Baru</div></a>
			</div>
			<?php
			}
			else{
			?>
			<div id="judul">Selamat Datang</div>
			<div id="widget">
			<?php
			$d = date('d');
			$m = date('m');
			$y = date('Y');
			?>
			<img src="images/user-icon.jpg" class="gambar2" />
			Halo "<b><?php echo"$_SESSION['nama']"; ?></b>"<br />
			Login Tanggal : <?php echo "$d-$m-$y"; ?><br /><br /><br /><br /><br />
			<a href="logout.php"><div class="submitButton2">Keluar</div></a>
			</div>
			<?php
			}
			?>

			<div id="judul">Toko Offline Kami</div>
			<div id="widget">
			<li class="li-class">Bekasi</li>
			<li class="li-class-no">Jl. Gabus 1 no 83
			Perumnas 2 Bekasi Barat</li>
			<li class="li-class">Telepon</li>
			<li class="li-class-no">085771457356</li>
			<p></p>
			<a href="hubungi.php"><div class="submitButton2">Ada Masalah? Hubungi Kami!</div></a>
			</div>

			<div id="judul">Temukan Kami di :</div>
			<div id="widget">
			<a href="ymsgr:sendIM?ipratiwi2011" target="_blank"><img border="0" src="./images/ym.jpg" title="YM : Irma Pratiwi" class="image" width="30"/>YM</strong><br />Delima Online Shop<br /><br /></a>
			<a href="http://www.facebook.com/irmapersie" target="_blank"><img border="0" src="./images/facebook.gif" title="FB : Irma Pratiwi" class="image" width="30"/> Facebook</strong><br />Delima Online Shop<br /><br /></a>
			</div>
		</div>
	</div>
	<!--/div -->
	
	<div id="menu-bawah">
		<div id="footer">
		Copyright © Delima Online Shop 2014. All Right Reserved<br />
		Jl. Gabus 1 no 83 Perumnas Bekasi Barat Telp: 085771457356 email : ipratiwi2011@gmail.com 
		</div>
	</div>
	
</body>
</html>
