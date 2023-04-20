<?php 
include 'header.php';

  $id=$_GET['id'];
  $id=base64_decode($id);
  //var_dump($id);
        
           $sql="SELECT * FROM `app_slider` where id='".$id."' ";
         // var_dump($sql);
          $check= mysqli_query($conn, $sql);
          $resultcheck= mysqli_fetch_array($check,MYSQLI_ASSOC);
          //echo'<pre>'; var_dump($resultcheck);

          $imgpath=$resultcheck['image'];

          $imgpath=str_replace($serverimg,'',$imgpath);
          //var_dump( $imgpath);
          //exit();
          $query="DELETE FROM `app_slider` where id='".$id."' ";
          $result=mysqli_query($conn,$query) or die("not Deleted". mysql_error());
          if($result==TRUE)
                                    {
              unlink($imgpath);
              ?>
               <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Banner Deleted",
  text: "Successfully ",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "slider.php";
//console.log('The Ok Button was clicked.');
});
</script><?php
          }else
          {?>

              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "slide NOt Deleted",
  text: "Fail to Deleted ",
  icon: "error",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "category.php";
//console.log('The Ok Button was clicked.');
});
</script>
         <?php }
          ?>
