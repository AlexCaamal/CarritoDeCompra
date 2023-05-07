<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "tienda_en_linea";
  $port = 33065;
  
   $conn = new mysqli($servername, $username, $password, $dbname,$port);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>