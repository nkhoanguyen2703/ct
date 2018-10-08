<?php 
	if(isset($_GET['duan'])){
		$duan_id = $_GET['duan'];

		$sql = "select * from duan where duan_id='$duan_id'";
		$do = mysqli_query($db,$sql);
		$duan = mysqli_fetch_array($do);

	}
?>

<div class="row">

  	<div class="col-md-4">
  	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h2>Chi tiết dự án</h2>
	  	<h3><?=$duan['duan_ten']?></h3>
	  	<h4>Hình thức: <?=$duan['duan_hinhthuc']?></h4>
	  	<h4>Cán bộ quản lý:</h4>
	  	<?php  
	  	$dsCB = "select * from canbo a  join canbo_duan b on a.cb_id=b.cb_id WHERE b.duan_id=".$duan_id;
	  	$dodsCB = mysqli_query($db,$dsCB);
	  	while($canbo=mysqli_fetch_array($dodsCB)){
	  	?>
	  		<li><?=$canbo['cb_ten']?></li>
	  	<?php } ?>
	  	<hr>
	  	<p><b>Nội dung:</b> <?=$duan['duan_noidung']?></p>
	  </div>
	</div>
	</div>



	<div class="col-md-8">
  	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h2>Phân công cán bộ</h2>

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
		        <td><a href="?keyad=chitietduan.php&duan=<?=$duan_id?>&phancongcanbo=<?=$cbid?>">Phân công</a></td>
		      </tr>

		    <?php } ?>
		    </tbody>
		  </table>
	  </div>
	</div>
	</div>


</div><!--row-->


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



<?php  
if(isset($_GET['phancongcanbo'])){
	$cb = $_GET['phancongcanbo'];
	$duan = $_GET['duan'];
	$pc = "INSERT INTO canbo_duan values('$cb',$duan)";
	$dopc = mysqli_query($db,$pc);
	if($dopc){
		echo "<script>alert('Đã phân công');window.location='?keyad=chitietduan.php&duan=$duan';</script>";
	}else{
		echo "<script>alert('Lỗi phân công 200xx');</script>";
	}
}


?>