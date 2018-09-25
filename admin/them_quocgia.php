<form action="" method="POST">

		  <div class="form-group">
		    <label>Mã quốc gia:</label>
		    <input type="text" name="ma" class="form-control" placeholder="US">
		  </div>

		  <div class="form-group">
		    <label>Tên quốc gia:</label>
		    <input type="text" name="name" class="form-control" placeholder="Hoa Kỳ " >
		  </div>

		  <button type="submit" name="btn_themquocgia" class="btn btn-default">Thêm  </button>

</form>


<?php 
	if(isset($_POST['btn_themquocgia'])){
		$name = $_POST['name'];
		$ma = $_POST['ma'];
		$sql = "INSERT INTO quocgia values('$ma','$name')";
		$do = mysqli_query($db,$sql);
		if($do){
			echo "Đã thêm";
		}else{
			echo "Thất bại";
		}
	}
 ?>