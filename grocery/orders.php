<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
<?php include 'widget.php'; ?>
 
  <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
       
        <h4 class="modal-title"> <i class="fa fa-gift fa-5" aria-hidden="true"></i>All Orders</li></h4>
      </div>
      <div class="modal-body">
      
  
            
            
             
            


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
              <h3 class="box-title">Manage orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="employee_data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                   <th>Order-Id</th>
                  
                  <th class="col-md-3">Address</th>
                  <th>Phone</th>
                  <th >Date</th>
                  <th >Status</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  </tr>
</thead>
 
   <?php
          $sql="SELECT * FROM `users_orders` order by id DESC ";
         
          $check= mysqli_query($conn, $sql);
          ?>
          
          
 <?php 
 
 foreach($check as $faq){?>
 
 <?php echo'
 <tr>
  <td>'.$faq['order_id'].'</td>
  <td class="col-md-3"> '.$faq['address'].'</td>
                   <td> '.$faq['phone'].'</td>
                   <td class="col-md-3"> '.$faq['order_date'].'</td>
<td class="col-md-3">'; if( $faq['order_status']=='In-Processing'){

echo '<div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 10%"></div>
                    </div>
                      
                    </div>
                    <br> '.$faq['order_status'].''; }elseif( $faq['order_status']=='Dispatch'){

 
 echo'<div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                    <br> '.$faq['order_status'].'';
 
 }elseif($faq['order_status']=='Complete'){

echo'<div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                      
                    </div>
                    <br> '.$faq['order_status'].'';

 }elseif( $faq['order_status']=='Cancel'){ 

echo '<div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
                      
                    </div>
                    <br> '.$faq['order_status'].'';}
                   
      echo '<td><a href="vieworderdetails.php?id= '.base64_encode($faq['id']).'"><span class="label"><button class=" btn btn-primary">View <i class="fa fa-eye" aria-hidden="true"></i></button></a>  </td> 


<td><a href="orderstatusdetails.php?id= '.base64_encode( $faq['id']).'"><span class="label"><button class=" btn btn-success" >Edit</button></a>  </td>   


<td><a href="deleteorderdetails.php?id= '.base64_encode( $faq['id']).'"><span class="label"><button class=" btn btn-danger" onClick="return checkDelete()">Delete <i class="fa fa-trash" aria-hidden="true"></i></button></a>  </td>               
               

                                  
                               </span></td> </tr>';
                               ?>             
<?php }?>

 
 
 
 
 
 
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
      
          