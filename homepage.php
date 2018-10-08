<div class="row">
  <div class="col-md-4">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Đoàn khách</h3>

		  	
			  	<form method="POST" action="?key=chitietdoan.php">
				  <div class="input-group">
				    <input type="text" class="form-control" name="tendoan" placeholder="Tìm đoàn khách">
				    <div class="input-group-btn">
				      <button class="btn btn-default" name="timdoankhach" type="submit">
				        <i class="glyphicon glyphicon-search"></i>
				      </button>
				    </div>
				  </div>
				</form>
			
			<br>


		  	<?php 
		  	$sql = "select * from doan order by doan_id DESC limit 0,20";
		  	$do = mysqli_query($db,$sql);
		  	while($doan = mysqli_fetch_array($do)){
		  		$id = $doan['doan_id'];
		  		$ten = $doan['doan_ten'];
		  		$start = $doan['doan_thoigianden'];
		  		$end = $doan['doan_thoigiandi'];
		  		$ngonngu = $doan['doan_ngonngulamviec'];
		  	?>

		  	<div class="well">
		  		<h4><?=$ten?></h4><br>
		  		<?=date("d-m-Y", strtotime($start))?><br>
		  		<?=$end?><br>
		  		<?=$ngonngu?>
		  		<p>Đến từ: Hoa Kỳ, Pháp</p>
		  	</div>

		  	<?php } ?>

		  </div>
		</div>
  </div>





  <div class="col-md-4">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Dự án</h3>

		  	<?php 
		  	$sql = "select * from duan order by duan_id DESC limit 0,20";
		  	$do = mysqli_query($db,$sql);
		  	while($duan = mysqli_fetch_array($do)){
		  		$id = $duan['duan_id'];
		  		$ten = $duan['duan_ten'];
		  		$ht = $duan['duan_hinhthuc'];
		  		$trangthai = $duan['trangthai'];
		  		if($trangthai==1){
		  			$tt = "Đã hoàn thành";
		  		}else{
		  			$tt = "Đang thực hiện";
		  		}
		  	 ?>
		  	
		  	<a href="?key=duan.php&duan=<?=$id?>">
		  	<div class="well">
		  		<h4><?=$ten?></h4>
		  		<h5><?=$ht?></h5>
		  		<h5><?=$tt?></h5>
		  	</div>
		  	</a>

		  	<?php 
		  	}
		  	 ?>

		  </div>
		</div>
  </div>






  <div class="col-md-4">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Tin tức</h3>
		  	<?php 
		  	$sql = "select * from tintuc order by tt_id DESC limit 0,15";
		  	$do = mysqli_query($db,$sql);
		  	while($tt = mysqli_fetch_array($do)){
		  		$id = $tt['tt_id'];
		  	 ?>
		  	 	<div class="panel panel-default">
				  <div class="panel-body">

				  	<a href='?key=tintuc.php&tintuc=<?=$id?>'>
				  	<img style="width: 100%;" src="images/tintuc/<?=$tt['tt_hinhanh']?>"/>
				  	<h6><?=$tt['tt_ten']?></h6>
				  	</a>
				  	
				  </div>
				</div>
		  	<?php } ?>
		  </div>
		</div>
  </div>
</div>














