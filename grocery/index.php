<?php 

require_once 'config.php';
//var_dump($_POST);

if (empty($_SESSION['id']) && empty($_SESSION['name'])){
 


if(isset($_POST['submit'])){
	$user_email = $_POST['email'];
	$user_email=filter_var($user_email, FILTER_SANITIZE_EMAIL);
	$user_pwd = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
	
	if(!empty($user_email) && !empty($password)){
		$query = mysqli_query($conn,"SELECT * FROM app_admin WHERE email='".$user_email."' AND password='".$user_pwd."'");

		if(mysqli_num_rows($query) > 0 && mysqli_num_rows($query) == 1){
			while($row = mysqli_fetch_array($query)){
				$_SESSION['id'] = $row['admin_id'];
				$_SESSION['name']=$row['name'];
                                $_SESSION['img']=$row['user_img'];
                                $_SESSION['email']=$row['email'];
                                $_SESSION['compney']=$row['compney'];
				header("Location: dashboard.php");
			}
		}
		else{
			$msg = 'Invalid Email or password';
			
		}
	}
	else{
		$msg = "Fields cannot be empty";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Pannel | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<style></style>

<div class="login-box">
  <div class="login-logo">
<img src="http://theavishkar.com/groceryGo.png" height="100" width="100"><br>
    <a href="index.php"><b><font color="white">Grocery Go</b></a><br>
 <a href="index.php"><font color="white">Admin Panel</a></font>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
   <p class="login-box-msg"><font color="red" size="5"><?php if(isset($_POST['submit'])){ print_r($msg);}else{ echo "Sign In" ; } ?></p>

    <form method="post">
      <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Sign In"</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
<?php }else{
    header("location:dashboard.php");
} ?>