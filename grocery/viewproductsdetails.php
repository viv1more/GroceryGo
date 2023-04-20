<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php'; ?>
 
  <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
       
        <h4 class="modal-title"> <i class="fa fa-shopping-cart fa-2" aria-hidden="true"></i> Products Details</li></h4>
      </div>
      <div class="modal-body">     
  
            
             
            
                 <br>
            <!--<h1>hello</h1>-->
            <?php
            $id=$_GET['id'];
            $id= base64_decode($id);
            
            if(empty($id))
            {
            echo'<script> alert("unauthrosize access not allowed");
            window.location.assign("dashboard.php")
            </script>';}else{
             
           $sql="SELECT * FROM `app_productsmain` where id='".$id."' ";
         // var_dump($sql);
          $check= mysqli_query($conn, $sql);
          $resultcheck= mysqli_fetch_array($check,MYSQLI_BOTH);
          //var_dump($resultcheck);
          $image1=$resultcheck['image1'];
          $image2=$resultcheck['image2'];
          $image3=$resultcheck['image3'];
          $image4=$resultcheck['image4'];
          $image5=$resultcheck['image5'];

$_SESSION['product_id']=$resultcheck['product_id'];

$sql="SELECT * FROM `product_images` where product_id='".$_SESSION['product_id']."' ";
          $checkimage= mysqli_query($conn, $sql);
          $resultcheckimage= mysqli_fetch_array($checkimage,MYSQLI_BOTH);
 
 ?>
         
            
          
               
             <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
          <i class="fa fa-eercast" aria-hidden="true"></i>Details
            <small class="pull-right"><?php echo $resultcheck['date']; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
      <!-- /.col -->
        <div class="col-xs-10">
          <p class="lead"><?php echo $resultcheck['product_name']; ?></p>

          <div class="table">
            <table class="table" >
              <tr>
                <th>Regular Price:</th>
                <td><?php echo $resultcheck['price']; ?></td>
              </tr>
 <tr>
                <th>Selling Price:</th>
                <td><?php echo $resultcheck['sellprice']; ?></td>
              </tr>
              <tr>
                <th>Colour:</th>
                <td><?php echo $resultcheck['color']; ?></td>
              </tr>
              <tr>
                <th>Size:</th>
                <td><?php echo $resultcheck['size']; ?></td>
              </tr>
              <tr>
                <th>Status:</th>
                <td><?php if($resultcheck['product_status']==1){ echo 'Avialable';}elseif($resultcheck['product_status']==0){echo 'Not avialable';}elseif($resultcheck['product_status']==2){ echo'Low stock';} ?></td>
              </tr>
              <tr>
                <th>Images:</th>
                <td><img src="<?php echo $resultcheckimage['image']; ?>" height="200" width="100"></td>
              </tr>
              <tr>
                <th>Description</th>
                <td><p><?php  $product_des=$resultcheck['description'];
            $resultcheck['description']=htmlspecialchars_decode(str_replace("&quot;", "\"", $product_des)); 
            echo htmlspecialchars_decode($product_des); ?></p></td>
              </tr>
<tr>
                  <th>Category</th>
                  <td><?php $sql1="SELECT * FROM `app_category` ";
         // var_dump($sql);
          $check1= mysqli_query($conn, $sql1);
          $resultcheck1= mysqli_fetch_array($check1,MYSQLI_BOTH);

 $sql11="SELECT * FROM `app_products` where product_id='".$_SESSION['product_id']."'";
         // var_dump($sql);
          $check11= mysqli_query($conn, $sql11);
          $autocheck= mysqli_fetch_array($check11,MYSQLI_ASSOC);
//foreach($check11 as $row1){var_dump($row1);}exit();
//exit();
                      
                      foreach($check1 as $row){   
                      
                      
                      ?>
                      
                       <div class="checkbox-inline">
                           <?php foreach($check11 as $row1) { if ($row['cat_id']==$row1['cat_id']) {echo $row['category_name']; }else { } }?>                      </div>
                      
                      <?php }?>
                       <br>
                      </td>
              </tr>
               <th> Gallery</th>
              </tr>
            </table>
              <table class="table " >
                 
                  <tr>
                      
              
              <?php 
                foreach($checkimage as $image){
                ?>
                
                 <td> <li data-toggle="modal" data-target="#myModal"><a href="#myGallery" data-slide-to="0"><img  src="<?php echo $image['image']; ?>"height="200" width="100" ></a></td>
                
               <?php  } ?>
             
              </tr>

 <!--begin modal window-->
<div class="modal fade" id="myModal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<div class="pull-left"><?php echo $resultcheck['product_name']; ?></div>
<button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
</div>
<div class="modal-body">





<!--begin carousel-->
<div id="myGallery" class="carousel slide" data-interval="false">
<div class="carousel-inner">
<div class="item active"><center> <img class="img-responsive" src="<?php echo $image['image']; ?>" alt="item0" height="200" width="100" >
</div>

<?php 
                foreach($checkimage as $image){
                ?>

<div class="item"> <center><img src="<?php echo $image['image']; ?>" alt="item1" height="200" width="100"></center>

</div>

<?php } ?>

<!--end carousel-inner--></div>
<!--Begin Previous and Next buttons-->
<a class="left carousel-control" href="#myGallery" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myGallery" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
<!--end carousel--></div>









<!--end modal-body--></div>
<div class="modal-footer">
<div class="pull-left">

</div>
<button class="btn-sm close" type="button" data-dismiss="modal">Close</button>
<!--end modal-footer--></div>
<!--end modal-content--></div>
<!--end modal-dialoge--></div>
<!--end myModal-->></div>


   

                        <tr>
                  <td><br>

                       <a href="editproductsdetails.php?id=<?php echo base64_encode($resultcheck['id']); ?>"><button type="button" class="btn btn-primary btn-lg  btn-success"><i class="fa fa-pencil-square fa-6" aria-hidden="true"></i> EDIT</button>
                  </td>
                   <td>
                      <br><a href="deleteproducts.php?id=<?php echo base64_encode($resultcheck['id']);?>" onClick="return checkDelete()" class="btn btn-social-icon btn-google btn-lg"><i class="fa fa fa-trash-o"></i></a> 
                  </td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


          </section>
      </div></section>
</div></div>
      <?php include 'footer.php'; ?>
      
      
      
      
       
       
      <?php } ?>
      