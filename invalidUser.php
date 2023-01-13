<?php
session_start();
if(!isset($_SESSION['LOGGED'])){
    header("location:signin.html");
}
else if($_SESSION['LOGGED']=='invalid'){
    header("location:invalid.html");
}
else if ($_SESSION['LOGGED']!='admin'){
    header("location:invalid_privilege.html");
}
?>
<!DOCTYPE html>
<html>
    <head>
<style>
    body{
    margin: 0%;
    background-color:#fdf0d5;
}
.noti{
    display: block;
    text-align: center;
    position: fixed;
    top: 35%;
    right: 25%;
    left: 25%;
    bottom: 35%;
    padding: 40px;
    border-radius: 10px;
    font-size: 25px;
    font-weight: bold;
    font-family: 'monaco', monospace;
    color: #003049;
    background-color: #669bbc;
}
a{
    text-decoration: none;
    font-style:none;
    font-weight: bold;
    font-family: 'monaco', monospace;
    color:#003049;
    border: 2px solid #003049;
    background-color: #669bbc;
    padding-right: 30%;
    padding-left: 30%;
    padding-top: 20px;
    padding-bottom: 20px;
    border-radius: 8px;
}
a:hover{
    cursor: pointer;
    color:#669bbc;
    background-color:#003049;
}
</style>
    </head>
    <body>
        <div class="noti">
            <ul>
                ID cannot be duplicated<br> Please enter a unique ID <br><br>
                <a href="manageUsers.php">ManageUsers</a>
            </ul>
        </div>

    </body>
</html>