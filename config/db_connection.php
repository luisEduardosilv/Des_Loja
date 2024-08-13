<?php 

$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "des_loja";
$port = "3306";

$conn = null; 

function get_connection(){  
     global $conn, $host, $username, $passwd, $dbname, $port; 
     
     if ( !is_resource($conn) ){ 
         $conn = mysqli_connect($host, $username, $passwd, $dbname, $port); 
         $conn->set_charset("utf8"); 
         
         } return $conn; 
         
         }
         
         ?>