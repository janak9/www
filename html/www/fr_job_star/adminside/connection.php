<?php

class JobClass{
	function __construct(){
		$this->con = mysqli_connect("localhost","root","","job180") or die(mysql_error());

	}
	function counter($tbl,$id,$whr="")
	{
		 $qry="SELECT * FROM $tbl";
		 if ($whr!="") {
	       $qry="SELECT * FROM $tbl where $whr=$id";
	     }
		$res=mysqli_query($this->con,$qry);
	//echo $res;
		$cnt = mysqli_num_rows($res);
		return $cnt;
	}
	function insertion($tbl,$data)
	{
		// Insert data into any table
		$col="";
	// print_r($data);
		foreach($data as $value)
		{
			$col=$col . "'" . $value . "'" . ",";
		}
		// echo $col;
		$tmp = substr($col,0,strlen($col)-1);
	    $qry="insert into " . $tbl . " values(null," . $tmp . ")";	
		$res=mysqli_query($this->con,$qry);
		
	}
	function grid($tbl,$f)
	{
        $sql = "SHOW COLUMNS FROM ". $tbl;
		$result = mysqli_query($this->con,$sql);
		$cnt=mysqli_num_rows($result);
    	?>
    		<table id="example1" class="table table-bordered table-striped" cellspacing='0' width='100%'>
                        <thead>
                        <tr>
    	<?php
    	$i=0;
       	while($row = mysqli_fetch_array($result)) 
        {
        	if($f[$i] != "Password")
        	{
				echo " <th>" . $f[$i] ." </th11>";
				$i++;
			}
		}	
		?>
        <th>Edit</th>
        <th>Delete</th>
        </tr>  
        </thead>
                                
	    <?php

		$sql_select=  "select * from ". $tbl;
		$result_select = mysqli_query($this->con,$sql_select);
		return $result_select;
		}	
	function deletion($tbl,$whrid,$whrval){
		// for delete record of id which is passed.
	 	$qry = "delete from ".$tbl ." where ".$whrid ." = ".$whrval;
		mysqli_query($this->con,$qry);

	}
	function updatation($tbl,$data,$whrname,$whrid){
		// for update data in table
		$col="";
		foreach($data as $key => $value){
			$col=$col . $key . "=" . "'" . $value . "'" . ",";
		}
		 $tmp = substr($col,0,strlen($col)-1);

		 $qry="update ". $tbl ." set " . $tmp . " where ". $whrname . "=" .$whrid;
		if(mysqli_query($this->con,$qry)){
			return true;
		}else{
			return false;
		}

	}	
	function data_dd($tbl){
		// it returns all the record of table in mysql reult form
		$qry="select * from " . $tbl;
		$res=mysqli_query($this->con,$qry);
		return $res;
	}
	function select_up($tbl,$whr,$id){
		// it return one record of which condition is passed in the form of array.

		$qry="SELECT * FROM `$tbl` WHERE `$whr` LIKE '$id'";
		$res=mysqli_query($this->con,$qry);
		$row=mysqli_fetch_array($res);
		return $row;
	} 
	function select_mul($tbl,$whr,$id){
		// it return one record of which condition is passed in the form of array.
		echo $qry="select * from " . $tbl . " where " . $whr . "=" . '$id';
		$res=mysqli_query($this->con,$qry);
		return $res;
	}
	function img_upload($data,$imgpath){
		// it moves selected image into given path and returns a random name of image
		$type = $data['type'];
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
    function file_upload($data,$imgpath){
		// it moves selected image into given path and returns a random name of image
		echo $type = $data['type'];
  		$tmp = substr($type,5,strlen($type));
  		$random = rand(1000,9999);
  		$img = "img" . $random . "." . $tmp;
  		$path = $imgpath . $img;

  		if($type != "application/msword") {
   
    		$err_file = "";
    		echo $err_file= "DOC & DOCX files are allowed.";
  		}
  		else {
    		if(move_uploaded_file($data['tmp_name'],$path)){
      			return $img;
    		}
    	}
    } 
    function randString($length) {
    	// it return a random string of length which is given as an argument
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		//echo $str;
		return $str;
	}
}

?>	