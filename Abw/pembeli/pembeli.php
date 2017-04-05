<fieldset style="padding-top:  25px;">
	<legend><b>Data Pembeli</b></legend>
	<div style="margin-bottom:15px;" align="right">
		<form action="" method="POST">
			<input type="text" name="inputan_pencaharian" placeholder="Masukkan Nama Pembeli" style="width:200px; padding:5px;" />
			</select>
			<input type="submit" name="cari_mobil" value="cari" style="padding:3px;"/>
		</form>
	</div>
	<table width="100%" align="center">
		<tr>
			<th>No</th>
			<th>No Ktp</th>
			<th>Nama Pembeli</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			<th>Opsi</th>
		</tr>
		<?php  
include 'mobil/koneksi.php';
	$no =1;
	$inputan_pencaharian = @$_POST['inputan_pencaharian'];
	$cari_mobil = @$_POST['cari_mobil'];
	if ($cari_mobil) {
		if ($inputan_pencaharian !="") {
			$sql=mysql_query("select *from tb_pembeli where nama_pembeli like '%$inputan_pencaharian%'") or die(mysql_error());

		} else {
			$sql=mysql_query("select *from tb_pembeli") or die(mysql_error());
		}
	} else {
		$sql=mysql_query("select *from tb_pembeli") or die(mysql_error());
	} 

	$cek = mysql_num_rows($sql);
	if ($cek < 1) {
	?>
	<tr>
		<td colspan="8" align="center" style="padding:10px;"> Data tidak ditemukan</td>
	</tr>
	<?php  
	} else {
		while ($data=mysql_fetch_array($sql)) {
			?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data[0]; ?></td>
			<td><?php echo $data[1]; ?></td>
			<td><?php echo $data[2];?></td>
			<td><?php echo $data[3];?></td>
			<td>
				<a href="?page=pembeli&action=edit&no_ktp=<?php echo $data[0];  ?> "><button class="btn">Edit Data</button></a>
			</td>
		</tr>
		<?php
}
	}
	?>
	</table>
</fieldset>