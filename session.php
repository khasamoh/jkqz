<?php 
session_start();

if (!empty($_SESSION['jkqz_id']) && !empty($_SESSION['jkqz_privellege']) && !empty($_SESSION['jkqz_name'])){
	$_SESSION['jkqz_id'];
	$_SESSION['jkqz_name'];
	$_SESSION['jkqz_privellege'];
	$_SESSION['jkqz_log_id'];	
}else{
	header("location: out.php");
}
?>