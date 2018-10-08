<?php 
	if(isset($_GET['duan'])){
		$duan = $_GET['duan'];

		$sql = "select * from duan where duan_id='$duan'";
		$do = mysqli_query($db,$sql);
		$tin = mysqli_fetch_array($do);

		$ten = $tin['duan_ten']; 
		$ht = $tin['duan_hinhthuc'];
		$nd = $tin['duan_noidung'];
		$tt = $tin['duan_trangthai'];
		if($tt==1){
		  			$tt = "Đã hoàn thành";
		  		}else{
		  			$tt = "Đang thực hiện";
		  		}
	}



?>


<div class="panel panel-default">
  <div class="panel-heading">
  	<h3><?=$ten?> </h3>
  	Hình thức: <?=$ht?><br>
  		Trạng thái: <?=$tt?>
  </div>
  <div class="panel-body">
  	

  <?=$nd?>
  	
  </div>
</div>
