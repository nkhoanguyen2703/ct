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

	?>