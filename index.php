<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['username'];
   $type = $_SESSION['type'];
   header('location:pages/dashboard/index.php'); 
}
?>