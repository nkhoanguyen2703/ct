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


	function getCanBoNameByID($id,$db){
		$sql = "select cb_ten from canbo where cb_id='$id'";
		$do = mysqli_query($db,$sql);
		$tv = mysqli_fetch_array($do);
		return $tv[0];
	}

	function checkTonTaiTrongDoan($thanhvienID,$doan_id,$db){
		$sql = "select count(*) from doan_thanhvien where doan_id=$doan_id and tv_id=$thanhvienID";
		$do = mysqli_query($db,$sql);
		$kq = mysqli_fetch_array($do);
		if($kq > 0){
			return true;
		}else{
			return false;
		}
	}


?>