<?php
@session_start();
include 'koneksi.php';
include 'mobil/koneksi.php';

if (@$_SESSION['admin'] || @$_SESSION['operator'] ) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Penjualan Mobil</title>
	<link rel="stylesheet" type="text/css" href="css/mobil.css">
</head>
<body>
<div id="canvas">
	<div id="header">
		<img src="gambar/bg-1.jpg">
	</div>
	<div id="menu">
		<ul>
				<li class="utama"><a href="../ABW"> Beranda </a></li>
				<li class="utama"><a href="">Mobil</a> 
			<ul>
				<li ><a href="?page=mobil">Lihat Data</a></li>
				<li ><a href="?page=mobil&action=tambah">Tambah Data</a></li>
			</ul>
			</li>
			<li class="utama"><a href="?page=pembeli">Pembeli</a></li>
			<li class="utama"><a href="#"> Transaksi</a>
			<ul>
				<li ><a href="?page=transaksi&action=belicash">Beli cash</a></li>
				<li ><a href="?page=transaksi&action=datacash">Data cash</a></li>
			</ul>
			</li>
			<li class="utama"><a href=""> Laporan </a>
			<ul>
				<li ><a href="">Data Mobil</a></li>
				<li ><a href="">Beli Cash</a></li>
			</ul>
			</li>
			<li class="utama right"><a href="">Member</a>
			<ul>
				<li ><a href="?page=member&action=datamember">Lihat Anggota</a></li>
				<li ><a href="?page=member&action=tambah">Tambah Data</a></li>
			</ul>
			</li>
			</ul>
	</div>
	<div id="tampilan">
	<div>
		<table>
			<tr>
				<td style="vertical-align: top; ">
					<div id="login" style="font-size: " >
						<img src="gambar/contoh1.jpg"> <br>
						<?php
				if (@$_SESSION['admin']) {
					$user_terlogin = @$_SESSION['admin'];
				} else if (@$_SESSION['operator']) {
					$user_terlogin = @$_SESSION['operator'];
				}

				$sql_user = mysql_query("select * from tb_login where kd_login = '$user_terlogin' ") or die(mysql_error());
				$data_login = mysql_fetch_array($sql_user);
				
				?>
						Selamat Datang <?php echo $data_login['level']; ?> <br> <?php echo $data_login['nama_lengkap']; ?> <br>
						<a  href="logout.php?> "><button class="btn">Logout</button></a>
					</div>
				</td>
				<td>
				<table>
					<tr>
						<td>
							<div id="isi">
					<?php 
		$page = @$_GET['page'];
		$action = @$_GET['action'];

		if ($page=="mobil") {
			if ($action=="") {
				include 'mobil/mobil.php';
			} else if ($action=="tambah") {
				include 'mobil/tambahmobil.php';
			}else if ($action=="edit") {
				include 'mobil/edit_mobil.php';
			}else if ($action=="hapus") {
				include 'mobil/hapus_mobil.php';
			}
		}else if ($page=="pembeli") {
			if ($action=="") {
				include 'pembeli/pembeli.php';
			} 
			if ($action=="edit") {
				include "pembeli/editpembeli.php";
			}
		}else if ($page=="transaksi") {
			if ($action=="belicash") {
				include "transaksi/beli_cash/beli_cash.php";
			}else if ($action=="datacash") {
				include "transaksi/beli_cash/datacash.php";
			}else if ($action=="hapus") {
				include "transaksi/beli_cash/hapus.php";
			}
		}else if ($page=="member") {
			if ($action=="datamember") {
				include "member/datamember.php";
			}else if ($action=="edit") {
				include "member/edit.php";
			}else if ($action=="tambah") {
				include "member/tambah.php";
			}else if ($action=="hapus") {
				include "member/hapus.php";
			}
		}else if ($page=="") {
			echo "Selamat Datang Dihalaman utama Panjualan Mobil . Aplikasi Sederhana ini dibuat
			untuk penambahan nilai uas mata kuliah Aplikasi Berbasis Web.
			";
		} else{
			echo "404! Halaman tidak ditemukan";
		}
		?>
		</div>
						</td>
					</tr>
				</table>
				</td>
			</tr>
			
		</table>
	</div>
		
		</div>

	<div id="footer">
		Copy right my team
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

	$("#isi").on("click","#simpancash",function(){
		var no_ktp = $("#no_ktp").val();
		var nama_pembeli = $("#nama_pembeli").val();
		var alamat = $("#alamat").val();
		var telepon = $("#telepon").val();
		if (no_ktp==''||nama_pembeli==''||alamat==''||telepon=='') {
			alert("Data tidak boleh kosong");
		} else {
			$.ajax({
				url : 'proses.php?page=transaksi&action=pembeli',
				type : 'post',
				data : 'no_ktp='+no_ktp+'&nama_pembeli='+nama_pembeli+'&alamat='+alamat+'&telepon='+telepon,
				success : function(msg){
					if (msg=='sukses') {
						$("#isi").load("transaksi/belicash.php")
						alert ("Data berhasil dimasukkan");	
					}else{
						alert("Salah Goblok");
					}
				}
			});
		}
	});
$("#paket").on("click","#pilihmobil",function(){
		$("#paketmobil").load("paketkredit/paketkredit.php");
	});

</script>

<?php
} else {
	header("location: masuk.php");
}
?>