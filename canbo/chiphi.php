<?php  

	if(isset($_GET['doan'])){
		$doanID = $_GET['doan'];
		$sql = " select * from doan where doan_id=$doanID";
		$do = mysqli_query($db,$sql);
		$doan = mysqli_fetch_array($do);
		
	}
?>
<div class="row">

  <div class="col-md-6">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  <h3>Cập nhật chi phí nơi ở</h3>
		  <h4><?=$doan['doan_ten']?></h4>

			  <form action="" method="POST">
			  <div class="form-group">
			    <label>Nơi ở</label>
			    <input type="text" name="noio"  class="form-control">
			  </div>
			  <div class="form-group">
			    <label>Địa chỉ</label>
			    <input type="text" name="diachi"  class="form-control">
			  </div>
			  <div class="form-group">
			    <label>Chi phí:</label>
			    <input type="number" name="chiphi" class="form-control">
			  </div>
			 
			  <button type="submit" name="btn_chiphinoio" class="btn btn-default">Thêm</button>
			</form>

			<hr>
			<div class="table-responsive">          
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Nơi ở</th>
			        <th>Địa chỉ</th>
			        <th>Chi phí</th>
			      </tr>
			    </thead>
			    <tbody>

			    <?php  
			    $sql = "select * from noio a join chiphinoio b on a.noio_id=b.noio_id where b.doan_id=$doanID";
			    $do = mysqli_query($db,$sql);
			    while($n = mysqli_fetch_array($do)){
			    ?>

			      <tr>
			        <td><?=$n['noio_ten']?></td>
			        <td><?=$n['noio_diachi']?></td>
			        <td><?=$n['chiphi']?></td>
			      </tr>

			    <?php 
			    } 
			    ?> 

			    </tbody>
			  </table>
			  </div>


		  </div>
		</div>
	</div>



	 <div class="col-md-6">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  <h3>Cập nhật chi phí quà lưu niệm</h3>
		  <h4><?=$doan['doan_ten']?></h4>

		  <form action="" method="POST">
		  <div class="form-group">
		    <label>Tên quà</label>
		    <input type="text" name="tenqua" class="form-control">
		  </div>
		  <div class="form-group">
		    <label>Số lượng:</label>
		    <input type="number" name="sl" class="form-control">
		  </div>
		  <div class="form-group">
		    <label>Giá / 1 đơn vị:</label>
		    <input type="number" name="gia" class="form-control">
		  </div>
		 
		  <button type="submit" name="btn_qualuuniem" class="btn btn-default">Thêm</button>
		</form>


		<div class="table-responsive">          
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Tên quà</th>
			        <th>Giá / 1 đơn vị</th>
			        <th>Số lượng</th>
			      </tr>
			    </thead>
			    <tbody>

			    <?php  
			    $sql = "select * from qualuuniem a join chiphiqua b on a.qua_id=b.qua_id where b.doan_id=$doanID";
			    $do = mysqli_query($db,$sql);
			    while($n = mysqli_fetch_array($do)){
			    ?>

			      <tr>
			        <td><?=$n['qua_ten']?></td>
			        <td><?=$n['qua_gia']?></td>
			        <td><?=$n['soluong']?></td>	
			      </tr>

			    <?php 
			    } 
			    ?> 

			    </tbody>
			  </table>
		</div>


		  </div>
		</div>
</div>


<?php 

if(isset($_POST['btn_chiphinoio'])){
	$noio = $_POST['noio'];
	$dc = $_POST['diachi'];
	$cp = $_POST['chiphi'];

	$noio_id = getNextIDValueByTable(noio,$db);
	$sql="insert into noio values($noio_id,'$noio','$dc')";
	$do = mysqli_query($db,$sql);
	if($do){
		$sql2 = "insert into chiphinoio values($doanID,$noio_id,$cp)";
		$do2 = mysqli_query($db,$sql2);
		echo "<script>alert('Đã thêm');window.location='?keycb=chiphi.php&doan=$doanID';</script>";
	}else{
		echo "<script>alert('Lỗi noio_id 9991');window.location='?keycb=chiphi.php&doan=$doanID';</script>";
	}
}



if(isset($_POST['btn_qualuuniem'])){
	$tenqua = $_POST['tenqua'];
	$sl = $_POST['sl'];
	$gia = $_POST['gia'];

	$quaid = getNextIDValueByTable(qualuuniem,$db);
	$sql = "insert into qualuuniem values($quaid, '$tenqua',$gia)";
	$do = mysqli_query($db,$sql);
	if($do){
		$sql2 = "insert into chiphiqua values($doanID,$quaid,$sl)";
		$do2 = mysqli_query($db,$sql2);
		echo "<script>alert('Đã thêm');window.location='?keycb=chiphi.php&doan=$doanID';</script>";
	}else{
		echo "<script>alert('Lỗi thêm quà 9992');window.location='?keycb=chiphi.php&doan=$doanID';</script>";
	}
}




 ?>