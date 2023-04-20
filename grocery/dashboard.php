<?php include 'header.php';?>

<?php include  'sidebar.php';?>
  <?php include 'widget.php';?>

<?php 

$qrycurr = "SELECT * FROM app_admin ";
    $res = mysqli_query($conn, $qrycurr);
    $recordscurr = mysqli_fetch_array($res, MYSQLI_ASSOC);
$currency=$recordscurr['currency'];
if($currency=='USD'){ $currency='$'; }else{ $currency='₹';}

$fetch_order1= mysqli_query($conn,"SELECT * FROM `users_orders` order by id DESC LIMIT 8 ");
$fetch_order= mysqli_query($conn,"SELECT * FROM `users_orders` order by order_date");
$ordertoday = mysqli_num_rows($fetch_order);

$ordercount=mysqli_num_rows($fetch_order1);
//echo $ordercount;
$orderdata=mysqli_fetch_array($fetch_order1);


$complete='Complete';
$inprocess='In-Processing';
$cancel='Cancel';
$fetch_order_com= mysqli_query($conn,"SELECT * FROM `users_orders` where order_status='".$complete."'");
$ordercountcomplete = mysqli_num_rows($fetch_order_com);
while($datarevnue=mysqli_fetch_array($fetch_order_com,MYSQLI_ASSOC)){

$revnue[]=$datarevnue['total'];
//var_dump($revnue);
$revnue1=array_sum($revnue);

}
$fetch_order_inpro= mysqli_query($conn,"SELECT * FROM `users_orders` where order_status='".$inprocess."'");
$ordercountinpro = mysqli_num_rows($fetch_order_inpro);

$fetch_order_can= mysqli_query($conn,"SELECT * FROM `users_orders` where order_status='".$cancel."'");
$ordercountcancel = mysqli_num_rows($fetch_order_can);





 $sqlwish="SELECT * FROM `app_productsmain` order by id DESC LIMIT 5";
 $checkorder= mysqli_query($conn, $sqlwish);
 $count=mysqli_num_rows($checkorder); ?>
  
  
  





<div class="box with-border box box-success box-solid">
            <div class="box-header with-border ">
              <h4><center><b>Store Report</b></center></h4>

              <div class="box-tools pull-right">
               
              
                
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"> </span>
                    <h5 class="description-header"><?php echo $currency.$revnue1;?></h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-blue"></span>
                    <h5 class="description-header"><?php echo $ordercountinpro; ?> </h5>
                    <span class="description-text">Orders In Processing</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"> </span>
                    <h5 class="description-header"><?php echo $ordercountcomplete; ?></h5>
                    <span class="description-text">Orders Completed</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"> </span>
                    <h5 class="description-header"><?php echo $ordercountcancel;?></h5>
                    <span class="description-text">Orders cancelled</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
            <hr>
            
                <div class="col-md-8">
                  <p class="text-center">
                   
            <div class="widget-user-header bg-aqua-active">
              <p class="text-center"><strong>Recent Orders</strong></p>
            </div></p>
            <div class="chart">
                  <div class="box-body">
              <div class="table-responsive">
              <table class="table no-margin">
                  <thead>
                <?php if($ordercount<=0){ echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4>
                Waiting for your first order.All the best.
              </div>'; }else{?> <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php  foreach($fetch_order1 as $o){ ?>  <tr>
                    <td><a href="orderstatusdetails.php?id=<?php echo base64_encode($o['id']);?>"><?php echo $o['order_id'];?></a></td>
                    <td><?php 
                     $sqluser="SELECT * FROM `users_profile` where uid='".$o['uid']."'";
 $checkuser= mysqli_query($conn, $sqluser); 
 $userdata=mysqli_fetch_array($checkuser,MYSQLI_ASSOC);
 ?>
 
 
 <?php echo $userdata['name'];?></td>
                     <td>
                     <?php if(!empty($o['phone'])){echo $o['phone'];}else{echo 'Phone no not added';}?>
                    </td>
                    <td><?php if($o['order_status']=='In-Processing'){?>
                    <span class="label label-info"><?php echo $o['order_status'];?></span>
                    <?php }elseif($o['order_status']=='Complete'){?>
                    <span class="label label-success"><?php echo $o['order_status'];?></span> 
                    <?php }elseif($o['order_status']=='Dispatch'){?> <span class="label label-warning">
                    <?php echo $o['order_status'];?></span><?php }elseif($o['order_status']=='Cancel'){ ?>
                    <span class="label label-danger">
                    <?php echo $o['order_status'];?></span><?php } ?></td>
                   
                  </tr>
                  <?php } }?>
                  </tbody>
                </table>
                
              </div>
              <!-- /.table-responsive -->
             
            </div>
             <div class="box-footer text-center">
              <a href="orders.php" class="uppercase">View All Orders</a>
            </div>
                   
                   
                  </div>
                 
                  <!-- /.chart-responsive -->
                </div>
                <div class="col-md-4">
                  <p class="text-center">
                    <div class="widget-user-header bg-green-active"> <strong> <p class="text-center">Recently Added Products</p></strong></div>
                  </p>
<div class="progress-group">
                   <?php if($count<=0){ echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4>
                Please add your first product.
              </div>';}else{foreach($checkorder as $product){?><ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                  
                  <?php   $sqlwish="SELECT * FROM `product_images` WHERE `product_id`='".$product['product_id']."'";
 $checkproduct= mysqli_query($conn, $sqlwish);
 $dataimage=mysqli_fetch_array($checkproduct);?>
                    <img src="<?php echo $dataimage['image'];?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a  href="viewproductsdetails.php?id=<?php echo base64_encode($product['id']);?>"class="product-title"><?php echo $product['product_name'];?>
                      <span class="label label-info pull-right"><?php echo $currency.$product['sellprice'];?></span></a>
                    <span class="product-description">
                         Availability In Stock:<?php echo $product['quantity'];?>
                        </span>
                  </div>
                </li>
                <?php } } ?>
                <!-- /.item -->
              </ul>
              <div class="box-footer text-center">
              <a href="edit-products.php" class="uppercase">View All Products</a>
            </div>
              </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
           
          </div>
</section>
</div>

  <?php include'footer.php';?>
 















