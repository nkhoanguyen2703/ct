<?php 
	if(isset($_GET['cv'])){
		$cvid = $_GET['cv'];
	}
	if(isset($_GET['doan'])){
		$doan = $_GET['doan'];
		$sql = "select * from doan where doan_id=$doan";
		$do = mysqli_query($db,$sql);
		$d = mysqli_fetch_array($do);


	}
?>
<div class="row">

  <div class="col-md-6">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  <h3>Thông tin đoàn</h3>
		  <div class="well">
		  	Tên: <?=$d['doan_ten']?><br>
		  	Chi phí dự trù: <?=$d['doan_chiphidutru']?><br>
		  	Thời gian đến: <?=$d['doan_thoigianden']?><br>
		  	Thời gian đi: <?=$d['doan_thoigiandi']?><br>
		  	Ngôn ngữ: <?=$d['doan_ngonngulamviec']?>
		  </div>

		  <a href="?keycb=chiphi.php&doan=<?=$doan?>">Cập nhật chi phí cho đoàn</a>

		  <h3>Danh sách thành viên</h3>
		  </div>



		  <div class="table-responsive">          
		  <table class="table">
		    <thead>
		      <tr>
		        <th>Tên</th>
		        <th>Ngày sinh</th>
		        <th>Hộ chiếu</th>
		        <th>Visa</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 
		    $sql = "select * from thanhvien tv join doan_thanhvien b on tv.tv_id=b.tv_id
		    join passport pp on pp.tv_id=b.tv_id
		    join visa on visa.pp_id=pp.pp_id
		    where b.doan_id='$doan'";
		    $do = mysqli_query($db,$sql);
		    while($tv = mysqli_fetch_array($do)){
		    ?>
		      <tr>
		        <td><?=$tv['tv_ten']?></td>
		        <td><?=$tv['tv_namsinh']?></td>
		        <td><?=$tv['pp_id']?></td>
		        <td><?=$tv['visa_id']?></td>
		      </tr>

		     <?php } ?>
		    </tbody>
		  </table>
		  </div>




		</div>
	</div>


	<div class="col-md-6">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	 <h3>Thông tin công việc</h3>
		  	 <?php 
		  	 $sql = "select * from congviec a join loaicongviec b on a.loaicv_id=b.loaicv_id 
		  	 where cv_id=$cvid";
		  	 $do = mysqli_query($db,$sql);
		  	 $cv = mysqli_fetch_array($do);

		  	  ?>
		  	  Tên: <?=$cv['cv_ten']?><br>
		  	  Loại công việc: <?=$cv['loaicv_ten']?><br><hr>
		  	  Nội dung: <?=$cv['cv_chitiet']?><br>
		  </div>

		</div>
	</div>

</div>