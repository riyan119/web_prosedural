<style type="text/css">
	#tombol{
	padding: 5px;
	border: 0;
	background-color: #339966;
	border-radius: 5px;
	color: #fff;

}

#tombol:hover {
	background-color: #336666;
	cursor: pointer;
}
</style>
<link rel="stylesheet" type="text/css" href="mobil.css">
<div id="coba">
	<input type="submit" id="tombol" value="tampil"></input>
</div>
<div id="tampil">
	
</div>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
	$("#coba").on("click", "#tombol", function(){
		$("#tampil").load("aku ampaannn");
	});

	$(document).ready(function(){
						$("#simpancash").click(function(){
							$("#isi").load("index.php?page=transaksi&action=belicash ", function(){
							alert ("Data berhasil dimasukkan");	
							});
						});
							
						});
						
</script>