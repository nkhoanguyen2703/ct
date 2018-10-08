<div class="row">
	<div class="col-md-8">
		<div class="well">
			<h2>Đăng tin mới</h2>

			<form method="POST" action="" enctype="multipart/form-data">

			  <div class="form-group">
			    <label >Tiêu đề</label>
			    <input type="text" class="form-control" name="tieude">
			  </div>

			  <label >Hình sản phẩm</label>
		        <div style="position:relative;">
		            <!--<a class='btn btn-primary' href='javascript:;'></a>-->
		                <input type="file" name="photo"/>

		            &nbsp;
		            <span class='label label-info' id="upload-file-info"></span>
		        </div>


			   <div class="form-group">
		            <label>Nội dung</label>
		            <textarea class="ckeditor form-control" name="fm_noidung" id='fm_noidung' ></textarea></br>
		            <script>
		                CKEDITOR.replace( 'fm_noidung',
		                    {
		                        filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
		                        filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
		                        filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
		                        filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		                        filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		                        filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		                    });
		            </script>
		        </div>

		        <button type="submit" class="btn btn-default" name="btn_dangtin">Đăng tin</button>
			</form>

		</div>
	</div>

	<div class="col-md-4">
		<div class="table-responsive">          
  <table class="table">
  <h4>20 bài viết gần nhất</h4>
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $stt = 1;
    $sql = "select * from tintuc where cb_id='$canbo' order by tt_id DESC limit 0,20";
    $do = mysqli_query($db,$sql);
    while($tt = mysqli_fetch_array($do)){
     ?>

      <tr>
        <td><?=$stt?></td>
        <td><?=$tt['tt_ten']?></td>
      </tr>
	
	<?php $stt+=1; } ?>
    </tbody>
  </table>
  </div>
	</div>
</div>




<?php 
if(isset($_POST['btn_dangtin'])){
	$tieude = $_POST['tieude'];
	$noidung = $_POST['fm_noidung'];
	$newfilename="no_image.png";
	$today = date("Y-m-d H:i:s"); 

	$loihinhanh='';
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(array_key_exists($ext, $allowed)){
            $maxsize = 6 * 1024 * 1024;
            if($filesize < $maxsize){
                if(in_array($filetype, $allowed)){
                    // Check whether file exists before uploading it
                    if(file_exists("../images/tintuc/" . $_FILES["photo"]["name"])){
                        $loihinhanh=$_FILES["photo"]["name"] . " đã tồn tại tên hình này.";
                    } else{
                    	$temp = explode(".", $_FILES["photo"]["name"]);
          						$newfilename = round(microtime(true)) . '.' . end($temp);
          						// $newfilename = $nextFoodID . '.' . end($temp);
          						move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/tintuc/" . $newfilename);       
                    }
                } else{
                    echo  $loihinhanh="Lỗi upload hình ảnh";
                }
            }else  $loihinhanh="Lỗi hình không được quá 6MB";
        } else $loihinhanh="Không đúng định dạng ảnh";
    }
    echo $loihinhanh;

    $sql = "INSERT INTO tintuc values('','$tieude','$noidung','$newfilename','$today','$canbo')";
    $do = mysqli_query($db,$sql);
    if($do){
    	echo "<script>alert('Đã thêm');window.location='?keyad=tintuc.php';</script>";
    }else{
    	echo "<script>alert('Chưa thêm được');</script>";
    }



}

 ?>