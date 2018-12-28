<?php


function img_upload($data,$imgpath){
		// it moves selected image into given path and returns a random name of image
		foreach ($data as $key => $value) {
        if($key == "img")
        {
          echo $key;
        }
    }
		exit;
  		$tmp = substr($type,6,strlen($type));
  		$random = rand(1000,9999);
  		$img = "img" . $random . "." . $tmp;
  		$path = $imgpath . $img;

  		if($type != "image/jpg" && $type != "image/png" && $type != "image/jpeg") {
   
    		$err_img = "";
    		$err_img = "Sorry, only JPG, JPEG & PNGs files are allowed.";
  		}
  		else {
    		if(move_uploaded_file($data['tmp_name'],$path)){
      			return $img;
    		}
    	}
    } 
?>