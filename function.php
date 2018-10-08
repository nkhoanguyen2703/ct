<?php 

include "database.php";

function getCanBoNameByID($id,$db){
		$sql = "select cb_ten from canbo where cb_id='$id'";
		$do = mysqli_query($db,$sql);
		$tv = mysqli_fetch_array($do);
		return $tv[0];
}

 ?>