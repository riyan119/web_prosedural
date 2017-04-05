<fieldset>
	<legend>Tampil data mobil</legend>
	<div style="margin-bottom:15px;" align="right">
		<form action="" method="POST">
			<input type="text" name="inputan_pencaharian" placeholder="Masukkan Merk / Type mobil ..." style="width:200px; padding:5px;" />
			<input type="submit" name="cari_mobil" value="cari" style="padding:3px;"/>

		</form>
	</div>
	<table width="100%" border="1px" style="border-collapse:collapse;">
	<tr style="background-color:#FC0;">
		<th>Kode Barang</th>
		<th>Merk</th>
		<th>Type</th>
		<th>warna</th>
		<th>harga</th>
		<th>gambar</th>
		<th>opsi</th>
	</tr>
	<?php  

	$inputan_pencaharian = @$_POST['inputan_pencaharian'];
	$cari_mobil = @$_POST['cari_mobil'];
	if ($cari_mobil) {
		if ($inputan_pencaharian !="") {
			$sql=mysql_query("select *from tb_mobil where merk like '%$inputan_pencaharian%' or type like '%$inputan_pencaharian%'  ") or die(mysql_error());

		} else {
			$sql=mysql_query("select *from tb_mobil") or die(mysql_error());
		}
	} else {
		$sql=mysql_query("select *from tb_mobil") or die(mysql_error());
	} 

	$cek = mysql_num_rows($sql);
	if ($cek < 1) {
	?>
	<tr>
		<td colspan="7" align="center" style="padding:10px;"> Data tidak ditemukan</td>
	</tr>
	<?php  
	} else {
		while ($data=mysql_fetch_array($sql)) {
			?>
	<tr>
		<td align="center"><?php echo $data['kode_mobil'];  ?></td>
		<td><?php echo $data['merk'];  ?></td>
		<td><?php echo $data['type'];  ?></td>
		<td><?php echo $data['warna'];  ?></td>
		<td><?php echo $data['harga'];  ?></td>
		<td align="center"><img src="img/<?php echo $data['gambar'];  ?>" width="120px" /></td>
		<td align="center">
			<a href="?page=mobil&action=edit&kdmobil=<?php echo $data['kode_mobil'];  ?> "><button>Edit</button></a>
			<a onclick ="return confirm('yakin ingin menghapus data ?')" href="?page=mobil&action=hapus&kdmobil=<?php echo $data['kode_mobil'];?>"><button>Hapus</button> </a>
		</td>
	</tr>
	<?php
	}
}
	?>
	</table>
</fieldset>