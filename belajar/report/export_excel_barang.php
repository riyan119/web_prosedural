<?php  
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include '../models/m_barang.php';

$connection = new Database($host, $user, $pass, $database);
$brg = new Barang($connection);

$fillname = "excel_barang-(".date('d-m-Y').").xls";

header("Content-Disposition: attachment; filename='$fillname'");
header("Content-Type: application/vnd.ms-excel ");
?>
<h1 style="color:black">Hallo</h1>
<h2>Kemenag</h2>
<table border="1px">
	<tr>
		<td>No.</td>
		<td>Nama Barang</td>
		<td>Harga Barang</td>
		<td>Stok Barang</td>
	</tr>
	
	<?php 
	$no =1;
	$tampil = $brg->tampil();
	while ($data = $tampil->fetch_object()) {
		echo "<tr>";
		echo "<td align=center>".$no++."</td>";
		echo "<td>".$data->nama_brg."</td>";
		echo "<td>".$data->harga_brg."</td>";
		echo "<td>".$data->stok_brg."</td>";
		echo "</tr>";
	}
	 ?>
	 </tr>
</table>