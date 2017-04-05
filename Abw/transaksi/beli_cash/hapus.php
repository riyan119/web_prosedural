<?php
if (isset($_GET['kode_cash'])){
	include 'mobil/koneksi.php';
	$kode_cash = $_GET['kode_cash'];

	$delete = mysql_query("DELETE a.*, b.*
FROM tb_beli_Cash as a, tb_pembeli as b
WHERE a.no_ktp = b.no_ktp
AND a.kode_Cash = '$kode_cash'");
	if ($delete) {
		header("location:?page=pembeli");
		
	} else{
		echo "Data is Not valid!";
	}
}
?>