<?php 
	if(isset($_GET['tintuc'])){
		$tintuc = $_GET['tintuc'];

		$sql = "select * from tintuc where tt_id='$tintuc'";
		$do = mysqli_query($db,$sql);
		$tin = mysqli_fetch_array($do);

		$ten = $tin['tt_ten']; 
		$nd = $tin['tt_noidung'];
		$time = $tin['tt_thoigian'];
		$cb = $tin['cb_id'];
		$nameCB = getCanBoNameByID($cb,$db);
	}

?>



<div class="panel panel-default">
  <div class="panel-heading">
  	<h3><?=$ten?> </h3>
  	<p>Đăng bởi: <?=$nameCB?>, <?=$time?></p>
  </div>
  <div class="panel-body noidungtintuc" ><?=$nd?></div>
</div>
