<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['name']; ?></p>
         
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
         </li>



<li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Store Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<li><a href="currency_settings.php"><i class="fa fa-money"></i>Store Details</a></li>
           
            <li><a href="image_settings.php"><i class="fa fa-file-image-o"></i>Product Image</a></li>


          </ul>
        </li>
 
<li><a href="slider.php"><i class="fa fa-image fa-4"></i> Banner</a></li>

        
        <li>
          <a href="category.php">
            <i class="fa fa-th"></i> <span>Categories</span>
<span class="pull-right-container">
              <span class="label label-primary pull-right"><?php echo $catcount;?></span>
            </span>
            
            </span>
          </a>
        </li>

<li class="treeview">
          
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?php echo $productcount;?></span>
            </span>
            
          </a>
          <ul class="treeview-menu">
            <li><a href="add-product.php"><i class="ion ion-ios-cart-outline"></i>Add Products</a></li>
            <li><a href="edit-products.php"><i class="fa fa-shopping-basket fa-4"></i>Manage Products</a></li>
            
          </ul>
        </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<li><a href="faq.php"><i class="fa fa-question-circle fa-4"></i>FAQ</a></li>
<li><a href="policy.php"><i class="fa  fa-info fa-4"></i>Policies</a></li>
      </ul></li>      

<li>
          <a href="orders.php">
            <i class="fa  fa-truck"></i>
            <span>Order List</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?php echo $ordercount;?></span>
            </span>
          </a>
        </li>

<li><a href="emailusers.php"> <i class="fa fa-users fa-4"></i> Manage Users</a></li>
 <li>
          <a href="notification.php">
            <i class="fa fa-bell"></i> <span>Push Notification</span>
          </a>
         </li>




 <li><a href="profile.php"><i class="fa  fa-gear fa-4"></i>Admin Settings</a></li>



<li>
          <a href="logout.php">
            <i class="fa fa-edit"></i> <span>Logout</span>
            </span>
          </a>
                  </li>
        
            </section>
    <!-- /.sidebar -->
  </aside>
