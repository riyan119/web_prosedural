<fieldset style="padding-top:  25px;">
	<legend><b>Data Beli cash</b></legend>
	<div style="margin-bottom:15px;" align="right">
		<form action="" method="POST">
		<select id="inputan_pencaharian" style="width: 100px; padding: 5px">
			<option>-Pilih-</option>
			<?php
			include '../../mobil/koneksi.php';
			include 'mobil/koneksi.php';
			$sql=mysql_query("select distinct(tgl_cash) from tb_beli_cash") or die(mysql_error());
			while ($data=mysql_fetch_array($sql)) {
			?>
			<option value="<?php echo $data[0]; ?>"><?php echo $data[0]; ?></option>
			<?php
			}
			?>
		</select>
			<input type="submit" name="cari_mobil" value="cari" style="padding:3px;"/>
		</form>
	</div>
	<table width="100%" align="center">
		<tr>
			<th>No</th>
			<th>Kode Cash</th>
			<th>Pembeli</th>
			<th>Mobil</th>
			<th>Tanggal Beli</th>
			<th>Harga Cash</th>
			<th>Opsi</th>
		</tr>
		<?php  
	$no =1;
	$inputan_pencaharian = @$_POST['inputan_pencaharian'];
	$cari_mobil = @$_POST['cari_mobil'];
	if ($cari_mobil) {
		if ($inputan_pencaharian !="") {
			$sql=mysql_query("select kode_cash, tb_pembeli.nama_pembeli as nama, tb_mobil.merk as merk, tb_mobil.type as type, tb_mobil.warna as warna, tgl_cash, tb_mobil.harga_mobil as harga from tb_beli_cash, tb_mobil, tb_pembeli where tb_beli_cash.kode_mobil = tb_mobil.kode_mobil and tb_beli_cash.no_ktp = tb_pembeli.no_ktp and tgl_cash like '%$inputan_pencaharian%'") or die(mysql_error());

		} else {
			$sql=mysql_query("select kode_cash, tb_pembeli.nama_pembeli as nama, tb_mobil.merk as merk, tb_mobil.type as type, tb_mobil.warna as warna, tgl_cash, tb_mobil.harga_mobil as harga from tb_beli_cash, tb_mobil, tb_pembeli where tb_beli_cash.kode_mobil = tb_mobil.kode_mobil and tb_beli_cash.no_ktp = tb_pembeli.no_ktp") or die(mysql_error());
		}
	} else {
		$sql=mysql_query("select kode_cash, tb_pembeli.nama_pembeli as nama, tb_mobil.merk as merk, tb_mobil.type as type, tb_mobil.warna as warna, tgl_cash, tb_mobil.harga_mobil as harga from tb_beli_cash, tb_mobil, tb_pembeli where tb_beli_cash.kode_mobil = tb_mobil.kode_mobil and tb_beli_cash.no_ktp = tb_pembeli.no_ktp") or die(mysql_error());
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
			<td><?php echo $data['kode_cash']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['merk']." ".$data['type']." ".$data['warna'];?></td>
			<td><?php echo $data['tgl_cash'];?></td>
			<td><?php echo $data['harga'];?></td>
			<td>
				<a href="?page=transaksi&action=hapus&kode_cash=<?php echo $data[0];?>"><button class="btnhapus">Hapus</button></a>
			</td>
		</tr>
		<?php
}
	}
	?>
	</table>
</fieldset>