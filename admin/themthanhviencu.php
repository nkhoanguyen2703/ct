 <?php 
		  if(isset($_POST['timthanhvien'])){
		  		$doan_id = $_POST['doan'];
		  		$pp = $_POST['pp'];
		  		$tontai = tim_passport($pp,$db);

		  		if($tontai == true){ // thanh vien cu~

		  			$tontaithanhvientrongdoanhientai = checkTonTaiTrongDoan($thanhvienID,$doan_id,$db);

					if($tontaithanhvientrongdoanhientai == false){ //chua ton tai trong doan
			  			$thanhvienID = getThanhVienIdByPassport($pp,$db);
			  			$themDoanThanhVien = "INSERT INTO doan_thanhvien values('$doan_id',$thanhvienID,0)"; //them Doan_ThanhVien
						$do6 = mysqli_query($db,$themDoanThanhVien);
					}
		  		}else{
		  			echo "<script>alert('Thành viên không tồn tại, đề nghị nhập mới');window.location='?keyad=chitietdoan.php&doan=".$doan_id."';</script>";
		  		}
		  }

?>