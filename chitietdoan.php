<?php 
	
	if(isset($_POST['timdoankhach'])){
		$ten = $_POST['tendoan'];
		$sql = "select * from doan where doan_ten LIKE '%".$ten."%' limit 0,1";
		$do = mysqli_query($db,$sql);

		
		$doan = mysqli_fetch_array($do);

		if($doan){
			$tendoan = $doan['doan_ten'];
			$chiphi = $doan['doan_chiphidutru'];
			$start = $doan['doan_thoigianden'];
			$end = $doan['doan_thoigiandi'];
			$ngonngu = $doan['doan_ngonngulamviec'];
			?>

			 <div class="well">
				 <center>
				 	<h2>Thông tin đoàn khách</h2>
				 	<hr>
				 <h3>Tên đoàn:<?=$tendoan?></h3>
				 Chi phí dự trù: <?=number_format($chiphi)?><br>
				 Thời gian đến: <?=$start?><br>
				 Thời gian đi: <?=$end?><br>
				 Ngôn ngữ làm việc: <?=$ngonngu?><br>
				</center>
			 </div>

			<?php
		}else{
			?>
			<div class="well">
			<h2>Không tìm thấy kết quả</h2>
			</div>
			<?php
		}
	}
 ?>

