<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
         Grocery Go Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> <a href="<?php echo basename($_SERVER['PHP_SELF']);?>"><?php echo str_replace(".php","",basename($_SERVER['PHP_SELF']));?></a></li>
      </ol>
    </section>

<?php
           $sql="SELECT * FROM `users` order by id DESC ";
         
          $check= mysqli_query($conn, $sql);?>

<!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
       
        <h4 class="modal-title"> <i class="fa fa-address-book-o fa-2" aria-hidden="true"></i> All-Users</li></h4>
      </div>
      <div class="modal-body">
 <!--<a class="btn btn-primary pull-left" href="add.php"><i class="fa fa-plus-circle fa-6" aria-hidden="true"></i> Add User</a>--><br>
            
            <div class="box-body table-responsive no-padding">
              <table id="employee_data" class="table table-bordered table-hover">
                <thead><tr>
                  
                  <th>Name</th>
                  <th>Email</th>
                  <th >Status</th>
                  <th >Action</th>

                </tr></thead>
      <?php          
while($faq= mysqli_fetch_array($check,MYSQLI_BOTH)) { ?>
                <tr>
                

                                   <td><?php echo $faq['name'];?></td>
                  <td><?php echo $faq['email'];?></td>
                 

<td><?php if($faq['status']=="INACTIVE") { echo '<span class="badge bg-red">'.$faq['status']; }else{ echo '<span class="badge bg-green">'.$faq['status']; }?></td>

                  <td><a href="editemail.php?id=<?php echo base64_encode($faq['id']);?>"><button class=" btn btn-primary" >Edit<i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                  <a href="deleteemail.php?id=<?php echo base64_encode($faq['id']);?>"><button type="button" class="btn btn-primary" onClick="return checkDelete()" >Delete<i class="fa fa-trash-o" aria-hidden="true"></i></button></a></td>


 
 <?php  } ?>
               </tbody></table>
            
           
            
          </div></div></div></div></div></div>
</div></section></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
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
























