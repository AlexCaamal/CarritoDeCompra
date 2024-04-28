<?php
  $servername = "monorail.proxy.rlwy.net";
  $username = "root";
  $password = "BnfsMAXrsyEMgJQbcUFjEuGuvwKyMNaS";
  $dbname = "railway";
  $port = 28734;
  
   $conn = new mysqli($servername, $username, $password, $dbname,$port);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>