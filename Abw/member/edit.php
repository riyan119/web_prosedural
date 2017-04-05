<?php  
include 'mobil/koneksi.php';
	$kd_login = @$_GET['kd_login'];
	$sql = mysql_query("select * from tb_login where kd_login = '$kd_login' ") or die(mysql_error());
	$data = mysql_fetch_array($sql);
	?>
<fieldset style="width: 370px; padding-top: 10px;">
	<legend><b>Masukkan Data Anggota</b></legend>
	<form action="" method="POST">
	<table width="360px">
		<tr>
			<td >Kode Anggota</td>
			<td>:</td>
			<td><input readonly value="<?php echo $data[0] ?>" style="width: 180px; padding: 2px; border: 0" type="text" name="kd_login"></input></td>
		</tr>
		<tr>
		<td>Nama Anggota</td>
		<td>:</td>
		<td><input maxlength="25" value="<?php echo $data[1] ?>" style="width: 180px; padding: 2px; border: 0" type="text" name="nama_lengkap"></input></td>
		</tr>
		<tr>
		<td>User Name</td>
		<td>:</td>
		<td><input maxlength="10" value="<?php echo $data[2] ?>" style="width: 180px; padding: 2px; border: 0" type="text" name="username"></input></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input maxlength="10" name="password" value="<?php echo $data[3] ?>" style="width: 180px; padding: 2px; border: 0" type="password" id="password"></input></td>
		</tr>
		<tr>
			<td>Level</td>
			<td>:</td>
			<td>
				<select name="level" style="padding: 3px">
					<option value="admin">Admin</option>
					<option value="operator" <?php if($data[4] == 'operator'){echo "selected";} ?>>Operator</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button type="submit" name="create" value="create">Ubah</button></td>
		</tr>
	</table>
	</form>
	<?php
if (isset($_POST['create'])) {
	include 'mobil/koneksi.php';
	$kd_login = @$_POST['kd_login'];
	$nama_lengkap = @$_POST['nama_lengkap'];
	$username = @$_POST['username'];
	$password = @$_POST['password'];
	$level = @$_POST['level'];

	$input = mysql_query("UPDATE tb_login SET nama_lengkap = '$nama_lengkap' , username = '$username' , password = '$password', level = '$level' WHERE kd_login = '$kd_login' ");
	if ($input) {
		header("location:?page=member&action=datamember");
	} else{
		echo "Data is valid!";
	}
}
?>
	</fieldset>