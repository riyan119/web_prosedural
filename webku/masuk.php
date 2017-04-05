<?php
$db = new mysqli("localhost", "root", "", "db_crud_mysqli");
@session_start();

if (@$_SESSION['user']) {
	header("location:/webku");
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title> Halaman Login </title>
	<link rel="stylesheet"  href='css/materialize.css'/>
	<style type="text/css">
	.input-field label,
	.input-field .prefix {
		color: #000;
	}
	.input-field input[type=text]:focus + label,
	.input-field input[type=password]:focus + label,
	.input-field .prefix.active {
		color: #ff9800;
	}
	.input-field input[type=text]:focus,
	.input-field input[type=password]:focus {
		border-bottom: 1px solid #ff9800;
		box-shadow: 0 1px 0 0 #ff9800;
	}
	input[type=submit]{
		color: #fff;
		background-color: #000;
	}
	input[type=submit]:hover{
		background-color: #ff9800;
	}
	.mepet {margin-bottom: 0; }
	</style>
</head>
<body>
<div class="row" style="margin-top: 7%;">
	<div class="col 14 m6 s12 offset-14 offset-m3">
		<h3 class="center">Halaman <span class="orange-text">Login</span></h3>
		
				<form method="post" class="col s12">
				<div class="card z-depth-4">
			<div class="card-content">
					<div class="mepet mepet">
						<div class="input-field col s12">
							<i class="mdi-action-account-circle prefix"></i>
							<input type="text" name="user">
							<label>User Name</label>
						</div>
					</div>
					<div class="row mepet">
						<div class="input-field col s12">
							<i class="mdi-action-lock prefix"></i>
							<input type="password" name="pass">
							<label>Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
						<input type="submit" name="login"" value="login" class="btn-right">
						</div>
					</div>
					</div>
					</div>
				</form>
<?php 
if (@$_POST['login']) {
	$user = @$_POST['user'];
	$pass = @$_POST['pass'];
	if ($user == "" || $pass == "") {
		?>
		<script type="text/javascript"> alert("Username / password tidak boleh kosong harap di isi kembali"); </script>
		<?php
	} else {
		$log= $db->prepare("SELECT * FROM tb_login where username = ? and password = md5(?)") or die ($db->error);
		$log->bind_param('ss', $user, $pass);
		$log->execute();
		$log->store_result();
		$cek = $log->num_rows;
		$log->bind_result($id, $username, $password, $nama_lengkap);
		$log->fetch();
		if ($cek > 0) {
			@$_SESSION['user'] = $username;
			header("location:../webku");
		} else {   
		?>
<script type="text/javascript"> alert("login gagal, Mohon di isi kembali");</script>
<?php
	
}
}
}	
?>
			
	</div>
	
</div>
<script type="text/javascript" src='js/jquery.js'></script>
<script type="text/javascript" src='js/materialize.js'></script>
</body>
</html>
<?php
}
?>