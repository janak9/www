<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
include_once("connection.php");
$con = new JobClass;
$s_id=$_REQUEST["s_id"];
$r_id=$_REQUEST["r_id"];
$type=$_REQUEST["type"];
if ($type=="candidate") {
    $qry="select * from chat where reciever='company' and sender='candidate' and s_id=$r_id and r_id=$s_id or reciever='candidate' and sender='company' and s_id=$s_id and r_id=$r_id";
}else{
$qry="select * from chat where reciever='company' and sender='candidate' and s_id=$s_id and r_id=$r_id or reciever='candidate' and sender='company' and s_id=$r_id and r_id=$s_id";
}
$res=mysqli_query($con->con,$qry);
$in_qry="select id from chat where sender='$type' and s_id=$r_id and r_id=$s_id and chat.read=0";
$in_res=mysqli_query($con->con,$in_qry);
if ($in_res && mysqli_num_rows($in_res)>0) {
    $in_arr=mysqli_fetch_all($in_res,MYSQLI_NUM);
    $in_arr=array_map(function($index){
    return $index[0];
    },$in_arr);
    $in_str=implode(",",$in_arr);
    $up_qry="update chat set chat.read=1 where chat.id IN($in_str)";
    mysqli_query($con->con,$up_qry);
}
 ?>
<ul>
    <?php while($m=mysqli_fetch_array($res)) {
    if($m['sender']==$type){ ?>
    <li>
        <span class="left"><?php echo $m['msg']; }else{ ?> </span>
        <div class="clear"></div>
    </li> 
    <li>
        <span class="right"><?php  echo $m['msg'];}  ?></span>
        <div class="clear"></div>
    </li> <?php } ?>
</ul>
<div class="clear"></div>