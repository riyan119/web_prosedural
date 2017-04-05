<?php
if (isset($_GET['kd_login'])){
	include 'mobil/koneksi.php';
	$kd_login = $_GET['kd_login'];
	$delete = mysql_query("DELETE FROM tb_login WHERE kd_login = '$kd_login' ");

	if ($delete) {
		header("location:?page=member&action=datamember");
	} else{
		echo "Data is Not valid!";
	}
}
?>