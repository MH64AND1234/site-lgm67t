<?php

$servername = "localhost";
$username = "ycahzble_vipm";
$password = "bhgfdfjfjf";
$dbname = "ycahzble_vipm";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn) {

die(" PROBLEM WITH CONNECTION : " . mysqli_connect_error());

}
  
?>