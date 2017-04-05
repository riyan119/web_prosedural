<?php
$db = new mysqli("localhost", "root", "", "db_test");
@session_start();
?>
<html>
<head>
	<title> Halaman Login	</title>
<style type="text/css">
body{
	font-family: arial;
	font-size: 14px;
	background-color: #222;
}

#utama {
	width: 300px;
	margin: 0 auto;
	margin-top: 12%;
}

#judul {
	padding : 15px;
	text-align: center;
	color: #fff;
	font-size: 20px;
	background-color: #339966;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	border-bottom: 3px solid #336666;
	
}

#inputan {
	background-color: #eaeaec;
	padding: 20px;
	border-bottom-right-radius: 10px;
	border-bottom-left-radius: 10px;
}

input {
	padding: 10px;
	border: 0;
}

.ig{
	width: 240px;
}

.btn{

	background-color: #339966;
	border-radius: 10px;
	color: #fff;

}

.btn:hover {
	background-color: #336666;
	cursor: pointer;
}
</style>	
</head>
<body>
<div id="utama">
	<div id="judul">
		Halaman Login
	</div>
	<div id="inputan">
		<form  method="POST" >
			<div>
				<input type="text" name="user" placeholder="Nama Kamu" class="ig"/>
			</div>
			<div style="margin-top:10px">
				<input type="text" name="pass" placeholder="Kata Sandi Kamu" class="ig"/>
			</div>
			<div style="margin-top :10px">
				<input type="button" name="login" value="login" class="btn">
			</div>
		</form>

		<?php
		if (@$_POST['login']) {
			$user = @$_POST['user'];
			$pass = @$_POST['pass'];
			if ($user == '' || $pass=='') {
				?>
				<script type="text/javascript">alert("Username / password tidak boleh kosong"); </script>
				<?php
				} else {
					echo "lanjut proses";
				}
			}
		
		?>
	</div>
</div>
</body>
</html>

