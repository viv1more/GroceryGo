<?php
include 'header.php';  
     if(isset($_POST['addproduct']))
	{ 
	
	
        $pid=$_SESSION['product_id'];
	$product_name=$_POST['name'];
        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "-"; // just as another example
        $product_name = str_replace( $remove, "", $product_name ); 

	$product_des=htmlspecialchars($_POST['editor1']);

	$product_size=$_POST['size'];
        $remove[]="";
        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "-"; // just as another example
        $product_size = str_replace( $remove, "", $product_size );
        //if($product_size==''){$product_size="NULL";}
	$product_color=$_POST['colour'];
        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "-"; // just as another example
        $product_color = str_replace( $remove, "", $product_color );

        //if($product_color==''){ $product_color="NULL"; }
        $product_sellprice=$_POST['sellprice'];
        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "-"; // just as another example
        $product_price = str_replace( $remove, "", $product_price );

	$product_price=$_POST['price'];
        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "-"; // just as another example
        $product_price = str_replace( $remove, "", $product_price );

	$product_quntity=$_POST['quantity'];
        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "-"; // just as another example
        $product_quantity = str_replace( $remove, "", $product_quantity );

	$product_status=$_POST['product_status'];
        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "-"; // just as another example
        $product_status = str_replace( $remove, "", $product_status );

if($product_status=="comingsoon"){ $product_quntity=0;}

	$category=$_POST['chk'];
	
	$dat=date("d/m/Y");
$product_limit=$_POST['plimit'];

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$insertplacemain="UPDATE  app_productsmain SET sellprice='".$product_sellprice."',product_id='".$pid."',product_name='".$product_name."',description='".$product_des."',size='".$product_size."',price='".$product_price."',color='".$product_color."',quantity='".$product_quntity."',product_status='".$product_status."',date='".$dat."',plimit='".$product_limit."' WHERE product_id='".$pid."'";
   
    $successmain= mysqli_query($conn, $insertplacemain);
  if($successmain){ $final=1;}else{$final=0;}
  
  $query="DELETE FROM `app_products` where product_id='".$pid."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());
    
  
    
    foreach($category as $cat_id)
{
        
$insertplace="INSERT INTO app_products(product_id,product_name,description,size,price,color,quantity,product_status,date,cat_id,sellprice,plimit) VALUES('".$pid."','".$product_name."','".$product_des."','".$product_size."','".$product_price."','".$product_color."','".$product_quntity."','".$product_status."','".$dat."','".$cat_id."','".$product_sellprice."','".$product_limit."')";
//echo'<pre>';var_dump($insertplace);
//exit();
$success= mysqli_query($conn, $insertplace);
}


$targetFolder = "uploads/products";

		$errorMsg = array();
		$successMsg = array();
		foreach($_FILES as $file => $fileArray)
		{
			
			if(!empty($fileArray['name']) && $fileArray['error'] == 0)
			{
				$getFileExtension = pathinfo($fileArray['name'], PATHINFO_EXTENSION);;
 
				if(($getFileExtension =='jpg') || ($getFileExtension =='jpeg') || ($getFileExtension =='png') || ($getFileExtension =='gif'))
				{
					if ($fileArray["size"] <= 1500000) 
					{
						$breakImgName = explode(".",$fileArray['name']);
						$imageOldNameWithOutExt = $breakImgName[0];
						$imageOldExt = $breakImgName[1];
 
						$newFileName = strtotime("now")."-".str_replace(" ","-",strtolower($imageOldNameWithOutExt)).".".$imageOldExt;
 
						
						$targetPath = $targetFolder."/".$newFileName;
                                                 //$path=$serverimg.$targetFolder."/".$newFileName;
						
						if (move_uploaded_file($fileArray["tmp_name"], $targetPath)) 
						{
							
  
   $insertplacemain="INSERT INTO product_images (product_id,image) VALUES('".$pid."','".$targetPath."')";
   $successmainimages= mysqli_query($conn, $insertplacemain);
    
							
    
							if($successmainimages)
							{ ?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Product Updated ",
  text: "Successfully.All Image Upload complete.",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "edit-products.php";
//console.log('The Ok Button was clicked.');
});
</script>
<?php
}
}
							else
							{
								$errorMsg[$file] = "Unable to save ".$file." file ";
							}
						}
						else
						{
							//echo'<script> alert("unable to save"); </script>';
                                                        $errorMsg[$file] = "Unable to save ".$file." file ";		
						}
					} 
					else
					{
						//echo'<script> alert("unable to save"); </script>';
                                                $errorMsg[$file] = "Image size is too large in ".$file;
					}
 
				}
				else
				{
					//echo'<script> alert("unable to save"); </script>';
                                         $errorMsg[$file] = 'Only image file required in '.$file.' position';
				}	
			
			}
			if($successmain)
							{ ?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Product Updated ",
  text: "Successfully.All Image Upload complete.",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "edit-products.php";
//console.log('The Ok Button was clicked.');
});
</script>
<?php
}
			
		
		}
        
        
        






