<?php
include 'koneksi.php';
$page = @$_GET['page'];
$action = @$_GET['action'];


if ($page=='transaksi') {
	$no_ktp = @$_POST['no_ktp'];
$nama_pembeli = @$_POST['nama_pembeli'];
$alamat = @$_POST['alamat'];
$telepon = @$_POST['telepon'];

	if ($action=='pembeli') {	

$tambah = $db->prepare("INSERT INTO tb_pembeli(no_ktp,nama_pembeli,alamat,telepon) VALUES (?,?,?,?) ");
$tambah->bindparam(1, $no_ktp);
$tambah->bindparam(2, $nama_pembeli);
$tambah->bindparam(3, $alamat);
$tambah->bindparam(4, $telepon);
$tambah->execute();
if ($tambah->rowcount()>0) {
	echo "sukses";
}
}
}

?>