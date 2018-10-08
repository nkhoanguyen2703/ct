<?php 
	if(isset($_GET['doan'])){
		$doan_id = $_GET['doan'];

		$sql = "select * from doan where doan_id='$doan_id'";
		$do = mysqli_query($db,$sql);
		$doan = mysqli_fetch_array($do);
		$doan_ten = $doan['doan_ten'];
	}
?>

<div class="row">

  	<div class="col-md-6">
	  <div class="well">
	  		  	
			  	<h2>Danh sách cán bộ </h2>

			  	<input class="form-control" id="myInput" type="text" placeholder="Search..">
				  <br>
				  <table class="table table-bordered table-striped">
				    <thead>
				      <tr>
				        <th>Mã </th>
				        <th>Tên</th>
				        <th>Giới tính</th>
				        <th>Khoa</th>
				        <th>Phân công</th>
				      </tr>
				    </thead>
				    <tbody id="myTable">

				    <?php  
				    $listCanBo = "select * from canbo cb join khoa k on cb.khoa_id=k.khoa_id";
				    $doListCB = mysqli_query($db,$listCanBo);
				    while($CB = mysqli_fetch_array($doListCB)){
				    	$cbid = $CB['cb_id'];
				    ?>
				      <tr>
				        <td><?=$cbid?></td>
				        <td><?=$CB['cb_ten']?></td>
				        <td>
				        	<?php if($CB['cb_gioitinh'] == 1){ echo "Nam";}else{ echo "Nữ";} ?>

				        </td>
				        <td><?=$CB['khoa_ten']?></td>
				        <td><a href="?keyad=congviec.php&doan=<?=$doan_id?>&sxcanbo=<?=$cbid?>">Phân công</a></td>
				      </tr>

				    <?php } ?>
				    </tbody>
				  </table>
			 
	  </div>
  	</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keydown", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>








  	<div class="col-md-6">
  	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h2>Sắp xếp công việc <?=$doan_ten?></h2>

	  	<form action="" method="POST">
	  	<label>Cán bộ thực hiện :</label><br>
	  	<?php 
	  	foreach($_SESSION["listcb"] as $key=>$row){
			echo $row['canbo_id']."-";
			echo getCanBoNameByID($row['canbo_id'],$db)."<br>";
		}
	  	 ?>
		  <div class="form-group">
		    <label>Tên công việc:</label>
		    <input type="text" name="cv" class="form-control" >
		  </div>

		  <div class="form-group">
		  <label for="sel1">Loại công việc :</label>
		  <select class="form-control" name="loaicongviec">
		  <?php  
		  $listLCV = "select * from loaicongviec";
		  $doit = mysqli_query($db,$listLCV);
		  while($loai = mysqli_fetch_array($doit)){
		  ?>
		    <option value="<?=$loai['loaicv_id']?>"><?=$loai['loaicv_ten']?></option>
		  <?php } ?>  
		  </select>
			</div>

		  <div class="form-group">
		    <label>Nội dung chi tiết:</label>
		    <textarea name="noidung" class="form-control" rows="8"></textarea>
		  </div>

		  <div class="form-group">
		    <label>Thời gian bắt đầu </label>
		    <input type="datetime-local" placeholder="2018-09-26 00:00:00" name="batdau" class="form-control" >
		  </div>

		  <div class="form-group">
		    <label>Thời gian kết thúc </label>
		    <input type="datetime-local" name="ketthuc" class="form-control" >
		  </div>

		  <div class="form-group">
		    <label>Chi phí dự tính</label>
		    <input type="number" name="chiphi" class="form-control" >
		  </div>

		  <div class="form-group">
		    <label>Địa điểm :</label>
		    <input type="text" name="diadiem" class="form-control" >
		  </div>

		  <button type="submit" name="btn_themCV" class="btn btn-default">Thêm công việc </button>
		  </form>    
	  </div>
	</div>
  	</div>


  	

</div>





<?php  
	if(isset($_GET['sxcanbo'])){
		$cbid = $_GET['sxcanbo'];

		$canbo = array("canbo_id"=>"$cbid");

		$_SESSION['listcb'][$cbid] = $canbo;
		echo "<script>window.location='?keyad=congviec.php&doan=$doan_id';</script>";
	}


	if(isset($_POST['btn_themCV'])){
		//them dia diem
		$diadiem = $_POST['diadiem'];
		$diadiem_id = getNextIDValueByTable(diadiem,$db);
		$sql1 = "insert into diadiem values($diadiem_id,'$diadiem')";
		$do1 = mysqli_query($db,$sql1);
		if(!$do1){
			echo "<script>alert('Thất bại 0041x');</script>";
		}
		
		//them cong viec
		$ten = $_POST['cv'];
		$loai = $_POST['loaicongviec'];
		$noidung = $_POST['noidung'];
		$cvid = getNextIDValueByTable(congviec,$db);
		$sql2 = "insert into congviec values($cvid,'$ten','$noidung',$loai)";
		$do2 = mysqli_query($db,$sql2);
		if(!$do2){
			echo "<script>alert('Thất bại 0042x');</script>";
		}

		//them THUC HIEN
		// $batdau = date('Y-m-d', strtotime($_POST['batdau']));
		// $ketthuc = date('Y-m-d', strtotime($_POST['ketthuc']));
		$batdau = $_POST['batdau'];
		$ketthuc = $_POST['ketthuc'];
		$chiphi = $_POST['chiphi'];
			//$doan_id
		$check = 1;
		
		foreach($_SESSION["listcb"] as $key=>$row){
			$canboid =  $row['canbo_id'];
			$sql3 = "insert into thuchien values('','$batdau','$ketthuc',$chiphi,$diadiem_id,$cvid,'$canboid',$doan_id)";
			$thuchien = mysqli_query($db,$sql3);
			if(!$thuchien){
				$check = 0;
			}
		}

		if($check == 1){
			echo "<script>alert('Đã sắp xếp');window.location='?keyad=congviec.php&doan=$doan_id';</script>";
			unset($_SESSION['listcb']);
		}else{
			echo "<script>alert('Thất bại 004xx');</script>";
		}

		


	}
	
	

	
?>