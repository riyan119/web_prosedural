<?php
$db = new PDO('mysql:host=localhost;dbname=db_pembelianmobil','root','');
$id = @$_POST['id'];
$tampil = $db->query("SELECT *FROM tb_mobil where kode_mobil='$id' ");
$data = $tampil->fetch(PDO::FETCH_OBJ);
?>

<table width="375px">
	<tr>
		<td width="100px"></td>
		<td width="5px"></td>
		<td>
			<table width="100%">
<tr>
	<td width="70px">Kode Mobil</td>
	<td width="5px">:</td>

	<td><input readonly style="width: 90px; padding: 2px; border: 0" id="kode_mobil" value="<?php echo $data->kode_mobil; ?>"></input></td>
</tr>
<tr>
	<td width="70px">Mobil</td>
	<td width="5px">:</td>
	<td><label><?php echo $data->merk." ".$data->type." ".$data->warna; ?></label></td>
</tr>
<tr>
	<td width="70px">Stok Mobil</td>
	<td width="5px">:</td>
	<td> <label id="stok"><?php echo $data->stok; ?></label>
</tr>
</table>
		</td>
	</tr>
	<tr>
		<td>Tanggal beli</td>
		<td>:</td>
		<td><input style="width: 90px; padding: 2px; border: 0" id="tgl_cash" disabled type="text" value="<?php echo date('Y-m-d') ?>"></input></td>
	</tr>
	<tr>
		<td>Harga Mobil</td>
		<td>:</td>
		<td><input style="width: 100px; padding: 2px; border: 0" readonly id="cash_bayar" value="<?php echo $data->harga_mobil; ?>"></input></td>
	</tr>
	<tr>
		<td>Bayar</td>
		<td>:</td>
		<td><input maxlength="11" style="width: 120px; padding: 2px; border: 0" id="diskon" type="text"></input></td>
	</tr>
	<tr>
		<td>Sisa Bayar</td>
		<td>:</td>
		<td><input style="width: 120px; padding: 2px; border: 0" disabled id="Tbayar"></input></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><button class="btn" id="tambah">Beli</button></td>
	</tr>
</table>
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
            $('#diskon').keyup(function(){
            <!-- Ambil nilai bayar dan diskon !-->
            var bayar=parseInt($('#cash_bayar').val());
            var diskon=parseInt($('#diskon').val());
 
            <!-- Perhitungan bayar-(diskon) !-->
            var total_bayar=diskon-(bayar);
            $('#Tbayar').val(total_bayar);
            });
        });
</script>