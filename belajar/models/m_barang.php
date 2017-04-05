<?php 
class Barang{ /*objek*/
	// penamaannya atau deklarasi awal atau variabel yang dipakai
	private $mysqli; /*properti*/

	function __construct($conn) {
		$this->mysqli = $conn;
	}	

	public function tampil_tgl($tgl1, $tgl2){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tb_barang WHERE tgl_publish BETWEEN '$tgl1' AND '$tgl2' ";
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}

	public function tampil($id = null) { /*method*/
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tb_barang";
		if($id != null) {
			$sql .= " WHERE id_brg = $id";
		}
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}
	public function tambah($nm_brg, $hrg_brg, $stok_brg, $gbr_brg){
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO tb_barang VALUES ('', '$nm_brg', '$hrg_brg', '$stok_brg', '$gbr_brg', now())") or die ($db->error);
	}

	public function edit($sql){
		$db = $this->mysqli->conn;
		$db->query($sql) or die ($db->error);
	}

	public function hapus($id){
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM tb_barang WHERE id_brg = '$id' ") or die($db->error);
	}

	function __destruct(){
		$db = $this->mysqli->conn;
		$db->close();
	}
}
 ?>