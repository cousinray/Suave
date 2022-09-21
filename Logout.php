<?php
session_start();
if (isset($_SESSION['Email'])){
session_destroy();
die(header("Location:HOME PAGE.php"));
}
?>

