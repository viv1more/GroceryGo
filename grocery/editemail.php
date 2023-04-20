<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>

  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $userCount; ?></h3>

              <p>Email Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-internet-explorer"></i>
            </div>
            <a href="emailusers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $userCountfb; ?><sup style="font-size: 20px"></sup></h3>

              <p>Facebook Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-facebook"></i>
            </div>
            <a href="fbusers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $userCountgoogle; ?></h3>

              <p>Google Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-google-plus"></i>
            </div>
            <a href="googleusers" class="small-box-footer">More info <i class="fa fa-google-plus"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $total; ?></h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people-outline"></i>
            </div>
  <i class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          
          </div>      </div>
        <!-- ./col -->
      </div>
      
            <!-- <h1> hello</h1> -->
      <br>
       <?php
       
       $uid=$_GET['id'];
       $uid=base64_decode($uid);
           $sql="SELECT * FROM `users` WHERE id='$uid' ";
         // var_dump($sql);
          $check= mysqli_query($conn, $sql);
          $resultcheck= mysqli_fetch_array($check,MYSQLI_BOTH);
          //var_dump($resultcheck);

 $conn->close();
 
 
// var_dump($resultcheck);
 ?>
    <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="upemail.php" method="post">
              <div class="box-body">
                  <div class="form-group">
                  <input class='input' type='hidden' name='id' value="<?php echo $uid; ?>" />
                  </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $resultcheck['email']; ?>" name="email" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Name" value="<?php echo $resultcheck['name']; ?>" name="name">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <input type="submit" class="btn btn-default pull-right" value="Update" name="update">
               
              </div>
              <!-- /.box-footer -->
            </form>
          </div>            

                
            </div>
           
          </div>
          <!-- /.box -->

              </form>
            </div>
            <!-- /.box-body -->
          </div>
    
            <!-- /.box-body -->
          </div>
      </section>


<?php include 'footer.php';?>
