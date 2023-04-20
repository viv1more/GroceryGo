<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php'; ?>
 
  <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
       
        <h4 class="modal-title"> <i class="fa  fa-dropbox fa-5" aria-hidden="true"></i>All Products</li></h4>
      </div>
      <div class="modal-body">
      
  
            
             <a href="add-product.php"><button class="btn btn-primary " class="pull-left"><i class="fa fa-plus-circle fa-6" aria-hidden="true"></i> Add Product</button></a>
             <hr>
             
            <?php
          $sql="SELECT * FROM `app_productsmain` order by id DESC ";
         
          $check= mysqli_query($conn, $sql);
          
          //var_dump($check);

 
 ?>


<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete?');
}
</script>


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="employee_data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Product-Name</th>
                  <th>Image</th>
                  <th>In-Stock</th>
                  
                  <th>Sell-Price</th>
                  
                  <th>Action</th>
                  <th>Manage</th></tr>
</thead>
   
    <?php 
    
    $k=mysqli_fetch_array($check,MYSQLI_BOTH);
   
    
    //echo $product_id;
    
    
 


$sql="SELECT * FROM `app_productsmain` order by id DESC ";
         
          $check= mysqli_query($conn, $sql);
            
while($k=mysqli_fetch_array($check,MYSQLI_BOTH)) {
           //var_dump($k);
            $product_id=$k['product_id'];
                
$sql1="SELECT * FROM `product_images` where product_id='".$product_id."' ";
$checkimage = mysqli_query($conn, $sql1);
$resultcheck= mysqli_fetch_array($checkimage,MYSQLI_ASSOC);
$img=$resultcheck['image'];  
//echo $img;
                   






echo '<tr>               <td> '.$k["id"].'</td><td> '.$k["product_name"].'</td>
                  <td><img src="'.$img.' " height="100" width="80"></td>
                  <td>  '.$k["quantity"].'</td>
                   <td> '.$k["sellprice"].'</td>
  <td><a href="viewproductsdetails.php?id='.base64_encode($k["id"]).'"><button class=" btn btn-primary" >View <i class="fa fa-eye" aria-hidden="true"></i></button></a></td>                
                  <td><a href="editproductsdetails.php?id='.base64_encode($k["id"]).'"><button class=" btn btn-primary  btn-success" >Edit <i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                  
                                 <a href="deleteproducts.php?id='.base64_encode($k['id']).'" class="btn btn-social-icon btn-google" onClick="return checkDelete()" ><i class="fa fa fa-trash-o"></i></a> </td> </tr>';




   }unset($img);?>
               
              </tbody></table>
            </div></div></div></div></div>
</div></section>
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable({ 
   "scrollX": true,
   "pagingType": "numbers",
    "processing": true,
    'searching'   : true, 
    'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false   
   });  
 });  
 </script> 
 
<?php include 'scriptfooter.php'; ?>
      
          