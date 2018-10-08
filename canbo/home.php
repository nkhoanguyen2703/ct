<div class="row">

  <div class="col-md-6">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  <h3>Dự án đang thực hiện</h3>

		  <div class="table-responsive">          
		  <table class="table">
		    <thead>
		      <tr>
		        <th>Mã</th>
		        <th>Tên</th>
		        <th>Đoàn</th>
		        <th>Chi tiết</th>
		      </tr>
		    </thead>
		    <tbody>


		    	<?php 
			  $sql = "select * from duan a join canbo_duan b on a.duan_id=b.duan_id 
			  join doan_duan c on a.duan_id=c.duan_id
			  join doan d on d.doan_id=c.doan_id
			  where b.cb_id='$canbo'
			  LIMIT 0,20";
			  $do = mysqli_query($db,$sql);
			  while($duan = mysqli_fetch_array($do)){
			  	$ma = $duan['duan_id'];
			  	$ten = $duan['duan_ten'];
			  	$doan = $duan['doan_ten'];

			   ?>
		   		<tr>
		        <td><?=$ma?></td>
		        <td><?=$ten?></td>
		        <td><?=$doan?></td>
		        <td><a href="../?key=duan.php&duan=<?=$ma?>">Xem</a></td>
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
		  <h3>Danh sách công việc</h3>

		  <div class="table-responsive">          
		  <table class="table">
		    <thead>
		      <tr>
		        <th width="40%">Công việc</th>
		        <th>Loại</th>
		        <th>Đoàn</th>
		        <th>Bắt đầu</th>
		        
		        <th width="5%"></th>
		      </tr>
		    </thead>
		    <tbody>


		    	<?php 
			  $sql = "select * from thuchien a join congviec b on a.cv_id=b.cv_id
			  join loaicongviec c on c.loaicv_id=b.loaicv_id
			  join doan d on d.doan_id=a.doan_id
			  WHERE a.cb_id='$canbo'
			  ORDER BY b.cv_id DESC
			  LIMIT 0,20";
			  $do = mysqli_query($db,$sql);
			  while($cv = mysqli_fetch_array($do)){
			  	$cv_id = $cv['cv_id'];
			  	$cvten = $cv['cv_ten'];
			  	$doanid = $cv['doan_id'];
			  	$doanten = $cv['doan_ten'];
			  	$start = $cv['th_thoigianbatdau'];
			  	$loaicv = $cv['loaicv_ten'];


			   ?>
		   		<tr>
		        <td><?=$cvten?></td>
		        <td><?=$loaicv?></td>
		        <td><?=$doanten?></td>
		        <td><?=$start?></td>
		        
		        <td><a href="?keycb=congviec.php&cv=<?=$cv_id?>&doan=<?=$doanid?>">Xem</a></td>
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

  

</div><!--row-->