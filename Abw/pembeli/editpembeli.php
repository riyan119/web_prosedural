<?php  
include 'mobil/koneksi.php';
	$no_ktp = @$_GET['no_ktp'];
	$sql = mysql_query("select * from tb_pembeli where no_ktp= '$no_ktp' ") or die(mysql_error());
	$data = mysql_fetch_array($sql);
	?>
<fieldset style="width: 370px; padding-top: 10px;">
	<legend><b>Masukkan Data Pembeli</b></legend>
	<form action="" method="POST">
	<table width="360px">
		<tr>
			<td >No Ktp</td>
			<td>:</td>
			<td><input readonly value="<?php echo $data[0] ?>" style="width: 180px; padding: 2px; border: 0" type="text" name="no_ktp"></input></td>
		</tr>
		<tr>
		<td>Nama Pembeli</td>
		<td>:</td>
		<td><input maxlength="25" value="<?php echo $data[1] ?>" style="width: 180px; padding: 2px; border: 0" type="text" name="nama_pembeli"></input></td>
		</tr>
		<tr>
			<td style="vertical-align: top;">Alamat</td>
			<td style="vertical-align: top;">:</td>
			<td><textarea style="width: 200px; padding: 2px; border: 0; height: 90px;" name="alamat"><?php echo $data[2] ?></textarea></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>:</td>
			<td><input maxlength="12" name="telepon" value="<?php echo $data[3] ?>" style="width: 180px; padding: 2px; border: 0" type="text" id="telepon"></input></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button class="btnedit" type="submit" name="create" value="create">Ubah</button></td>
		</tr>
	</table>
	</form>
	<?php
if (isset($_POST['create'])) {
	include 'mobil/koneksi.php';
	$no_ktp = @$_POST['no_ktp'];
	$nama_pembeli = @$_POST['nama_pembeli'];
	$alamat = @$_POST['alamat'];
	$telepon = @$_POST['telepon'];

	$input = mysql_query("UPDATE tb_pembeli SET nama_pembeli = '$nama_pembeli' , alamat = '$alamat' , telepon = '$telepon' WHERE no_ktp = '$no_ktp' ");
	if ($input) {
		header("location:?page=pembeli");
	} else{
		echo "Data is valid!";
	}
}
?>
	</fieldset>