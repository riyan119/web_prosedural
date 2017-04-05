<?php
@session_start();
include 'inc/koneksi.php';

if (@$_SESSION['admin'] || @$_SESSION['operator'] ) {
?>
<!DOCTYPE html>
<html>
<head>
	<title> Halaman Utama </title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div id="canvas">
	<div id="header" align="center" >
		<img src="img/header.jpg">
	</div>
	<div id="menu">
		<ul>
			<li class="utama"><a href="../web">Beranda</a></li>
			<li class="utama"><a href="">Barang Anime</a>
			<ul> 
			<li><a href="?page=mobil">Lihat Data</a></li>
			<li><a href="?page=mobil&action=tambah">Tambah Data</a></li>
			</ul>
			</li>
			<li class="utama"><a href="">Paket Kredit Barang</a>
			<ul>
				<li><a href="?page=paketkredit">Lihat Data</a></li>
				<li><a href="">Tambah Data</a></li>
			</ul>
			</li>
			<li class="utama right" style="background-color:#f60;"><a href="inc/logout.php">Logout</a></li>
			<li class="utama right">
				<?php
				if (@$_SESSION['admin']) {
					$user_terlogin = @$_SESSION['admin'];
				} else if (@$_SESSION['operator']) {
					$user_terlogin = @$_SESSION['operator'];
				}

				$sql_user = mysql_query("select * from tb_pengguna where kode_pengguna = '$user_terlogin' ") or die(mysql_error());
				$data_login = mysql_fetch_array($sql_user);
				?>
				<a> Selamat datang , <?php echo $data_login['nama_lengkap']; ?></a>
			</li>
		</ul>
	</div>
	<div id="isi">
	<?php  
	$page = @$_GET['page'];
	$action = @$_GET['action'];
	if ($page=="mobil") {
		if ($action=="") {
			include 'mobil/mobil.php';
		} else if ($action=="tambah") {
			include 'mobil/tambah_mobil.php';
		} else if ($action=="edit") {
			include 'mobil/edit_mobil.php';
		} else if ($action=='hapus') {
			include 'mobil/hapus_mobil.php';
		}
	} else if ($page=="paketkredit") {
		echo "ini halaman paket kredit";
	} else if ($page=="") {
		echo "Selamat datang dihalaman utama";
	} else {
		echo "404! Halaman tidak ditemukan";
	}
	?>	
	</div>
	<div id="footer">
		copy right Muhammad Riyan Setiawan
	</div>
</div>
</body>
</html>
<?php
} else {
	header("location: masuk.php");
}
?>