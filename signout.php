<?php
session_start();
if(isset($_SESSION['LOGGED'])){
    unset($_SESSION['LOGGED']);
}
session_destroy();
header("location:signin.html");
die("Oops something went wrong!");
?>