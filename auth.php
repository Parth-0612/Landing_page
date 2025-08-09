<?php
session_start();

function checkAuth(){
    if (!isset($_SESSION['username'])) {
        header("Location: C:\xampp\htdocs\login portal\index.php");
        exit();
    }
}

?>