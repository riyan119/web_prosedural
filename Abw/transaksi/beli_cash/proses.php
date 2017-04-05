<?php
include 'config.php';
$no_ktp = @$_POST['no_ktp'];
$nama_pembeli = @$_POST['nama_pembeli'];
$alamat = @$_POST['alamat'];
$telepon = @$_POST['telepon'];
$kode_cash = @$_POST['kode_cash'];
$kode_mobil = @$_POST['kode_mobil'];
$tgl_cash = @$_POST['tgl_cash'];
$cash_bayar = @$_POST['cash_bayar'];

$tambah = $db->prepare("INSERT INTO tb_pembeli(no_ktp,nama_pembeli,alamat,telepon) VALUES (?,?,?,?) ");
$tambah->bindparam(1, $no_ktp);
$tambah->bindparam(2, $nama_pembeli);
$tambah->bindparam(3, $alamat);
$tambah->bindparam(4, $telepon);
$tambah->execute();

$tambah = $db->prepare("INSERT INTO tb_beli_cash(kode_cash,no_ktp,kode_mobil,tgl_cash,cash_bayar) VALUES (?,?,?,?,?) ");
$tambah->bindparam(1, $kode_cash);
$tambah->bindparam(2, $no_ktp);
$tambah->bindparam(3, $kode_mobil);
$tambah->bindparam(4, $tgl_cash);
$tambah->bindparam(5, $cash_bayar);
$tambah->execute();
if ($tambah->rowcount()>0) {
	echo "sukses";
}

?>