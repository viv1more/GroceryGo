<?php 
include 'header.php';
if(isset($_POST['addcat']))
    {

$product_id = $_POST['product_id'];
  $cats = mysqli_query($conn,"SELECT * FROM `app_productsmain` where product_id='".$product_id."'");
$rows = mysqli_fetch_array($cats);   

$product_name=$rows['product_name'];

//////////////////////////////////////////////////////////
$new=rand(99,1000);
$category_image = $_FILES['catimg']['name'];
$category_image=preg_replace('/\s/', '',$category_image);
$target_dir = "uploads/slider/";
$target_file = $target_dir . $new.preg_replace('/\s/', '',basename($_FILES["catimg"]["name"]));
$target_file1= $serverimg.$target_file;
$uploadOk = 1;
//var_dump($target_file);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//var_dump($imageFileType);
//var_dump($uploadOk);

// Check if file already exists
//if (file_exists($target_file)) {
   // echo "Sorry, file already exists.";
   // $uploadOk = 0;
//}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    echo '$uploadOk';
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   ?>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "OOPS ",
  text: "file Not Uploded",
  icon: "error",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "slider.php";
//console.log('The Ok Button was clicked.');
});
</script>
        
        <?php
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["catimg"]["tmp_name"], $target_file)) {
        
        $category_insert = mysqli_query($conn,"INSERT INTO app_slider (product_id,image,product_name) VALUES('".$product_id."','".$target_file1."','".$product_name."')");
        ?>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
    swal({
  title: "Banner Added ",
  text: "Successfully",
  icon: "success",button: "close"
}).then(function() {
// Redirect the user
window.location.href = "slider.php";
//console.log('The Ok Button was clicked.');
});
</script>
<?php
        
        //echo "The file ". basename( $_FILES["catimg"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


    }else {
        
        header("location:slider.php"); }
        