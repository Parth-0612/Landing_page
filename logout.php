<?php
session_start();
session_destroy();
header("Location: C:\xampp\htdocs\login portal\index.php");
exit();
?>