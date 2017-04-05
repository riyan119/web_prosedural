<fieldset>
	<legend>Tambah Data Member</legend>
	<?php
	include 'mobil/koneksi.php';  
	$carikode = mysql_query("select max(kd_login) from tb_login ") or die(mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if ($datakode) {
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode+1;
		$hasilkode = "A".str_pad($kode,4,"0", STR_PAD_LEFT );
	} else {
		$hasilkode = "A0001";
	}
	?>

	<form action="" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Kode Anggota</td>
			<td>:</td>
			<td><input style="width: 60px; text-align: center; padding: 2px; border: 0" type="" name="kd_login" value="<?php echo $hasilkode; ?>" readonly="readonly"/> </td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input maxlength="25" style="width: 200px; padding: 2px; border: 0" name="nama_lengkap" type="text"/> </td>
		</tr>
		<tr>
			<td>User Name</td>
			<td>:</td>
			<td><input maxlength="10" style="width: 120px; padding: 2px; border: 0" name="username" type="text"/> </td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input maxlength="10" style="width: 120px; padding: 2px; border: 0" type="password" name="password"/> </td>
		</tr>
		<tr>
			<td>Level</td>
			<td>:</td>
			<td>
				<select name="level" style="padding: 3px;">
					<option value="">-Pilih-</option>
					<option value="admin">Admin</option>
					<option value="operator">Operator</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="tambah" value="Tambah" />
				<input type="reset" value="batal"/>
			 </td>
		</tr>
	</table>
	</form>
	<?php
	$kd_login = @$_POST['kd_login'];
	$nama_lengkap = @$_POST['nama_lengkap'];
	$username = @$_POST['username'];
	$password = @$_POST['password'];
	$level = @$_POST['level'];
	$tambah_mobil = @$_POST ['tambah'];
	
	if ($tambah_mobil) {
		if ($kd_login==""|| $nama_lengkap==""|| $username==""|| $password=="") {
			?> <script type="text/javascript">alert("Inputan tidak boleh ada yang kosong"); </script>
			<?php
			} else{
				mysql_query("insert into tb_login values ('$kd_login', '$nama_lengkap', '$username', '$password', '$level') ") or die(mysql_error());
					?> 
					<script type="text/javascript">alert("Data berhasil dimasukkan"); 
					window.location.href="?page=member&action=datamember";
					</script>
					<?php
				?>
			<?php
				
				}
			}
			

	?>
</fieldset>