<?php 
  $con = new mysqli("localhost", "coderaymond", "show907ring956", "project");
 
  if($con->connect_errno > 0){
    die('Unable to connect to database [' . $con->connect_error . ']');
  }
?>