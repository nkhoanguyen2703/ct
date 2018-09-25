<form method="POST">
	<input type="text" placeholder="manhanvien" name="manhanvien"/>
	<input type="password" placeholder="matkhau" name="matkhau"/>
	<input type="text" placeholder="tennhanvien" name="tennhanvien"/>

	<input type="submit" value="Add" name="btnAddNV"/>
</form>

<?php
	include "../database.php";
	if(isset($_POST['btnAddNV'])){
		$ma=$_POST['manhanvien'];
		$ten=$_POST['tennhanvien'];
		$pwd=$_POST['matkhau'];
		$pwd=md5($pwd);

		$sql="insert into admin values('$ma','$pwd','$ten')";
		$do=mysqli_query($db,$sql);
		if($do){
			echo "Added";
		}else echo "Failed";
	}
?>