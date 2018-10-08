<div class="row">

<div class="col-md-4">
  	<div class="panel panel-default">
	    <div class="panel-body">
		  	<h2>Thêm mới dự án</h2>
		  	
		  	
		  	<form action="" method="POST">
		  	<div class="form-group">
			    <label>Tên dự án:</label>
			    <input type="text" name="tenduan" class="form-control" >
			</div>
			<div class="form-group">
			    <label>Hình thức</label>
			    <input type="text" name="hinhthuc" class="form-control" >
			</div>
			<div class="form-group">
			    <label>Nội dung</label>
			    <textarea name="noidung" class="form-control" rows="12"></textarea>
			</div>
			<button type="submit" name="btn_themduan" class="btn btn-default">Thêm</button>

			</form>

		</div>
	</div>
</div>



<div class="col-md-8">
  	<div class="panel panel-default">
	    <div class="panel-body">
	    <h2>Danh sách dự án</h2>
	    <?php 
	    $listDA = "SELECT * from duan order by duan_trangthai";
	    $doListDA = mysqli_query($db,$listDA);
	    while($duan = mysqli_fetch_array($doListDA)){
	    	$id = $duan['duan_id'];
	    	$ten = $duan['duan_ten'];
	    	$hinhthuc = $duan['duan_hinhthuc'];
	    	$noidung = $duan['duan_noidung'];
	    	$tt = $duan['duan_trangthai'];
	    	if($tt==0){
	    		$trangthai = "Đang thực hiện";
	    	}else{
	    		$trangthai = "Đã hoàn thành";
	    	}
	     ?>

	     	<div class="col-md-6">
	    	<div class="well" style="height:170px;">
	    		<h5><?=$ten?></h5>
	    		<p>Hình thức: <?=$hinhthuc?></p>
	    		<p><?=$trangthai?></p>

	    		<?php 
	    		if($tt == 0){
	    		 ?>
	    		 <a href="?keyad=duan.php&danhdauhoanthanh=<?=$id?>">Đánh dấu hoàn thành</a>
	    		 <?php  
	    		 }
	    		 ?>
	    		<br><a href="?keyad=chitietduan.php&duan=<?=$id?>">Chi tiết dự án</a>
	    	</div>
	    	</div>

	    <?php } ?>
	    </div>
	</div>
</div>




</div>





<?php 
//////////////////////////////XU LY////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////





//them du an moi
if(isset($_POST['btn_themduan'])){
	$name = $_POST['tenduan'];
	$hinhthuc = $_POST['hinhthuc'];
	$noidung = $_POST['noidung'];
	$themduan = "INSERT INTO duan values('','$name','$hinhthuc','$noidung',0)";
	$doAdd = mysqli_query($db,$themduan);
	if($doAdd){
		echo "<script>alert('Đã thêm dự án');window.location='?keyad=duan.php';</script>";
	}else{
		echo "<script>alert('Lỗi thêm dự án 010xx');</script>";
	}
}


//danh dau hoan thanh du an
if(isset($_GET['danhdauhoanthanh'])){
	$id = $_GET['danhdauhoanthanh'];
	$danhdau = "UPDATE duan SET duan_trangthai=1 WHERE duan_id=".$id;
	$doDanhDau = mysqli_query($db,$danhdau);
	if($doDanhDau){
		echo "<script>alert('Đã cập nhật');window.location='?keyad=duan.php';</script>";
	}else{
		echo "<script>alert('Lỗi cập nhật dự án 020xx');</script>";
	}
}

 ?>