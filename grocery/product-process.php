<?php
include 'header.php';  
     if(isset($_POST['addproduct']))
	{ 
	


	
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
        //$product_price=$product_price.$currency;

        $product_sellprice=$_POST['sellprice'];
        $remove[] = "'";
        $remove[] = '"';
        $remove[] = "-"; // just as another example
        $product_sellprice = str_replace( $remove, "", $product_sellprice );
        //$product_sellprice=$product_sellprice.' '.$currency;

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

	$category=$_POST['chk'];
	$pid=rand(500,10000);
	$dat=date("d/m/Y");
$product_limit=$_POST['plimit'];
//var_dump($category);
//exit();
	$sql="SELECT * FROM `app_productsmain` ";
        
          $check= mysqli_query($conn, $sql);
          
foreach($check as $checkcat){
if($checkcat['product_name']==$product_name)
{
$ok=1;
}else{
$ok=0;
}
}

if($ok==1){?>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Product Already Exist ",
  text: "Choose a different name",
  icon: "error",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "add-product.php";
//console.log('The Ok Button was clicked.');
});
</script>
<?php } else {



$insertplacemain="INSERT INTO app_productsmain (product_id,product_name,description,size,price,color,quantity,product_status,date,sellprice,plimit) VALUES('".$pid."','".$product_name."','".$product_des."','".$product_size."','".$product_price."','".$product_color."','".$product_quntity."','".$product_status."','".$dat."','".$product_sellprice."','".$product_limit."')";
   
    $successmain= mysqli_query($conn, $insertplacemain);
    
    $lastid=$conn->insert_id;
    

foreach($category as $cat_id)
{
        
$insertplace="INSERT INTO app_products(product_id,product_name,description,size,price,color,quantity,product_status,date,cat_id,sellprice,plimit) VALUES('".$pid."','".$product_name."','".$product_des."','".$product_size."','".$product_price."','".$product_color."','".$product_quntity."','".$product_status."','".$dat."','".$cat_id."','".$product_sellprice."','".$product_limit."')";
//echo'<pre>';var_dump($insertplace);
//exit();
$success= mysqli_query($conn, $insertplace);
}

    
    $sql="SELECT * FROM `app_productsmain` where id='".$lastid."' ";
       
          $check= mysqli_query($conn, $sql);
         
         foreach($check as $row){ $product_id=$row['product_id'];}
          
      $targetFolder = "uploads/products";
 $targetorder = "uploads/order";

		$errorMsg = array();
		$successMsg = array();
		foreach($_FILES as $file => $fileArray)
		{
			
			if(!empty($fileArray['name']) && $fileArray['error'] == 0)
			{
				$getFileExtension = pathinfo($fileArray['name'], PATHINFO_EXTENSION);;
 
				if(($getFileExtension =='jpg') || ($getFileExtension =='jpeg') || ($getFileExtension =='png') || ($getFileExtension =='gif'))
				{
					if ($fileArray["size"] <= 500000) 
					{
						$breakImgName = explode(".",$fileArray['name']);
						$imageOldNameWithOutExt = $breakImgName[0];
						$imageOldExt = $breakImgName[1];
 
						$newFileName = strtotime("now")."-".str_replace(" ","-",strtolower($imageOldNameWithOutExt)).".".$imageOldExt;
 
						
						$targetPath = $targetFolder."/".$newFileName;
		                                $targetorders = $targetorder."/".$newFileName;
                                                 //$path=$serverimg.$targetFolder."/".$newFileName;
						
						if (move_uploaded_file($fileArray["tmp_name"], $targetPath)) 
						{
							
  
   $insertplacemain="INSERT INTO product_images (product_id,image) VALUES('".$product_id."','".$targetPath."')";
   $successmain= mysqli_query($conn, $insertplacemain);


							
    
							if($successmain)

							{ 




?>
								<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Product Added ",
  text: "Successfully.All Image Upload complete.",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "add-product.php";
//console.log('The Ok Button was clicked.');
});
</script>
<?php
}
							else
							{
								$errorMsg[$file] = "Unable to save ".$file." file ";
							}
						}
						else
						{
							$errorMsg[$file] = "Unable to save ".$file." file ";		
						}
					} 
					else
					{
						$errorMsg[$file] = "Image size is too large in ".$file;
					}
 
				}
				else
				{
					$errorMsg[$file] = 'Only image file required in '.$file.' position';
				}	
			}
			
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}

?>
 
