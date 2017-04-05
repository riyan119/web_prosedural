<?php 
class  Database{
	// deklarasi variable 
	// private hanya bisa diakses di class itu sendiri
	// public bisa diakses dimana pun dikelas lain
	// protected hanya bisa di akses di class ini dan turunannya
	// construc adalah function yang diload atau dijalankan pertama kali di jalankan 
	private $host;
	private $user;
	private $pass;
	private $database;
	public $conn;

	function __construct($host, $user, $pass, $database){
		$this->host = $host; /*host ngambil dari objek sementara $host ngambil dari function constract*/
		$this->user = $user;
		$this->pass = $pass;
		$this->database = $database;

		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database) or die(mysql_error());
		if (!$this->conn) {
			return false;
		} else{
			return true;
		}
	}
}

 ?>