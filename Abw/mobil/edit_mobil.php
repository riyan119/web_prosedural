<fieldset>
	<legend>Edit Data Mobil</legend>
	<?php  
	include 'mobil/koneksi.php';
	$kode_mobil = @$_GET['kode_mobil'];
	$sql = mysql_query("select * from tb_mobil where kode_mobil = '$kode_mobil' ") or die(mysql_error());
	$data = mysql_fetch_array($sql);
	?>

	<form action="" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Kode Mobil</td>
			<td>:</td>
			<td><input style="width: 60px; text-align: center; padding: 2px; border: 0" type="" name="kode_mobil" value="<?php echo $data[0]; ?>" readonly="readonly"/> </td>
		</tr>
		<tr>
			<td>Merk</td>
			<td>:</td>
			<td><input value="<?php echo $data[1]; ?>" maxlength="12" style="width: 120px; padding: 2px; border: 0" name="merk" type="text"/> </td>
		</tr>
		<tr>
			<td>Type</td>
			<td>:</td>
			<td><input value="<?php echo $data[2]; ?>" maxlength="10" style="width: 120px; padding: 2px; border: 0" name="type" type="text"/> </td>
		</tr>
		<tr>
			<td>Warna</td>
			<td>:</td>
			<td><input value="<?php echo $data[3]; ?>" maxlength="12" style="width: 120px; padding: 2px; border: 0" type="text" name="warna"/> </td>
		</tr>
		<tr>
			<td>Stok</td>
			<td>:</td>
			<td><input value="<?php echo $data[4]; ?>" maxlength="2" style="width: 120px; padding: 2px; border: 0" type="text" name="stok"/> </td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><input value="<?php echo $data[5]; ?>" style="width: 120px; padding: 2px; border: 0" type="text" name="harga"/> </td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>:</td>
			<td><input type="file" name="gambar"/> </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<input class="btn" type="submit" name="edit" value="Edit">
		</tr>
		</table>
	</form>
	<?php
	include 'mobil/koneksi.php';
	$kode_mobil = @$_POST['kode_mobil'];
	$merk = @$_POST['merk'];
	$type = @$_POST['type'];
	$warna = @$_POST['warna'];
	$harga = @$_POST['harga'];
	$stok = @$_POST['stok'];

	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'mobil/img/';
	$nama_gambar = @$_FILES['gambar']['name'];
	$edit_mobil = @$_POST['edit'];

	if ($edit_mobil) {
		if ($merk == "" || $type== "" || $warna== "" || $harga == ""  ) {
			?> 
			<script type="text/javascript">
			alert("Inputan tidak boleh kosong");
			</script>

			<?php
		} else {
			if ($nama_gambar=="") {
				mysql_query("UPDATE tb_mobil SET merk='$merk', type='$type', warna='$warna',stok = '$stok', harga_mobil='$harga' WHERE kode_mobil='$kode_mobil' ") or die(mysql_error());
			?>
			<script type="text/javascript">
			alert("Data Berhasil Dimasukkan");
			window.location.href="?page=mobil";
			</script>
			<?php
			} else {
				$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
				if ($pindah) {
					mysql_query("UPDATE tb_mobil set merk = '$merk',type ='$type', warna ='$warna', stok = '$stok', harga_mobil='$harga', gambar ='$nama_gambar' where kode_mobil = '$kode_mobil' ") or die(mysql_error());	
					?> 
					<script type="text/javascript">alert("Data berhasil dimasukkan"); 
					window.location.href="?page=mobil";
					</script>
					<?php
				}else{
					?>
					<script type="text/javascript">
					alert("gambar gagal di upload");
					</script>
			<?php
			}
		}
		}
	}
	?>
</fieldset>