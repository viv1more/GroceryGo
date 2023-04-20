<?php
include_once("config.php");

if(isset($_POST['emp_id']))
 {

$emp_id = trim($_POST['emp_id']);




$sql = "select * FROM app_productsmain WHERE id='".$emp_id."'";
 $check= mysqli_query($conn, $sql);
 $resultcheck= mysqli_fetch_array($check,MYSQLI_ASSOC);
          //echo'<pre>'; var_dump($resultcheck);
$product_id=$resultcheck['product_id'];

$query="DELETE FROM `app_productsmain` where id in ($emp_id) ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());
          



$query="DELETE FROM `app_products` where product_id='".$product_id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());



$imagepath=array();

$query="SELECT image FROM `product_images` where product_id='".$product_id."' ";

$result=mysqli_query($conn,$query);

$data=mysqli_fetch_array($result,MYSQLI_ASSOC);

foreach($result as $image){ $imagepath[]=str_replace($serverimg,'',$image['image']); }



$query="DELETE FROM `product_images` where product_id='".$product_id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());


foreach($imagepath as $del){ unlink($del);}

mysqli_error($conn);
echo $emp_id;
  }?>