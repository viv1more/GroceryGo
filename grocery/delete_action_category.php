<?php
include_once("config.php");

if(isset($_POST['emp_id']))
 {

$emp_id = trim($_POST['emp_id']);

$query="Select * FROM `app_category` where cat_id='".$emp_id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());
$resultcheck= mysqli_fetch_array($result,MYSQLI_ASSOC);

$imgpath=$resultcheck['category_image'];

          $imgpath=str_replace($serverimg,'',$imgpath);



$query="DELETE FROM `app_category` where cat_id in ($emp_id) ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());

unlink($imgpath);
mysqli_error($conn);
mysqli_close($conn);
echo $emp_id;
  }?>