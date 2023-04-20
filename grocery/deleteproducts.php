<?php include'header.php';

$id=$_GET['id'];
  $id=base64_decode($id);
  //var_dump($id);
$sql="SELECT * FROM `app_productsmain` where id='".$id."' ";
 $check= mysqli_query($conn, $sql);
 $resultcheck= mysqli_fetch_array($check,MYSQLI_ASSOC);
          //echo'<pre>'; var_dump($resultcheck);
$product_id=$resultcheck['product_id'];

$query="DELETE FROM `app_productsmain` where id='".$id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());
          
if($result==TRUE)   {
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  position: 'top-right',
  type: 'success',
  title: 'Product deleted successfully',
  showConfirmButton: false,
  timer: 1500
})
</script>

<?php }



$query="DELETE FROM `app_products` where product_id='".$product_id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());


if($result==TRUE)   { ?>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  position: 'top-right',
  type: 'success',
  title: 'Product deleted from categories successfully',
  showConfirmButton: false,
  timer: 1500
})
</script>
 

  
<?php }
$imagepath=array();

$query="SELECT image FROM `product_images` where product_id='".$product_id."' ";

$result=mysqli_query($conn,$query);

$data=mysqli_fetch_array($result,MYSQLI_ASSOC);

$imagetocopybefor=$data['image'];
$imagetocopy=str_replace('uploads/products','',$imagetocopybefor);
//echo $imagetocopy;

copy($imagetocopybefor, 'uploads/order/'.$imagetocopy);

$final='uploads/order'.$imagetocopy;



$query="UPDATE  `ordered_product` SET product_image='".$final."' where product_id='".$product_id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());

//foreach($result as $image){ $imagepath[]=str_replace($serverimg,'',$image['image']); }



$query1="DELETE FROM `product_images` where product_id='".$product_id."' ";
          $result1=mysqli_query($conn,$query1) or die("not Deleted". mysql_error());


$query="DELETE FROM `app_slider` where product_id='".$product_id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());


foreach($imagepath as $del){ unlink($del);}


if($result==TRUE)   {?>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Product Deleted",
  text: "Successfully",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "edit-products.php";
//console.log('The Ok Button was clicked.');
});
</script>

<?php } ?>