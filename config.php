<?php 
define("SERVER","localhost");
define("USER","root");
define("PASSWORD","");
define("DATABASE","interview");

date_default_timezone_set("Asia/Dhaka");

$db=new mysqli(SERVER,USER,PASSWORD,DATABASE);

?>