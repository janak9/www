<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
include_once("connection.php");
$con = new JobClass;
$data1["sender"]=$_REQUEST["sender"];
$data1["s_id"]=$_REQUEST["s_id"];
$data1["reciever"]=$_REQUEST["reciever"];
$data1["r_id"]=$_REQUEST["r_id"];
$data1["msg"]=$_REQUEST["msg"];
$data1["read"]=0;
$con->insertion('chat',$data1);
?>
