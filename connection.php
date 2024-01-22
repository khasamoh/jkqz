<?php
date_default_timezone_set("Africa/Nairobi");
$server = "localhost";
$user = "khasamoh";
$password = "Root123#";
$db_name = "db_jkqz";

$connect = new mysqli($server,$user,$password,$db_name) or die(mysqli_error());

?>
