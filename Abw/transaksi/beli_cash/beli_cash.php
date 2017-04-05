<style> 
#isimobil, #flip {
    padding: 5px;
    text-align: center;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
}
.ig{
	width: 200px;
}
#isimobil img{
	width: 90px;
	height: 80px;
}
#isimobil {
    display: none;
}
</style>
<div id="beli_cash">
<fieldset style="margin-top: -20px" > <legend><b>Transaksi Beli Cash</b></legend>
	<fieldset style="width: 370px; margin-top:15px; padding-top: 10px;">
	<legend><b>Masukkan Data Pembeli</b></legend>
	<table width="360px">
		<tr>
			<td >No Ktp</td>
			<td>:</td>
			<td><input maxlength="16" style="width: 180px; padding: 2px; border: 0" type="text" id="no_ktp"></input></td>
		</tr>
		<tr>
		<td>Nama Pembeli</td>
		<td>:</td>
		<td><input maxlength="25" style="width: 180px; padding: 2px; border: 0" type="text" id="nama_pembeli"></input></td>
		</tr>
		<tr>
			<td style="vertical-align: top;">Alamat</td>
			<td style="vertical-align: top;">:</td>
			<td><textarea style="width: 200px; padding: 2px; border: 0; height: 90px;" id="alamat"></textarea></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>:</td>
			<td><input maxlength="12" style="width: 180px; padding: 2px; border: 0" type="text" id="telepon"></input></td>
		</tr>
	</table>
	</fieldset>
	<table width="375px" style="margin-top: 15px;">
		<?php  
 	mysql_connect("localhost","root","") or die(mysql_error());
 	mysql_select_db("db_pembelianmobil");
	$carikode = mysql_query("select max(kode_cash) from tb_beli_cash ") or die(mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if ($datakode) {
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode+1;
		$hasilkode = "C".str_pad($kode,4,"0", STR_PAD_LEFT );
	} else {
		$hasilkode = "C0001";
	}
	?>
 	<tr>
 		<td width="100px">No Faktur</td>
 		<td width="5px">:</td>
 		<td><input style="width: 70px; padding: 2px; border: 0" id="kode_cash" disabled value="<?php echo $hasilkode; ?>"></input></td>
 	</tr>
		<tr>
			<td>Pilih Mobil</td>
			<td>:</td>
			<td><button class="btn" id="pilih">Pilih</button></td>
		</tr>
		</table>
		<div id="isimobil" style="width: auto;">
	<table border="1" width="100%">
		<tr>
			<th></th>
			<th>Kode Mobil</th>
			<th>Merk</th>
			<th>Type</th>
			<th>Warna</th>
			<th>Stok</th>
			<th>Harga</th>
			<th>Gambar</th>
		</tr>
		<?php
		$db = new PDO('mysql:host=localhost;dbname=db_pembelianmobil','root','');
		try {
		$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tampil = $db->query("SELECT *FROM tb_mobil");
		while ($data = $tampil->fetch(PDO::FETCH_LAZY)) {
			?>
		<tr>
		
		<td><button class="editdata" id="<?php echo $data[0]; ?>">pilih</button></td>
		<td><?php echo $data[0]; ?></td>
		<td><?php echo $data[1]; ?></td>
		<td><?php echo $data[2]; ?></td>
		<td><?php echo $data[3]; ?></td>
		<td><?php echo $data[4]; ?></td>
		<td><?php echo $data[5]; ?></td>
		<td><img src="mobil/img/<?php echo $data[6]; ?> "> </td>
			<?php
		}
		} catch (Exception $e) {
		echo $e->getmessage();	
		}
		?>
		</tr>
	</table>
	</div>
	<div id="tampil">	
	</div>
		<div id="hilang">
			<table width="375px">
				<tr>
					<td width="100px">Tanggal Beli</td>
					<td width="5px">:</td>
					<td><input style="width: 90px; padding: 2px; border: 0" disabled value="<?php echo date("Y-m-d") ?>"></input></td>
				</tr>
				<tr>
					<td width="100px">Harga Cash</td>
					<td width="5px">:</td>
					<td><input style="width: 180px; padding: 2px; border: 0" disabled></input></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><button id="beli" class="btn">Beli</button></td>
				</tr>
			</table>
		</div>
</fieldset>
</div>
<script type="text/javascript" src="jquery/jquery-1.12.3.js"></script>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $("#pilih").click(function(){
        $("#isimobil").slideToggle("slow");
    });
});

$("#beli").click(function(){
	alert("Anda Belum Memilih Mobil");
	});


	$("#isimobil").on("click", ".editdata", function(){
	var id = $(this).attr("id");
	$.ajax({
		url : 'transaksi/beli_cash/data_mobil.php',
		type : 'post',
		data : 'id='+id,
		success : function(msg){
			$("#isimobil").hide();
			$("#tampil").hide().fadeIn(1000).html(msg);
			$("#hilang").hide();
		}
	});
});

$("#isi").on("click","#tambah",function(){
		var no_ktp = $("#no_ktp").val();
		var nama_pembeli = $("#nama_pembeli").val();
		var alamat = $("#alamat").val();
		var telepon = $("#telepon").val();
		var kode_cash = $("#kode_cash").val();
		var kode_mobil = $("#kode_mobil").val();
		var tgl_cash = $("#tgl_cash").val();
		var cash_bayar = $("#cash_bayar").val();
		var diskon = $("#diskon").val();
		var stok = $("#stok").val();
		var Tbayar = $("#Tbayar").val();

		if (no_ktp ==''||nama_pembeli==''||alamat==''||telepon==''||diskon=='') {
			alert("Data tidak boleh ada yang kosong");
		 }else {
		$.ajax({
				url : 'transaksi/beli_cash/proses.php',
				type : 'post',
				data : 	'no_ktp='+no_ktp+'&nama_pembeli='+nama_pembeli+'&alamat='+alamat+'&telepon='+telepon+'&kode_cash='+kode_cash+'&kode_mobil='+kode_mobil+'&tgl_cash='+tgl_cash+'&cash_bayar='+cash_bayar+'&stok='+stok,
				success : function(msg){
					if (msg=='sukses') {
						$("#isi").load("transaksi/beli_cash/datacash.php");
						alert ("Data berhasil dimasukkan");	
					}else{
						alert("Data Gagal Dimasukkan");
					}
				}
			});
		}
		});
</script>