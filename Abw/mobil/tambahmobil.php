<fieldset>
	<legend>Tambah Data Mobil</legend>
	<?php
	include 'mobil/koneksi.php';  
	$carikode = mysql_query("select max(kode_mobil) from tb_mobil ") or die(mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if ($datakode) {
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode+1;
		$hasilkode = "M".str_pad($kode,4,"0", STR_PAD_LEFT );
	} else {
		$hasilkode = "M0001";
	}
	?>

	<form action="" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Kode Mobil</td>
			<td>:</td>
			<td><input style="width: 60px; text-align: center; padding: 2px; border: 0" type="" name="kode_mobil" value="<?php echo $hasilkode; ?>" readonly="readonly"/> </td>
		</tr>
		<tr>
			<td>Merk</td>
			<td>:</td>
			<td><input maxlength="12" style="width: 120px; padding: 2px; border: 0" name="merk" type="text"/> </td>
		</tr>
		<tr>
			<td>Type</td>
			<td>:</td>
			<td><input maxlength="10" style="width: 120px; padding: 2px; border: 0" name="type" type="text"/> </td>
		</tr>
		<tr>
			<td>Warna</td>
			<td>:</td>
			<td><input maxlength="12" style="width: 120px; padding: 2px; border: 0" type="text" name="warna"/> </td>
		</tr>
		<tr>
			<td>Stok</td>
			<td>:</td>
			<td><input maxlength="2" style="width: 120px; padding: 2px; border: 0" type="text" name="stok"/> </td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><input style="width: 120px; padding: 2px; border: 0" type="text" name="harga"/> </td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>:</td>
			<td><input type="file" name="gambar"/> </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input class="btn" type="submit" name="tambah" value="Simpan Data" />
			 </td>
		</tr>
	</table>
	</form>
	<?php
	$kode_mobil = @$_POST['kode_mobil'];
	$merk = @$_POST['merk'];
	$type = @$_POST['type'];
	$warna = @$_POST['warna'];
	$harga = @$_POST['harga'];
	$stok = @$_POST['stok'];

	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'mobil/img/';
	$nama_gambar = @$_FILES['gambar']['name'];

	$tambah_mobil = @$_POST ['tambah'];

	if ($tambah_mobil) {
		if ($kode_mobil==""|| $merk==""|| $type==""|| $warna==""|| $stok==""|| $harga==""|| $nama_gambar=="" ) {
			?> <script type="text/javascript">alert("Inputan tidak boleh ada yang kosong"); </script>
			<?php
			} else{
				$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
				if ($pindah) {
					mysql_query("insert into tb_mobil values ('$kode_mobil', '$merk', '$type', '$warna',$stok, '$harga', '$nama_gambar') ") or die(mysql_error());
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

	?>
</fieldset>