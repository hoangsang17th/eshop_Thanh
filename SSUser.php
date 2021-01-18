<?php
session_start();
if(!isset($_SESSION["Email_User"])){
header("Location: login.php");
exit(); 
}
?>