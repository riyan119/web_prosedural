<?php
include 'koneksi.php';
?>
<style type="text/css">
	td{
		text-align: center;
	}
</style>
<table width="100%" align="center" border="1" style="border-collapse: collapse;">
<tr>
	<th></th>
	<th>Kode Mobil</th>
	<th>Merk</th>
	<th>Type</th>
	<th>Warna</th>
	<th>Stok</th>
	<th>Harga</th>
	<th>gambar</th>
	</tr>
	<tr>
	<?php
	$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$tampil = $db->query("SELECT *FROM tb_mobil");
	while ($data = $tampil->fetch(PDO::FETCH_BOTH)) {	
	?>
		<td>
			<input type="submit" value="Pilih"></input>
		</td>
		<td><?php echo $data[0]; ?></td>
		<td><?php echo $data[1]; ?></td>
		<td><?php echo $data[2]; ?></td>
		<td><?php echo $data[3]; ?></td>
		<td><?php echo $data[4]; ?></td>
		<td><?php echo $data[5]; ?></td>
		<td><?php echo $data[5]; ?></td>
	</tr>
	<?php
}
?>
</table>