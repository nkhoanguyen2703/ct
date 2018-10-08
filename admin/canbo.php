<div class="row">

<div class="col-md-4">
</div>

<div class="col-md-4">

	<div class="well">
		<h2>Thêm tài khoản cán bộ</h2>
		<form action="" method="POST">

		  <div class="form-group">
		    <label>Mã cán bộ</label>
		    <input type="text" class="form-control" required name="ma">
		  </div>

		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="text" class="form-control" required name="pwd">
		  </div>

		  <div class="form-group">
		    <label for="pwd">Họ tên cán bộ:</label>
		    <input type="text" class="form-control" required name="ten">
		  </div>

		  <div class="form-group">
			  <input type="radio" name="gioitinh" checked value="1"> Nam
			  <input type="radio" name="gioitinh" value="0"> Nữ
		 </div>



		 <div class="form-group">
			 <?php 
			 $listKHOA = "select * from khoa";
			 $doListKhoa = mysqli_query($db,$listKHOA);
			 while($khoa = mysqli_fetch_array($doListKhoa)){
			 	$ma = $khoa['khoa_id'];
			 	$ten = $khoa['khoa_ten'];
			  ?>
			  	<div class="radio">
			  		<label><input type="radio" name="khoa" value="<?=$ma?>"><?=$ten?></label>
			  	</div>
			  <?php 
				}
			   ?>
		 </div>



		  <button type="submit" name="btn_themcanbo" class="btn btn-default">Thêm</button>
		</form>
	</div>
</div>

<div class="col-md-4">
</div>

</div>



<?php 


if(isset($_POST['btn_themcanbo'])){
	$ma = $_POST['ma'];
	$pwd = $_POST['pwd'];
	$pwd = md5($pwd);
	$ten = $_POST['ten'];
	$gioitinh = $_POST['gioitinh'];
	$khoa = $_POST['khoa'];

	$themcanbo = "INSERT INTO canbo values('$ma','$pwd','$ten',$gioitinh,'$khoa')";
	$doThem = mysqli_query($db,$themcanbo);
	if($doThem){
		echo "<script>alert('Đã thêm cán bộ');window.location='?keyad=canbo.php';</script>";
	}else{
		echo "<script>alert('Lỗi thêm cán bộ 100xx');</script>";
	}
}

 ?>