<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Easy and Simple Image Upload</title>
<?php
include_once("connection.php");
    $con = new JobClass;
    $err_img="";
    ?>
</head>
<body>
	<div>
	Uploaded Images:
	
	</div>
	<div>
	<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
        <label for="cmp_img">Company Image</label>
            <input type="file" id="abc" name="abc" /> 
                <div class="errfont"> 
                    <?php 
                    if($err_img != "") { 
                        echo $err_img; 
                    } 
                    ?>
                </div>    

    </div>
    <div class="form-group">
                <input  type="submit" class="btn btn-default" name="sinsert"> 
            </div>
	</form>
	<?php
	if(isset($_POST["sinsert"])){
	$data="";
	$data_fl=$_FILES['abc']['name'];
    $data["img"]=$con->img_upload("$data_fl","assets/images/cmp_logo/");
	}
	?>
	</div>
</body>
</html>