
<?php
session_start();
if(!isset($_SESSION["txtMurl"])){
header("Location: ../index.php");
exit(); }
?>