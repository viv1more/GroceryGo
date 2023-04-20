<?php
    include'../config.php'; 
$product_id=$_POST['product_id'];
 
$qrycurr = "SELECT * FROM app_admin ";
    $res = mysqli_query($conn, $qrycurr);
    $recordscurr = mysqli_fetch_array($res, MYSQLI_ASSOC);
$currency=$recordscurr['currency'];	
	
if(!empty($product_id)){

 $qry = "SELECT * FROM app_products where product_id='" . $product_id . "'";
        $res1 = mysqli_query($conn, $qry);

        
        while ($records1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
            
            $product_size = $records1['size'];
            $product_price = $records1['price'];
            $product_color = $records1['color'];
            $product_sellprice = $records1['sellprice'];
            $product_quantity = $records1['quantity'];
            $product_des=$records1['description'];
            $product_des=htmlspecialchars_decode(str_replace("&quot;", "\"", $product_des));
            $product_name = $records1['product_name'];
            $product_status=$records1['product_status'];
            $qry_image = "select * from product_images where product_id ='" . $product_id . "'";
            $res_image = mysqli_query($conn, $qry_image);

          


$sqlimage="SELECT * FROM `product_images` WHERE `product_id`='".$product_id."' ";
$checkimage= mysqli_query($conn, $sqlimage);


            while ($records_image = mysqli_fetch_array($checkimage)) {

                $product_image = $serverimg.$records_image['image'];
                $json[] = $product_image;
                
            }

            $json1 = array("productId" => $product_id, "productName" => $product_name,"currency"=>$currency, "sellprice"=>$product_sellprice,"mrp" => $product_price, "size" => $product_size, "quantity" => $product_quantity,"status"=>$product_status,"description" => $product_des,"color"=> $product_color,"images" => $json);
            unset($json);
            
            
        }
        
        $json1=json_encode($json1);
        print_r($json1);
        mysqli_close($conn); exit();
        
        }else{ $minfo = array("success"=>'false', "message"=>'empty fields not allowed');
      $jsondata = json_encode($minfo); print_r($jsondata); mysqli_close($conn); exit(); }
        