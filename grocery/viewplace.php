<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php'; ?>
 
 
  <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-17 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
            <li class="pull-left header"><i class="fa fa-inbox"></i>Place Details</li>
           
            </ul>
          </div>
            
             <button class="btn btn-primary " class="pull-left" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-6"></i> Add Place</button>
             <hr>
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


 
 ?>
         
            
                
               
             <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i>Product Details.
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
                <th>Address:</th>
                <td><?php echo $resultcheck['address']; ?></td>
              </tr>
              <tr>
                <th>Phone</th>
                <td><?php echo $resultcheck['phone']; ?></td>
              </tr>
              <tr>
                <th>Website</th>
                <td><?php echo $resultcheck['website']; ?></td>
              </tr>
              <tr>
                <th>Facility</th>
                <td><?php echo $resultcheck['facility']; ?></td>
              </tr>
              <tr>
                <th>Images</th>
                <td><img src="<?php echo $resultcheck['image']; ?>" height="100" width="100"></td>
              </tr>
              <tr>
                <th>Description</th>
                <td><p><?php echo $resultcheck['description']; ?></p></td>
              </tr>
<tr>
                  <th>Category</th>
                  <td><?php $sql1="SELECT * FROM `app_category` ";
         // var_dump($sql);
          $check1= mysqli_query($conn, $sql1);
          $resultcheck1= mysqli_fetch_array($check1,MYSQLI_BOTH);

 $sql11="SELECT * FROM `app_places` where place_id='".$_SESSION['place_id']."'";
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
              <tr>
                  <th>Latitude</th>
                  <td><?php echo $resultcheck['latitude']; ?></td>
              </tr>
              <tr>
                  <th>Longitude</th>
                  <td><?php echo $resultcheck['longitude']; ?></td>
              </tr>
              <tr>
               <th> Gallery</th>
              </tr>
            </table>
              <table class="table " >
                 
                  <tr>
                      
              
              <?php 
                
                
                 
                 
                 if($image1=="NULL"){ $image1=$defimg; }
                 if($image2=="NULL") { $image2=$defimg;  }
                 if($image3=="NULL") { $image3=$defimg; }
                 if($image4=="NULL") { $image4=$defimg; }
                 if($image5=="NULL") { $image5=$defimg; }
                 
                
                ?>
                
                
                <td><img  src="<?php echo $image1; ?>" height="100" width="100" ></td>
                <td><img  src="<?php echo $image2; ?>" height="100" width="100" ></td>
                <td><img  src="<?php echo $image3; ?>" height="100" width="100" ></td>
                <td><img  src="<?php echo $image4; ?>" height="100" width="100" ></td>
                <td><img  src="<?php echo $image5; ?>" height="100" width="100" ></td>
             
              </tr>
                            <tr>
                  <td><br>

                       <a href="editplace.php?id=<?php echo base64_encode($resultcheck['id']); ?>"><button type="button" class="btn btn-primary btn-lg  btn-success"><i class="fa fa-pencil-square fa-6" aria-hidden="true"></i> EDIT</button>
                  </td>
                   <td>
                      <br><a href="deleteplace.php?id=<?php echo base64_encode($resultcheck['id']);?>" onClick="return checkDelete()" class="btn btn-social-icon btn-google btn-lg"><i class="fa fa fa-trash-o"></i></a> 
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
</div>
      <?php include 'footer.php'; ?>
      
      
      
      
       
       <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Place</h4>
      </div>
      <div class="modal-body">
        
          <form role="form" action="add-place.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Place Name" name="placename" required="required">
                </div>
                  <label for="exampleInputEmail1">Address</label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" name="placeaddress" required="required">  
                  </div>
                  <label for="exampleInputEmail1">Facility</label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Facility" name="placefaci" required="required">  
                  </div>
                  <label for="exampleInputEmail1">Description</label>
                  <textarea class="form-control" rows="5" id="comment" placeholder="Enter Description" name="placedes"></textarea>
                  <p> Please Do not use single quotes in description</p>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Phone No</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Place phone no" name="placephone" required="required">
                </div>
                  
                  <div class="form-group">
                  <label for="exampleInputEmail1">Website</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Place webiste" name="placeweb" required="required">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Latitude</label>
                  <input type="text" class="form-control" id="txtlat" placeholder="Enter place Latitude" name="placelat" required="required" oninput="ValidateLat()"  onkeypress="return isFloatNumber(this,event)">
                </div>
                  
                   <div class="form-group">
                  <label for="exampleInputEmail1">Longitude</label>
                  <input type="text" class="form-control" id="txtlon" placeholder="Enter place Longitude" name="placelong" required="required" oninput="ValidateLon()"  onkeypress="return isFloatNumber(this,event)">
                  <p style="float: right"><a target="_blank" href="http://www.mapcoordinates.net/en">COORDINATE PICKER</a></p>
                </div>
                   
                  <div class="form-group">
                  <label for="exampleInputFile">Primary Image</label>
                  <input type="file" id="exampleInputFile" name="placeimg" required>
                  </div>
                  
                   
                  <div class="form-group">
                  <label for="exampleInputFile">optional Image</label>
                  <br>
                  <input type="file" id="optional_id" name="placeimg1" > 
                  <br>
                  <input type="file" id="optional_id1" name="placeimg2"  disabled >
                  
                  <br>
                     <input type="file" id="optional_id2" name="placeimg3" disabled >
                  <br>
                  <input type="file" id="optional_id3" name="placeimg4" disabled > 
                  <br>
                  <input type="file" id="optional_id4" name="placeimg5" disabled>
                  </div>
                  <p class="help-block">Please upload GIf,JPG,Jpeg,BMP,PNG files only.</p>
                  <div class="form-group text-muted well well-sm no-shadow">
 			 <p class="help-block">Please check Atleast One Category.</p>                     
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
              <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add Place" name="addplace" id="postme" disabled title='Fill all the deatails completely'>
      </form>
</div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

var checkboxes = $("input[type='checkbox']"),
submitButt = $("input[type='submit']");

checkboxes.click(function() {
submitButt.attr("disabled", !checkboxes.is(":checked"));
});

</script>           
        
 <script>$("#optional_id").on("change", function () {
    $("#optional_id1").prop("disabled", !this.value);
})
.trigger('change');


$("#optional_id1").on("change", function () {
    $("#optional_id2").prop("disabled", !this.value);
})
.trigger('change');


$("#optional_id2").on("change", function () {
    $("#optional_id3").prop("disabled", !this.value);
})
.trigger('change');

$("#optional_id3").on("change", function () {
    $("#optional_id4").prop("disabled", !this.value);
})
.trigger('change');

$("#optional_id4").on("change", function () {
    $("#optional_id4").prop("disabled", !this.value);
})
.trigger('change');

function ValidateLat() {
            var lat = document.getElementById("txtlat").value;
            

            if (lat < -90 || lat > 90) {
                alert("Latitude must be between -90 and 90 degrees inclusive.");
                return;
            }
             
            
            else if (lat == "") {
                alert("Enter a valid Latitude or Longitude!");
                return;
            }
        }

function ValidateLon() {
           var lng = document.getElementById("txtlon").value;
            

            if (lng < -180 || lng > 180) {
                alert("Longitude must be between -180 and 180 degrees inclusive.");
                return;
                }
            else if (lng == "") {
                alert("Enter a valid Latitude or Longitude!");
                return;
            }
        }



function isFloatNumber(item,evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode==46)
        {
            var regex = new RegExp(/\./g)
            var count = $(item).val().match(regex).length;
            if (count > 1)
            {
            alert("Please enter valid Lat Long input only");
                return false;
            }
        }
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please enter valid Lat Long input only");
            return false;
        }
        return true;
}








</script>
              
      
      
      <?php } ?>
      