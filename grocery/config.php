<?php
session_start();
//error_reporting(0);
$servername = "localhost";
$username = "grocerygostore";
$password = "Suyog@33";
$dbname = "GroceryGoo";
/////////////////////////////////////////////connection .///////////////////////////////////////////
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$serveradd='http://'.$_SERVER['SERVER_NAME'].'/grocery/app_dashboard_store/JSON/';
$serverimg='http://'.$_SERVER['SERVER_NAME'].'/grocery/app_dashboard_store/';
$defimg=$serverimg.'uploads/default-image/defaultimage.png';
 
?>