<?php
include_once("config.php");

if(isset($_POST['emp_id']))
 {

$emp_id = trim($_POST['emp_id']);



$query="Select * FROM `users` where id='".$emp_id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());

$fetchdata=mysqli_fetch_array($result,MYSQLI_ASSOC);
$uid=$fetchdata['uid'];

$query="DELETE FROM `users` where id in ($emp_id) ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());
          
$query="DELETE FROM `users_profile` where uid in ($uid) ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());
          

mysqli_error($conn);
echo $emp_id;
  }?>