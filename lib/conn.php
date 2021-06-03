<?php

include "config.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($native_data_type){
	$mysqli = new mysqli();
	$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
	$mysqli->real_connect("192.168.235.131", "classic", "classicpass", "classicmodels", 33068);
}
else{
	$mysqli = new mysqli("192.168.235.131", "classic", "classicpass", "classicmodels", 33068);
}