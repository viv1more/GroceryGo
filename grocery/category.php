<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php'; ?>
 
      
      
      <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
       
        <h4 class="modal-title"> <i class="fa fa-list-ol fa-5" aria-hidden="true"></i>Category</li></h4>
      </div>
      <div class="modal-body">
      
     
  
            
             <button class="btn btn-primary " class="pull-left" data-toggle="modal" data-target="#myModal">Add Category</button>
             <hr>
                 <br>
            <!--<h1>hello</h1>-->
            <?php
           $sql="SELECT * FROM `app_category` order by cat_id DESC ";
         
          $check= mysqli_query($conn, $sql);
          
          

 
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
              <h3 class="box-title">All Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="employee_data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th>Name</th>
                  <th>Image</th>
                  <th >Action</th>

                </tr></thead>
   <?php            
while($k= mysqli_fetch_array($check,MYSQLI_BOTH)) {
                echo '<tr>
                

                                   <td>'.$k['category_name'].'</td>
                  <td><img src="'. $k['category_image'].'" height="100" width="100"></td>
                  <td><a href="editcategory.php?id='.base64_encode($k['cat_id']).'"><button class=" btn btn-primary btn-warning" >Edit<i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                  <a href="deletecategory.php?id='.base64_encode($k['cat_id']).'" class="btn btn-social-icon btn-google" onClick="return checkDelete()" ><i class="fa fa fa-trash-o"></i></a></td> </tr>';




   }?>
               
              </tbody></table>
            </div></div></div></div></div>
</div></section>
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable({ 
   "scrollX": true,
   'paging'      : true,
    "processing": true,
    'searching'   : true, 
    'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false   
   });  
 });  
 </script> 
 
<?php include 'scriptfooter.php'; ?>
      
      
      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Category</h4>
      </div>
      <div class="modal-body">
        
          <form role="form" action="add-cat.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" name="catname" required="required">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Category Image</label>
                  <input type="file" id="exampleInputFile" name="catimg" required>

                  <p class="help-block">Please upload GIf,JPG,Jpeg,BMP,PNG files only.</p>
                </div>
                
              </div>
        
        
        
      
      <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Add Category" name="addcat">
      </form>
</div>
      </div>
    </div>

  </div>
</div>
      
      
      