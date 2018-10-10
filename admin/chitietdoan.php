<?php 
	if(isset($_GET['doan'])){
		$doan_id = $_GET['doan'];

		$sql = "select * from doan where doan_id='$doan_id'";
		$do = mysqli_query($db,$sql);
		$doan = mysqli_fetch_array($do);
	}
?>

<div class="row">

  	<div class="col-md-4">
  	<div class="panel panel-default">
	  <div class="panel-body">
	  	



	  	<h2>Thông tin đoàn</h2>
	  	<a href="?keyad=congviec.php&doan=<?=$doan_id?>">Sắp xếp công việc</a>
	  	<div class="well">
		  	<?=$doan['doan_ten']?><br>
		  	Đến: <?=$doan['doan_thoigianden']?><br>
		  	Đi: <?=$doan['doan_thoigiandi']?><br>
	  	</div>





	  	<div class="well">
	  	<h4>Dự án đoàn đang thực hiện</h4>
	  	<?php 
	  	$listDoanDuAn = "select * from doan_duan a join duan b on a.duan_id=b.duan_id WHERE a.doan_id=".$doan_id;
	  	$doListDoanDuAn = mysqli_query($db,$listDoanDuAn);
	  	while( $row = mysqli_fetch_array($doListDoanDuAn)){
	  	 ?>
	  	 	<li><?=$row['duan_ten']?></li>
	  	<?php  } ?>
	  	</div>






	  	<h4>Thêm thành viên</h4>

	  	<!--tim thanh vien cu-->
	  	<form action="?keyad=themthanhviencu.php" method="POST">
		    <div class="input-group">
		      <input type="text" class="form-control" placeholder="Nhập số hộ chiếu để tìm" name="pp">
		      <input type="hidden" name="doan" value="<?=$doan_id?>">
		      <div class="input-group-btn">
		        <button class="btn btn-default" name="timthanhvien" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		      </div>
		    </div>
		  </form>

		 



	  	<p><i>Nếu thành viên đã tồn tại, chỉ cần nhập số hộ chiếu sau đó nhập thông tin visa </i></p>
		<form action="" method="POST">
		  	<div class="form-group">
			    <label>Tên thành viên:</label>
			    <input type="text" name="ten" class="form-control">
			</div>
			<div class="form-group">
			    <label>Ngày sinh</label>
			    <input type="date" name="namsinh" class="form-control">
		  	</div>

		  	<div class="well">
			  	<div class="form-group">
				    <label>Số hộ chiếu</label>
				    <input type="text" name="hochieu" class="form-control" required>
				</div>
				<div class="form-group">
				    <label>Ngày cấp hộ chiếu</label>
				    <input type="date" name="pp_ngaycap" class="form-control">
			  	</div>
			  	<div class="form-group">
				    <label>Ngày hết hạn hộ chiếu</label>
				    <input type="date" name="pp_ngayhethan" class="form-control">
			  	</div>
			  	<div class="form-group">
				    <label>Nơi cấp hộ chiếu:</label>
				    <input type="text" name="pp_noicap" class="form-control">
				</div>
			</div>

			<div class="well">
				<div class="form-group">
				    <label>Visa ID:</label>
				    <input type="text" name="visa" class="form-control" required>
				</div>
				<div class="form-group">
				    <label>Ngày cấp visa</label>
				    <input type="date" name="vs_ngaycap" class="form-control" required>
			  	</div>
			  	<div class="form-group">
				    <label>Ngày hết hạn visa</label>
				    <input type="date" name="vs_ngayhethan" class="form-control" required>
			  	</div>
			  	<div class="form-group">
				    <label>Nơi cấp visa:</label>
				    <input type="text" name="vs_noicap" class="form-control" required>
				</div>
			</div>

			<button type="submit" name="btn_themthanhvien" class="btn btn-default">Thêm thành viên </button>
		</form>


	  </div>
	</div>
	</div>






	<div class="col-md-8">
  	<div class="panel panel-default">
	  <div class="panel-body">
	  		<h2>Bố trí dự án</h2>
	  		<p>Danh sách các dự án chưa hoàn thành</p>  
	  		<input class="form-control" id="myInput" type="text" placeholder="Tìm dự án..">          
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Tên</th>
			        <th>Hình thức</th>
			        <th>Bố trí</th>
			      </tr>
			    </thead>
			    <tbody id="myTable">

			    	<?php 
			    	$listDA = "SELECT * from duan WHERE duan_trangthai=0 ORDER BY duan_id DESC";
			    	$doListDA = mysqli_query($db,$listDA);
			    	while($da = mysqli_fetch_array($doListDA)){
			    		$duan_id = $da['duan_id'];
			    	 ?>
				    		<tr>
						        <td><?=$da['duan_ten']?></td>
						        <td><?=$da['duan_hinhthuc']?></td>
						        <td><a onclick="return botri_confirm('<?=$da['duan_ten']?>')" href="?keyad=chitietdoan.php&doan=<?=$doan_id?>&botriduan=<?=$duan_id?>">Bố trí</a></td>
						    </tr>
			    	<?php 
			    	}
			    	 ?>
			      
			    </tbody>
			  </table>
	  </div>
	</div>
	</div>

	<script language="javascript">
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#myTable tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});

    function botri_confirm(tenduan){
        if(confirm("Bố trí "+tenduan)){
            return true;
        }
        else{
            return false;
        }
    }
	</script>














	<div class="col-md-8">
  	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h2>DS thành viên</h2>

	  	<div class="table-responsive">          
		  <table class="table">
		    <thead>
		      <tr>
		      	<th style="width:3px;">Stt</th>
		        <th>Tên</th>
		        <th>Ngày sinh</th>
		        <th>Passport</th>
		        <th>Trưởng đoàn</th>
		        <th></th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php 
		    	$listTV = "select * from thanhvien tv 
		    	join doan_thanhvien dtv on tv.tv_id=dtv.tv_id
		    	join passport pp on pp.tv_id=tv.tv_id where dtv.doan_id=".$doan_id;
		    	
		    	$queryListTV = mysqli_query($db,$listTV);
		    	$count=1;

		    	while($thanhvien = mysqli_fetch_array($queryListTV)){
		    		$tv_id = $thanhvien['tv_id'];
		    		$tv_ten = $thanhvien['tv_ten'];
		    		$tv_namsinh = date('d-m-Y', strtotime($thanhvien['tv_namsinh']));
		    		$tv_passport = $thanhvien['pp_id'];
		    		$truongdoan = $thanhvien['truongdoan'];
		    	 ?>
		    	 	<tr>
		    	 		<td><?=$count?></td>
		    	 		<?php if($truongdoan==0){ ?>
				        <td><?=$tv_ten?></td>
				        <?php }else{ ?>
				        <td><b><?=$tv_ten?></b></td>
				        <?php } ?>
				        <td><?=$tv_namsinh?></td>
				        <td><?=$tv_passport?></td>
				        <td><a href="?keyad=chitietdoan.php&doan=<?=$doan_id?>&phancongTV=<?=$tv_id?>">Phân công</a></td>
				        <td><a onclick="return deleteConfirm()" href="?keyad=chitietdoan.php&doan=<?=$doan_id?>&xoaTV=<?=$tv_id?>">Xóa</a></td>
				    </tr>
		    	<?php  
		    	$count += 1;
		    	}
		    	?>
		      
		    </tbody>
		  </table>
		 </div>

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



//them thanh vien
if(isset($_POST['btn_themthanhvien'])){

	//get passport info
	$hochieu = $_POST['hochieu'];

	if(isset($_POST['pp_ngaycap'])){
		$pp_ngaycap = date('Y-m-d', strtotime($_POST['pp_ngaycap']));
	}
	if(isset($_POST['pp_ngayhethan'])){
		$pp_ngayhethan = date('Y-m-d', strtotime($_POST['pp_ngayhethan']));
	}
	if(isset($_POST['pp_noicap'])){
		$pp_noicap = $_POST['pp_noicap'];
	}

	//get visa info
	$visa = $_POST['visa'];
	$vs_ngaycap = date('Y-m-d', strtotime($_POST['vs_ngaycap']));
	$vs_ngayhethan = date('Y-m-d', strtotime($_POST['vs_ngayhethan']));
	$vs_noicap = $_POST['vs_noicap'];

	//check
	$hochieu_tontai = tim_passport($hochieu,$db);

	if($hochieu_tontai == true){ //thành viên cũ

		//check đoàn id, nếu tv đã có trong đoàn hiện tại thì ko thêm nữa
		// nếu tv chưua có trong đoàn hiện tại, thì chỉ thêm đoàn_thành viên 

		$thanhvienID = getThanhVienIdByPassport($hochieu,$db); //thanh vien id cu~
		$tontaithanhvientrongdoanhientai = checkTonTaiTrongDoan($thanhvienID,$doan_id,$db);
		if($tontaithanhvientrongdoanhientai == true){ //da ton tai trong doan
			echo "<script>alert('Thành viên đã tồn tại trong đoàn');</script>";
		}else{ //thanh vien chua ton tai trong doan, thì thêm vào đoàn thành viên
			$themDoanThanhVien = "INSERT INTO doan_thanhvien values('$doan_id',$thanhvienID,0)"; //them Doan_ThanhVien
			$do6 = mysqli_query($db,$themDoanThanhVien);
			if($do6){//them vao doan_thanhvien
				echo "<script>alert('Đã thêm một thành viên cũ');window.location='?keyad=chitietdoan.php&doan=".$doan_id."';</script>";
			}
		}


		$themvisa = "INSERT INTO visa values('$visa','$vs_ngaycap','vs_ngayhethan','$vs_noicap','$hochieu');";
		$do = mysqli_query($db,$themvisa);

		

		if($do){//them dc visa moi
			$thanhvienID = getThanhVienIdByPassport($hochieu,$db);
			$themDoanThanhVien = "INSERT INTO doan_thanhvien values('$doan_id',$thanhvienID,0)"; //them Doan_ThanhVien
			$do6 = mysqli_query($db,$themDoanThanhVien);
			if($do6){//them vao doan_thanhvien
				echo "<script>alert('Đã thêm một thành viên cũ');window.location='?keyad=chitietdoan.php&doan=".$doan_id."';</script>";
			}
		}else{
			echo "<script>alert('Thành viên đã tồn tại');window.location='?keyad=chitietdoan.php&doan=".$doan_id."';</script>";
		}

		

		
	}else{ //thanh vien mới
		$ten ='';
		$namsinh ='';
		if(isset($_POST['ten'])){
			$ten = $_POST['ten'];
		}
		if(isset($_POST['namsinh'])){
			$namsinh = date('Y-m-d', strtotime($_POST['namsinh']));
		}
		$thanhvienID = getNextIDValueByTable(thanhvien,$db);

		$themTV = "INSERT INTO thanhvien values('$thanhvienID','$ten','$namsinh')"; //them thanh vien
		$do2 = mysqli_query($db,$themTV);

		$themPP = "INSERT INTO passport values('$hochieu','$pp_ngaycap','$pp_ngayhethan','$pp_noicap','$thanhvienID')"; //them pp
		$do3 = mysqli_query($db,$themPP);

		$themVS = "INSERT INTO visa values('$visa','$vs_ngaycap','vs_ngayhethan','$vs_noicap','$hochieu')"; //them VS
		$do4 = mysqli_query($db,$themVS);

		$themDoanThanhVien = "INSERT INTO doan_thanhvien values('$doan_id',$thanhvienID,0)"; //them Doan_ThanhVien
		$do5 = mysqli_query($db,$themDoanThanhVien);

		if($do2 and $do3 and $do4 and $do5){
			echo "<script>alert('Đã thêm thành viên mới');window.location='?keyad=chitietdoan.php&doan=$doan_id';</script>";
		}else{
			echo "<script>alert('Lỗi xảy ra 101xx');</script>";
		}

		
	}
}


//phan cong truong doan
if(isset($_GET['phancongTV'])){
	$thanhvienID = $_GET['phancongTV'];
	$updateTV = "UPDATE doan_thanhvien SET truongdoan=1 WHERE doan_id=".$doan_id." AND tv_id=".$thanhvienID;
	$doUpd = mysqli_query($db,$updateTV);
	if($doUpd){
		echo "<script>alert('Đã phân công');window.location='?keyad=chitietdoan.php&doan=$doan_id';</script>";
	}
}



//xoa thanh vien ra khoi doan hien tai
if(isset($_GET['xoaTV'])){
	$tvid = $_GET['xoaTV'];
	$xoaTV = "delete from doan_thanhvien where tv_id=".$tvid." AND doan_id=".$doan_id;
	$doDel = mysqli_query($db,$xoaTV);
	if($doDel){
		echo "<script>alert('Đã xóa thành viên khỏi đoàn');window.location='?keyad=chitietdoan.php&doan=$doan_id';</script>";
	}
}

//bo tri dự án cho đoàn , có thể bố trí nhiều dự án cho 1 đoàn
if(isset($_GET['botriduan'])){
	$duan = $_GET['botriduan'];
	$doan = $_GET['doan'];
	$botri = "INSERT INTO doan_duan values($doan,$duan)";
	$doBoTri = mysqli_query($db,$botri);
	if($doBoTri){
		echo "<script>alert('Đã bố trí');window.location='?keyad=chitietdoan.php&doan=$doan_id';</script>";
	}else{
		echo "<script>alert('Lỗi xảy ra khi bố trí dự án 103xx');</script>";
	}
}


?>