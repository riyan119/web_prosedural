	<style type="text/css">
	fieldset{
		width: 720px;
	}

	.ig{
		width: 240px;
	}
	
	#gbrmobil{
		width: 90px;
		height: 80px;
	}
</style>

<fieldset>
	<legend style="text-align: left;"><b>Data Mobil</b></legend>
	<div style="margin-bottom:15px;" align="right">
		<form action="" method="POST">
			<input type="text" name="inputan_pencaharian" placeholder="Masukkan Merk / Type mobil ..." style="width:200px; padding:5px;" />
			</select>
			<input type="submit" name="cari_mobil" value="cari" style="padding:3px;"/>

		</form>
	</div>
	<table width="100%" border="1px" cellspacing="0" style="border-collapse:collapse;">
	<tr style="background-color: red;">
			<th>No</th>
			<th>Kode Mobil</th>
			<th>Merk</th>
			<th>Type</th>
			<th>Warna</th>
			<th>Stock</th>
			<th>Harga</th>
			<th>Gambar</th>
			<th colspan="2">opsi</th>
		</tr>
		<?php  
include 'mobil/koneksi.php';
	$no =1;
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
		<td colspan="8" align="center" style="padding:10px;"> Data tidak ditemukan</td>
	</tr>
	<?php  
	} else {
		while ($data=mysql_fetch_array($sql)) {
			?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data[0];?></td>
			<td><?php echo $data[1];?></td>
			<td><?php echo $data[2];?></td>
			<td><?php echo $data[3];?></td>
			<td><?php echo $data[4];?></td>
			<td><?php echo $data[5];?></td>
			<td align="center"><img id="gbrmobil" src="mobil/img/<?php echo $data['gambar'] ?>" width="120px"></td>
			<td align="center">
			<a  href="?page=mobil&action=edit&kode_mobil=<?php echo $data['kode_mobil'];  ?> "><button class="btnedit">Edit</button></a>
			<a  onclick ="return confirm('yakin ingin menghapus data ?')" href="?page=mobil&action=hapus&kdmobil=<?php echo $data['kode_mobil'];?>"><button class="btnhapus">Hapus</button> </a>
		</td>
		</tr>
		<?php
		}
		}?>

	</table>
	<div style="padding-top:10px; ">
	<a href="laporan/cetak.php" target="_blank"><button>Cetak</button></a> 	 
	</div>
</fieldset>