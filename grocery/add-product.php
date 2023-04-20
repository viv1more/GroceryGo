<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php'; ?>

<?php $editcurrencyhandel="SELECT currency FROM app_admin";
$gethandelcurrency=mysqli_query($conn, $editcurrencyhandel);
$resulthandelcurr=mysqli_fetch_array($gethandelcurrency,MYSQLI_ASSOC);
$currency=$resulthandelcurr['currency'];

?> 
<?php if($currency=='USD'){ $currency='$'; }else{ $currency='₹';}?>
<style>
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
}

.my-error-class {
    color:red;
}
.my-valid-class {
    color:green;
}</style>


<div class="modal-content ">
      <div class="modal-header">
        
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-shopping-cart fa-4" aria-hidden="true"></i> Add Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-container">
 
	<?php $editimageshandel="SELECT image_handel FROM app_admin";
$gethandel=mysqli_query($conn, $editimageshandel);
$resulthandel=mysqli_fetch_array($gethandel,MYSQLI_ASSOC);
$imagehandel=$resulthandel['image_handel'];?>
                <form role="form" method="POST" enctype="multipart/form-data" action="product-process.php"  >
                <!-- text input -->
                <div class="form-group">
                  <label>Product Name:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Enter name of your product"></i>
                  <input type="text" class="form-control" placeholder="Enter name of your product" name="name" required>
                </div>
                
                
                <div class="form-group">
                  <label>Product Description:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Enter description of your product"></i>
                   
								<textarea name="editor1" id="editor1" rows="10" cols="80" required>
									
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
                  <input type="text" class="form-control" placeholder="Enter size of your product like S,M,L,Xl" name="size" >
                </div>
                <div class="form-group">
                  <label>Product Color (Optional) :</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Seperated by commas. For example: Red,Green,Blue"></i>
                  <input type="text" class="form-control" placeholder="Enter colour of your product like Red,Green,Blue" name="colour">
                </div>
                 <div class="form-group">
                  <label>Regular Price(Optional):</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="MRP of your product. Don't use comma. For example: 1000"></i>
<div class="input-group">
                <span class="input-group-addon"><?php echo $currency;?></span>
                <input type="number" placeholder="1.0" step="0.01" min="0" max="10000000" class="form-control" name="price"  id="mrp">
                
              </div>

                  
                

                 <div class="form-group">
                  <label>Selling Price:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Selling price of your product. Must be less than MRP. Don't use comma. For example: 900"></i>
<div class="input-group">
                <span class="input-group-addon"><?php echo $currency;?></span>
                <input type="number" placeholder="1.0" step="0.01" min="0" max="1000000000" class="form-control"   name="sellprice" onfocusout="myFunction()" required id="sp">
                
              </div>           

                   
                <div class="form-group">
  <label for="sel1">Product Status:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Choose status of your product."></i>
  <select class="form-control" id="sel1" name="product_status" required>
                      <option value="In-stock">Available</option>
                       <option value="coming-soon">Not Available</option>
<option value="low-stock">Low Stock</option>
                       
  </select>
</div>
                <div class="form-group">
                  <label>Product Quantity:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Stock quantity of your product. For example: 10"></i>
                  <input type="number"  class="form-control" placeholder="Enter stock quantity of your product" name="quantity" required id="stock">
                </div>
                <div class="form-group">
                  <label>Product Quantity Limit Per Order:</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="How many quantity customer can order at one time. Keep it between 1 to 5 to avoid spam bulk orders."></i>
                  <input type="number" class="form-control" placeholder="No. of quantity customer can order at one time" name="plimit" onfocusout="myFunction1()" id="limit" required >
                </div>
               
                 <div class="form-group">

                  <label for="exampleInputFile">Product Images</label> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Add at least one image of your product."></i>
                  <br>
<div class="input-files1"><a class="fa fa-plus fa-4 btn btn-primary" aria-hidden="true"  id="moreImg">Add More Image</a></div>
                 
<br>
<div class="input-files">

                  <input type="file" name="image_upload-1" required>

                  </div>
<p class="help-block">Please upload GIf,JPG,Jpeg,BMP,PNG files only.</p>



                  <div class="form-group text-muted well well-sm no-shadow">
 			 <p class="help-block">Please check at least one category.</p>                     
                      <lable><b>Categories</b></lable><br>
                      
                      <?php $sql1="SELECT * FROM `app_category` ";
         // var_dump($sql);
          $check1= mysqli_query($conn, $sql1);
          $resultcheck1= mysqli_fetch_array($check1,MYSQLI_BOTH);
                      
                      foreach($check1 as $row){?>
                      
                       <div class="checkbox-inline">
                           <span style="margin-left:10px"></span><input name="chk[]" value="<?php echo $row['cat_id'];?>" type="checkbox" id="mycheckbox"><span><?php echo $row['category_name'];?> </span><span style="margin-left:10px"></span>
                      </div>
                      
                      <?php } ?>
                       <br>
                              
                  </div>
              </div>

       

               <div class="box-footer">
                   <input type="submit" class="btn btn-primary" value="Add product" name="addproduct" id="postme" disabled title='Fill all the deatails completely'>

              </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>





var checkboxes = $("input[type='checkbox']"),
submitButt = $("input[type='submit']");

checkboxes.click(function() {
submitButt.attr("disabled", !checkboxes.is(":checked"));
});
$("#sel1").change(function() {
    var disabled = (this.value == "not" || this.value == "default");
    console.log(disabled);
    $("#product_text").prop("disabled", disabled);
}).change(); //to trigger on load
</script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			var id = 1;
                        var high= "<?php echo $imagehandel; ?>";
			$("#moreImg").click(function(){
				var showId = ++id;
				if(showId <=high)
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
if(sp >= mrp )
{

//alert('oye teri');
swal({
  title: "Please Review",
  text: "Selling price must be less than Regular price",
  icon: "warning",
  
});
}

}

///////

function myFunction1() {
    //alert("Input field lost focus.");

  
   
var stock = $('#stock').val();
var limit = $('#limit').val();
//alert('stock is:'+stock);
//alert('limit:'+limit);
if(limit >= stock )
{

//alert('oye teri');
swal({
  title: "Please Review",
  text: "Quantity per order limit must be less than availability in your stock. Keep it between 1 - 5 to avoid spam bulk orders.",
  icon: "warning",
  
});
}

}
</script>


      <?php include 'scriptfooter.php';?>

      
     