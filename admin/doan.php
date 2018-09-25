<div class="row">

  <div class="col-md-4">
  	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h2>Thêm mới đoàn khách</h2>
	  	

	  	<form action="" method="POST">
	  		<label>Đoàn đến từ quốc gia:</label><br>
	  		<?php 
	  		$sql = "select * from quocgia";
	  		$do = mysqli_query($db,$sql);

	  		while($quocgia = mysqli_fetch_array($do)){
	  			$qgid = $quocgia['qg_id'];
	  			$qgten = $quocgia['qg_ten'];
	  		 ?>
	  		 <input type="checkbox" name="check_list[]" value="<?=$qgid?>"><label> <?=$qgten?></label><br/>
	  		 <?php  
	  		}
	  		 ?>
	  		
	  		

		  <div class="form-group">
		    <label>Tên đoàn:</label>
		    <input type="text" name="name" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>Chi phí dự trù:</label>
		    <input type="number" name="chiphi" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>Ngày đến</label>
		    <input type="date" name="ngayden" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>Ngày đi:</label>
		    <input type="date" name="ngaydi" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>Ngôn ngữ làm việc chính:</label>
		    <div class="radio">
			  <label><input type="radio" value="Tiếng Việt " name="optradio" checked>Tiếng Việt </label>
			</div>
			<div class="radio">
			  <label><input type="radio" value="Tiếng Anh " name="optradio">Tiếng Anh</label>
			</div>
			<div class="radio">
			  <label><input type="radio" value="Tiếng Pháp " name="optradio">Tiếng Pháp </label>
			</div>
			<div class="radio">
			  <label><input type="radio" value="Tiếng Nhật " name="optradio">Tiếng Nhật</label>
			</div>
			<div class="radio">
			  <label><input type="radio" value="Tiếng Hàn Quốc " name="optradio">Tiếng Hàn Quốc</label>
			</div>
			<div class="radio">
			  <label><input type="radio" value="Tiếng Trung " name="optradio">Tiếng Trung </label>
			</div>
		  </div>
		  
		  <button type="submit" name="btn_themdoan" class="btn btn-default">Thêm đoàn </button>
		</form>

	  </div>
	</div>
  </div>

  <div class="col-md-8">
  	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h2>Danh sách đoàn khách</h2>
	  	<h4>21 đoàn khách gần nhất</h4>

	  	<?php 
	  	$listdoan = "select * from doan ORDER BY doan_id DESC limit 0,21";
	  	$querylist = mysqli_query($db,$listdoan);
	  	while($doan = mysqli_fetch_array($querylist)){
	  	$doan_id = $doan['doan_id'];
	  	$doan_ten = $doan['doan_ten'];
	  	$doan_chiphi = $doan['doan_chiphidutru'];
	  	$doan_start = $doan['doan_thoigianden'];
	  	$doan_end = $doan['doan_thoigiandi'];
	  	$doan_ngonngu = $doan['doan_ngonngulamviec'];
	  	?>
	  		<div class="col-md-4">
	  		<div class="well">
	  			<li><b><?=$doan_ten?></b></li>
	  			<li>Chi phí: <?=$doan_chiphi?></li>
	  			<li>Ngày đến: <?=$doan_start?></li>
	  			<li>Ngày đi: <?=$doan_end?></li>
	  			<a href="?keyad=chitietdoan.php&doan=<?=$doan_id?>">Chi tiết</a>
	  		</div>
	  		</div>
	  	<?php } ?>
	  	


	  </div>
	</div>
  </div>


</div>






<?php  
	if(isset($_POST['btn_themdoan'])){
		$name = $_POST['name'];
		$chiphi = $_POST['chiphi'];

		$ngayden = date('Y-m-d', strtotime($_POST['ngayden']));
		$ngaydi = date('Y-m-d', strtotime($_POST['ngaydi']));
		// $ngayden = $_POST['ngayden'];
		// $ngaydi = $_POST['ngaydi'];

		$ngonngu = $_POST['optradio'];
		$id = getNextIDValueByTable(doan,$db);
		echo "NEXT IS:".$id;
		if(!empty($_POST['check_list'])){
			$sql = "INSERT INTO doan values($id,'$name',$chiphi,'$ngayden','$ngaydi','$ngonngu')";
			$do = mysqli_query($db,$sql);
			if($do){
				$check = 1;
				foreach($_POST['check_list'] as $qg_id){
					$qr = "INSERT INTO doan_quocgia values($id,'$qg_id')";
					$do2 = mysqli_query($db,$qr);
					if(!$do2){
						$check = 0;
					}
				}
				if($check == 1){
					echo "<script>alert('Đã thêm');window.location='?keyad=doan.php';</script>";
				}
				echo "<script>alert('Lỗi quốc gia 002xx');</script>";
			}else{
				echo "<script>alert('Lỗi thêm đoàn 001xx');</script>";
			}
			
		}else{
			echo "<script>alert('Chưa chọn quốc gia');</script>";
		}
		
	}

?>