<?php
include'header.php';    
    
 $uid=$_GET['id'];
       $uid=base64_decode($uid); 
 
$email=$_POST['email'];
//$user_email=filter_var($user_email, FILTER_SANITIZE_EMAIL);
$name=$_POST['name'];
//var_dump($uid); 
// var_dump($name);
//var_dump($email); 
   
   

$update_admin = mysqli_query($conn,"DELETE FROM  `users`  WHERE id='".$uid."'");
if($update_admin){
    ?>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Record Deleted",
  text: "Successfully",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "emailusers.php";
//console.log('The Ok Button was clicked.');
});
</script>

      <?php
               } else {
                            
                     echo 'query fail';
                     echo"<script>  
window.location = 'emailusers.php';
</script>";
                        
                        }
   exit();

?>