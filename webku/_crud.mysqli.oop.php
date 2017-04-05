<?php
class CRUD {
	public $connection;
	
	public function __construct($host, $user, $pass, $db)
	{
		$this->connection = new mysqli($host, $user, $pass, $db	);
	}

	public function insert($table, $rows = null){
		$sql = "INSERT INTO $table";
		$row = null;
		$value = null ;
		foreach ($rows as $key => $nilai) {
			$row .= "," .$key;
			$value .= ", '" .$nilai. "' ";
		}
		$sql .= "(". substr($row, 1).")";
		$sql .= "VALUES (" .substr($value, 1).")";
		//echo $sql;
		$query = $this->connection->prepare($sql) or die ($this->connection->error);
		$query->execute();
	}

	public function fetch($table, $ids = null){
		$sql = "SELECT * FROM $table";
		if ($ids != null) {
			$sql .= " WHERE $ids";

		}
		$query = $this->connection->query($sql) or die ($this->connection->error);
		return $query->fetch_all(MYSQLI_BOTH);
	}

	public function update($table, $fild = null, $where = null){
		$sql= "UPDATE $table SET";
		$set =null;
		foreach ($fild as $key => $VALUES) {
			$set .= ", " .$key." = '".$VALUES."'";
		}
		$sql .= substr($set, 1). "WHERE $where";

		//echo $sql;
		$query =$this->connection->prepare($sql) or die ($this->connection->error);
		$query->execute();
	}

	public function delete($table, $where){
		$sql="DELETE FROM $table where $where";
		$this->connection->query($sql) or die($this->connection->error);
	}

	public function __destruct(){
		$this->connection->Close();
	}
}
?>