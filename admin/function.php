<?php 
	include "../database.php";

	function getNextIDValueByTable($tablename,$db){
		include "../database.php";
		$sql2 = "SELECT AUTO_INCREMENT
		FROM information_schema.tables
		WHERE table_name = '".$tablename."'
		AND table_schema = DATABASE( ) ";
		$do=mysqli_query($db,$sql2);
		$x = mysqli_fetch_array($do);
		$nextID = $x[0];
		return $nextID;
	}

	function tim_passport($id,$db){ //return true if have
		
		$sql = "select count(*) from passport where pp_id='$id'";
		$do = mysqli_query($db,$sql);
		$result = mysqli_fetch_array($do);
		$count = $result[0];
		if($count > 0){
			return true;
		}else{
			return false;
		} 
	}
	
	function getThanhVienIdByPassport($pp,$db){
		$sql = "select tv_id from passport where pp_id='$pp'";
		$do = mysqli_query($db,$sql);
		$tv = mysqli_fetch_array($do);
		return $tv[0];
	}
?>