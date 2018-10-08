<div class="row">

  <div class="col-md-4">
  	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h2>Thêm mới đoàn khách</h2>
	  	

	  	
	  		

	  		<div class="well">
	  			<form method="POST" action="">
	  				<h4>Thêm quốc gia </h4>
				    
				    <div class="input-group">
					    <span class="input-group-addon">Mã QG </span>
					    <input type="text" class="form-control" name="maquocgia">
					  </div>
					  <div class="input-group">
					    <span class="input-group-addon">Tên QG </span>
					    <input type="text" class="form-control" name="tenquocgia">
					  </div>
				  
				    <button type="submit" name="themquociga" class="btn btn-default">Thêm quốc gia</button>
				</form>	
	  		</div>



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
			  <label for="sel1">Ngôn ngữ làm việc chính:</label>
			  <select class="form-control" name="ngonngulamviec">
			    <option value="Tiếng Việt" checked>Tiếng Việt</option>
			    <option value="Tiếng Anh">Tiếng Anh</option>
			    <option value="Tiếng Pháp">Tiếng Pháp</option>
			    <option value="Tiếng Nhật">Tiếng Nhật</option>
			    <option value="Tiếng Hàn">Tiếng Hàn</option>
			    <option value="Tiếng Trung">Tiếng Trung</option>
			  </select>
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

	  	<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>ID </th>
	        <th>Tên đoàn </th>
	        <th>Ngôn ngữ </th>
	        <th>Chi tiết</th>
	      </tr>
	    </thead>
	    <tbody>

	    	<?php 
	  	$listdoan = "select * from doan ORDER BY doan_id DESC limit 0,30";
	  	$querylist = mysqli_query($db,$listdoan);
	  	while($doan = mysqli_fetch_array($querylist)){
	  	$doan_id = $doan['doan_id'];
	  	$doan_ten = $doan['doan_ten'];
	  	$doan_chiphi = $doan['doan_chiphidutru'];
	  	$doan_start = $doan['doan_thoigianden'];
	  	$doan_end = $doan['doan_thoigiandi'];
	  	$doan_ngonngu = $doan['doan_ngonngulamviec'];
	  	?>

	  	   <tr>
	        <td><?=$doan_id?></td>
	        <td><?=$doan_ten?></td>
	        <td><?=$doan_ngonngu?></td>
	        <td><a href="?keyad=chitietdoan.php&doan=<?=$doan_id?>">Chi tiết</a></td>
	      </tr>


	  	<?php } ?>
	      
	      
	    </tbody>
	  </table>
	  	
	  	


	  </div>
	</div>
  </div>


</div>






<?php  
	//XU LY
	if(isset($_POST['btn_themdoan'])){
		$name = $_POST['name'];
		$chiphi = $_POST['chiphi'];

		$ngayden = date('Y-m-d', strtotime($_POST['ngayden']));
		$ngaydi = date('Y-m-d', strtotime($_POST['ngaydi']));
		// $ngayden = $_POST['ngayden'];
		// $ngaydi = $_POST['ngaydi'];

		$ngonngu = $_POST['ngonngulamviec'];

		$id = getNextIDValueByTable(doan,$db);

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


	if(isset($_POST['themquociga'])){
		$ten = $_POST['tenquocgia'];
		$ma = $_POST['maquocgia'];
		$sql = "insert into quocgia values('$ma','$ten')";
		$do = mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Đã thêm');window.location='?keyad=doan.php';</script>";
		}else{
			echo "<script>alert('Lỗi thêm quốc gia 004xx');</script>";
		}
	}

?>