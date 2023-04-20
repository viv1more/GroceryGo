<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php'; ?>
 
   
<?php 

$id=$_GET['id'];
$id= base64_decode($id);
//echo $id;

$editimageshandel="SELECT * FROM app_admin";
$gethandel=mysqli_query($conn, $editimageshandel);
$resulthandel=mysqli_fetch_array($gethandel,MYSQLI_ASSOC);
$imagehandel=$resulthandel['currency'];
$tax1=$resulthandel['tax'];
$ship=$resulthandel['shipping'];
$compney=$resulthandel['compney'];
$address=$resulthandel['address'];
//var_dump($imagehandel);


$orderdetails="SELECT * FROM users_orders where id='".$id."'";
$orderquery=mysqli_query($conn, $orderdetails);
$orderdata=mysqli_fetch_array($orderquery);
//var_dump($orderdata);



$userdetails="SELECT * FROM users_profile where uid='".$orderdata['uid']."'";
$userquery=mysqli_query($conn, $userdetails);
$userdata=mysqli_fetch_array($userquery);
//var_dump($userdata);

$sqlwish="SELECT * FROM `ordered_product` WHERE `order_id`='".$orderdata['order_id']."' ";
 $checkcart= mysqli_query($conn, $sqlwish);
$productdata=mysqli_fetch_array($checkcart);
//var_dump($productdata);


$qrycurr = "SELECT * FROM app_admin ";
    $res = mysqli_query($conn, $qrycurr);
    $admindata = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $tax=$admindata['tax'];
    if($admindata['currency']=='USD'){ $currency='$'; }else{$currency='₹';}
?> 
 
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
           <?php echo $compney;?>
            <small class="pull-right"><?php echo $orderdata['order_date'];?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?php echo $compney;?></strong><br>
           <?php echo $address;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $userdata['name'];?></strong><br>
            <?php echo $orderdata['address'];?><br>
            
            Phone: <?php echo $orderdata['phone'];?><br>
            Email: <?php echo $userdata['email'];?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?php echo $orderdata['order_id'];?></b><br>
          <br>
          <b>Order ID:</b> <?php echo $orderdata['order_id'];?><br>
          <b>Payment Status:</b><?php echo $orderdata['payment_status'];?> <br>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product Name</th>
              <th>Color</th>
              <th>Size</th>
              <th>Image</th>
              <th>Price</th>
              
            </tr>
            </thead>
            <tbody>
            <?php foreach($checkcart as $cartiteams){ ?>

<tr>
              <td><?php echo $cartiteams['quantity'];?></td>
              <td><?php echo $cartiteams['product_name'];?></td>
              <td><?php echo $cartiteams['color'];?> </td>
              <td><?php echo $cartiteams['size'];?> </td>
              <td><img src="<?php echo $cartiteams['product_image'];?>" height="50" width="40"></td>
              <td><?php echo $currency; echo $cartiteams['sellprice'];?></td>
            </tr>
           <?php  $totalPrice += $cartiteams['quantity'] * $cartiteams['sellprice'];?>
            <?php }?>
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods: <?php echo $orderdata['paymentmode']; ?><?php if($orderdata['paymentmode']=='Stripe Payment-Gateway'){  ?></p>
           
          <img src="dist/img/credit/visa.png" alt="Visa">
          <img src="dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="dist/img/credit/american-express.png" alt="American Express">
          <img src="dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           <b>Payment TXN ID: <?php echo $orderdata['paymentref'];?></b>
          </p>
          <?php }elseif($orderdata['paymentmode']=='RazorPay Payment-Gateway'){ ?>
          
          <br><img src="razor.png" width="200">
           
           <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           <b>Payment TXN ID: <?php echo $orderdata['paymentref'];?></b>
          </p>
          <?php }elseif($orderdata['paymentmode']=='Paypal Payment-Gateway'){ ?>
          
          <br><img src="paypal.png"  height="30" width="120">
           
           <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           <b>Payment TXN ID: <?php echo $orderdata['paymentref'];?></b>
          </p>
          <?php }else{?>
          <br><img src="cod.png" alt="Visa" height="70" width="200">
           <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           <b>Payment TXN ID: <?php echo $orderdata['paymentref'];?></b>
          </p>
          <?php }?>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"><?php echo $orderdata['order_date'];?></p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td><?php echo $currency; echo $totalPrice; ?></td>
              </tr>
              <tr>
                <th>Tax (<?php echo $admindata['tax'];?> %)</th>
                <td><?php echo $currency; echo $tax1=$totalPrice * ( $tax/ 100);?></td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td><?php echo $currency; echo $shipping=$admindata['shipping'];?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td><?php echo $currency; echo $grand=$totalPrice+$tax1+$shipping;?></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      </div>
    </section>
<?php include'scriptfooter.php';?>