<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>HALAMAN WEBSITE</title> <?php // Silahkan beri nama sesuai nama situs ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/jh8.css" />
	<script language="JavaScript"></script> <?php // JavaScript ini tidak memiliki fungsi? -_- ?>
</head>
<body>
<div id="menu-a">
	<li>
		<a title="Kembali ke atas" href="#">Kembali ke atas</a>
	</li>
	<a href="?page=home" title="Beranda">Beranda</a>
    <a href="?page=ketentuan" title="Ketentuan">Ketentuan</a>
    <a href="?page=hubungi" title="Kontak Perusahaan">Hubungi Kami</a>
    <a href="?page=tentang" title="Tentang Kami">Tentang Kami</a>
	<a href="?page=tamu" title="Tamu">Buku Tamu</a>
</div>
<div id="semua">
	<div id="atas">
		<img src="foto/Header_03.jpg" />
	</div>
	
	<div id="bersih"></div>
        <div id="konten" class="tengah-kiri">
			<div id="judul">Buku Tamu</div>
        	<div id="isi"><?php include 'admin/buku_tamu_input.php' ?></div>
        	<hr />
			<div id="judul">Member</div>
        	<div id="isi">
				<?php
				error_reporting(0);
				session_start();
				$date = date('d-m-Y');
				$time = gmdate('H:i:s', time()+60*60*7);

				// melakukan pengecekan Session email dan password
				if (!empty($_SESSION['email']) and !empty($_SESSION['password']))
					{
				?>
						<pre>
						<h4 align="left">Nama		: <font color="#0000FF"><?php echo "$_SESSION[nama]"; ?></font></h4>
						</pre>
						<center><a href="?page=edit">EDIT</a>&nbsp;&nbsp;&nbsp;<a href="?page=member_logout">KELUAR</a></center>
						<br />
				<?php	
					}
				else //
					{
						include "member_login.php";
					}
				?>
			</div>
			<hr />     
		</div>
		<div id="konten" class="tengah-kanan">
        	<div id="posting"><?php include 'konten.php' ?></div>
		</div>

  	<div id="bersih"></div>
	<div id="bawah"></div>
</div>
</body>
</html>
