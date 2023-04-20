<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php'; ?>


<style>
.row li {
  width: 33.3%;
  float: left;
}

img {
  border: 0 none;
  display: inline-block;
  
  max-width: 100%;
  vertical-align: middle;
}
.form-container{
	margin-left:5px;
	margin-top:10px;
}

.input-files input[type=file]{
	display:block;
	border:1px solid #eeeeee;
	position:relative;
	margin-bottom:5px;
	width:250px;
}
.add-more-cont{margin:10px 0px 10px 0px;}

#add_more{
	font-size:13px;
	color:blue;
}

#add_more:hover{
	cursor:pointer;
}
.error-msg{
	background-color:#f2dede;
	border:1px solid #ebccd1;
	font-size:14px;
	color:#a94442;
	width:350px;
	padding:4px;
	margin-bottom:5px;
}
.success-msg{
	background-color:#dff0d8;
	border:1px solid #d6e9c6;
	font-size:14px;
	color:#3c763d;
	width:350px;
	padding:4px;
	margin-bottom:5px;
}div.show-image {
    position: relative;
    float:left;
    margin:5px;
height:50%;
}
div.show-image:hover img{
    opacity:0.5;
}
div.show-image:hover input {
    display: block;
}
div.show-image input {
    position:absolute;
    display:none;
}
div.show-image input.update {
    top:0;
    left:0;
}
div.show-image input.delete {
    top:0;
    left:79%;
}



</style>

<?php 
$id=$_GET['id'];
$id= base64_decode($id);

//echo $id;
$edit="SELECT * FROM app_productsmain where id='".$id."'";
$getproducts=mysqli_query($conn, $edit);
$resultofedit= mysqli_fetch_array($getproducts,MYSQLI_ASSOC);

$product_id=$resultofedit['product_id'];
$_SESSION['product_id']=$product_id;
$editimages="SELECT * FROM product_images where product_id='".$product_id."'";
$getproductimages=mysqli_query($conn, $editimages);
$imagecounter=mysqli_num_rows($getproductimages);

$editimageshandel="SELECT image_handel FROM app_admin";
$gethandel=mysqli_query($conn, $editimageshandel);
$resulthandel=mysqli_fetch_array($gethandel,MYSQLI_ASSOC);
$imagehandel=$resulthandel['image_handel'];
//var_dump($imagehandel);
$editcurrencyhandel="SELECT currency FROM app_admin";
$gethandelcurrency=mysqli_query($conn, $editcurrencyhandel);
$resulthandelcurr=mysqli_fetch_array($gethandelcurrency,MYSQLI_ASSOC);
$currency=$resulthandelcurr['currency'];

?> 
<?php if($currency=='USD'){ $currency='$'; }else{ $currency='₹';}?>


<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-shopping-cart fa-4" aria-hidden="true"></i> Edit Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-container">
 
	 <a class="btn btn-primary pull-left" href="add-product.php"><i class="fa fa-plus-circle fa-6" aria-hidden="true"></i> Add Products</a><br><hr>
 
 
	
                <form role="form" method="POST" enctype="multipart/form-data" action="update-product.php"  >
                <!-- text input -->
                <div class="form-group">
                  <label>Product Name:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Enter name of your product"></i>
                  <input type="text" class="form-control" placeholder="Enter Name of product" name="name" required value="<?php echo $resultofedit['product_name'];?>" required>
                </div>
                
                
                 <div class="form-group">
                  <label>Product Description:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Enter description of your product" ></i>
                   
                   
                 <textarea name="editor1" id="editor1" rows="10" cols="80" required>
									<?php echo $resultofedit['description'];?>
								</textarea>
								<script src="ckeditor/ckeditor.js"></script>
								<script>
									// Replace the <textarea id="editor1"> with a CKEditor
									// instance, using default configuration.
									
									CKEDITOR.replace( 'editor1' );
								</script>
                </div>
                  <div class="form-group">
                  <label >Product Size(Optional):</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Seperated by commas. For example: S,M,L,XL,XXL"></i>
                  <input type="text" class="form-control" placeholder="Enter size of product" name="size"  value="<?php echo $resultofedit['size'];?>">
                </div>

<div class="form-group">
                  <label>Product Color (Optional) :</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Seperated by commas. For example: Red,Green,Blue"></i>
                  <input type="text" class="form-control" placeholder="Enter colour of product" name="colour"  value="<?php echo $resultofedit['color'];?>">
                </div>


                <label>Regular Price(Optional):</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="MRP of your product. Don't use comma. For example: 1000"></i>
<div class="input-group">
                <span class="input-group-addon"><?php echo $currency;?></span>
                  <input type="text" step="0.01" min="0" max="10" class="form-control" id="mrp" placeholder="Enter price of product" name="price"  value="<?php echo $resultofedit['price'];?>">
               
              </div>

<div class="form-group">
                  <div class="form-group">
                  <label>Selling Price:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Selling price of your product. Must be less than MRP. Don't use comma. For example: 900"></i>
<div class="input-group">
                <span class="input-group-addon"><?php echo $currency;?></span>
                  <input type="text" class="form-control"  step="0.01" min="0" max="10" id="sp" placeholder="Enter price of product" name="sellprice" required value="<?php echo $resultofedit['sellprice'];?>" onfocusout="myFunction()" required>
                
              </div>

                <span class="input-group-add

                   
               <div class="form-group">
  <label for="sel1">Product Status:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Choose status of your product."></i>
  <select class="form-control" id="sel1" name="product_status" required>
                      <option value="In-stock">Available</option>
                       <option value="coming-soon">Not Available</option>
<option value="low-stock">Low-Stock</option>
                       
  </select>
</div>
                 <div class="form-group">
                  <label>Product Quantity:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Stock quantity of your product. For example: 10"></i>
                  <input type="text" class="form-control" placeholder="Enter quantity of product" name="quantity"  value="<?php echo $resultofedit['quantity'];?>" required>
                </div>
                
  <div class="form-group">
                  <label>Product Quantity Limit Per Order:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="How many quantity customer can order at one time. Keep it between 1 to 5 to avoid spam bulk orders."></i>
                  <input type="text" class="form-control" placeholder="Enter quantity of product" name="plimit"  value="<?php echo $resultofedit['plimit'];?>" required>
                </div>
                
 <div class="form-group">
 <label>Current Images:</label><br>
    <?php foreach ( $getproductimages as $files ) {
$id=$files['id'];
$image=$files['image'];
     echo '<div class="show-image"><img src="'.$image.'" width="100" height="200">';
    echo '<input type="hidden" value="'.$image.'" name="delete_file" />';
    echo '<input type="button" value="Delete image" onclick="delete_post('.$id.');" class="btn btn-sm btn-danger" /></div>';
}   ?>       
   <script>
function delete_post( id ) {
    m = confirm("Are you sure you want to delete this product image?");  
    if( m == true ) {
       $.post('productimagedelete.php', {post_id:id}, // Set your ajax file path
       function( data ) {
         $('#yourDataContainer').html( data ); // You can Use .load too
alert('Deleted');
location.reload();
       });
    } else {
       return false;
    }
}
    </script></div>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  
               

<?php if($imagecounter<$imagehandel){?><br>
                  <br><br><br><br><br><br><br><br><div class="form-group"><br>

                  <br><br><br>

                  <label for="exampleInputFile">Product Images</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Add at least one image of your product."></i>
                  <br>
<div class="input-files1"><a class="fa fa-plus fa-4 btn btn-primary" aria-hidden="true"  id="moreImg">Add More Image</a></div>
                 
<br>
<div class="input-files">

                  <input type="file" name="image_upload-1" >

                  </div>
<p class="help-block">Please upload GIf,JPG,Jpeg,BMP,PNG files only.</p>

<?php }else { echo '<br><br><br><br><br><br><br><br><br><br><br><br><div class="form-group">
 			 <p class="help-block">You have used your image limit('.$imagehandel.' images for single product please delete one and try )</p><div>'; }?>

                 <div class="form-group text-muted well well-sm no-shadow">
 			 <p class="help-block" for="terms" id="terms"><div id="cont"></div>Please check Atleast One Category.</p>                     
                      <lable><b>Categories</b></lable><br>
                      <?php $sql1="SELECT * FROM `app_category` ";
         // var_dump($sql);
          $check1= mysqli_query($conn, $sql1);
          $resultcheck1= mysqli_fetch_array($check1,MYSQLI_BOTH);

 $sql11="SELECT * FROM `app_products` where product_id='".$product_id."'";
         // var_dump($sql);
          $check11= mysqli_query($conn, $sql11);
          $autocheck= mysqli_fetch_array($check11,MYSQLI_ASSOC);
//foreach($check11 as $row1){var_dump($row1);}exit();
//exit();
                      
                      foreach($check1 as $row){   
                      
                      
                      ?>
                      
                       <div class="checkbox-inline">
                           <span style="margin-left:10px"></span><input name="chk[]" value="<?php echo $row['cat_id'];?>" type="checkbox" id="mycheckbox"  <?php foreach($check11 as $row1) { if ($row['cat_id']==$row1['cat_id']) {echo 'checked="checked"'; }else { } }?> ><span><?php echo $row['category_name'];?> </span><span style="margin-left:10px"></span>
                      </div>
                      
                      <?php }?>
                       <br>
                         
                  </div>       

               <div class="box-footer">
                   <input type="submit" class="btn btn-primary" value="Update product" name="addproduct" id="postme"  title='Fill all the deatails completely'>

              </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			var id = 1;
			var high="<?php echo $imagehandel; ?>";
			var counter= "<?php echo $imagecounter; ?>";
			var total=high-counter;
			//alert(high);
			$("#moreImg").click(function(){
				var showId = ++id;
				//alert(counter);
				if(showId <=total)
				{
					$(".input-files").append('<br><input type="file" name="image_upload-'+showId+'">');
				}
			});
		});
	</script>          
<script>
function myFunction() {
    //alert("Input field lost focus.");

  
   
var mrp = $('#mrp').val();
var sp = $('#sp').val();
//alert('mrp is:'+mrp);
//alert('selleing price:'+sp);
if(sp >= mrp)
{

//alert('oye teri');
swal({
  title: "Please Review",
  text: "selling price must be less then Regular price",
  icon: "warning",
  
});
}

}
</script>
      <?php include 'scriptfooter.php';?>
      
     