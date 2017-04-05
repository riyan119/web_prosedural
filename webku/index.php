<?php
include "_crud.mysqli.oop.php";
$crud = new CRUD ("localhost", "root", "","db_crud_mysqli");
@session_start();
if (@$_SESSION['user']) {
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  href='css/materialize.css'/>
</head>
<body>
<nav class="light-blue lighten-1" role="navigation">
	<div class="nav-wrapper container"> <a id="logo-container" href="./" class="brand-logo">Riyan's Web </a>
		<ul class="right hide-on-med-and-down">
			<li><a class="waves-effect waves-light" href="?page=tampil">Lihat Data</a></li>
			<li><a class="waves-effect waves-light" href="?page=tambah">Tambah Data</a></li>
			<li><a class="waves-effect waves-light" href="logout.php">Logout</a></li>
		</ul>
		<ul id="nav-mobile" class="side-nav">
			<li><a href="?page=tampil">Lihat Data</a></li>
			<li><a href="?page=tambah">Tambah Data</a></li>
			<li><a href="logout.php">Logout</a></li>
	</ul>
<a href="#" data-activates="nav-mobile" class="button-collapse" > <i class="mdi-navigation-menu" ></i> </a>
</div>
</nav>
<div class="container z-depth-1" style="min-height:560px;">
	<div class="section">
		<?php
		if (@$_GET['page']==''){
			echo "<title> Halaman Utama </title>";
			echo "Selamat Datang Di Halaman Utama";
		}
		else if (@$_GET['page']=='tampil') {
			?>
			<title>tampil data</title>
			<h5 class="blue-text"> Data Anggota</h2>
			<div class="row">
				<table  class="col 12 striped">
					<thead>
						<tr class="blue lighten-3">
							<th>No</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>No. Telepon</th>
							<th>Opsi</th>
						</tr>
					</thead>
<tbody>
<?php
$no = 1 ;
$row = $crud->fetch("tb_anggota");
foreach ($row as $data) {

?>
	<tr>
		<td> <?php echo $no++; ?> </td>
		<td><?php echo $data ['nama']; ?> </td>
		<td><?php echo $data ['jk']; ?></td>
		<td><?php echo $data ['alamat']; ?></td>
		<td><?php echo $data ['telp']; ?></td>
		<td width="100px" align="center">
		<a href="?page=edit&id=<?php echo $data ['id']; ?>" class="btn-floating waves-effect waves-light orange" > <i class="mdi-editor-mode-edit" ></i></a>
		<a onclick="return confirm ('anda yakin ingin mengahapus data ini?');" href="?page=hapus&id=<?php echo $data['id']; ?>" class="btn-floating waves-effect waves-light red"><i class="mdi-action-delete"></i></a>
		</td>
	</tr>
<?php
}
?>

</tbody>
				</table>
			</div>
			<?php
		} else if (@$_GET['page'] == 'tambah') {
			include "tambah.php";
		} else if (@$_GET['page'] == 'edit') {
			include "edit.php";
		} else if (@$_GET['page'] == 'hapus') {
			$id = @$_GET['id'];
			$crud->delete("tb_anggota", "id='$id'");
			header("location:?page=tampil");
		}
		?>
	</div>
</div>
<script type="text/javascript" src='js/jquery.js'></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/init.js"></script>
</body>
</html>
<?php
} else {
	header("location:masuk.php");
}
?>