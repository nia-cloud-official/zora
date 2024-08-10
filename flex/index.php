<?php 
session_start();

if(isset($_SESSION['name'])){ 
  header("Location: ./views/index.php");
}else {
  header("Location: _auth_/login.php");
}
?>