<?php
session_start();
if(!isset($_SESSION['LOGGED'])){
    header("location:signin.html");
}
else if($_SESSION['LOGGED']=='invalid'){
    header("location:invalid.html");
}
else if ($_SESSION['LOGGED']=='student'){
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
    padding: 40px;
    border-radius: 10px;
    font-size: 25px;
    font-weight: bold;
    font-family: 'monaco', monospace;
    color: #fdf0d5;
    background-color: #c1121f;
}
a{
    text-decoration: none;
    font-style:none;
    font-weight: bold;
    font-family: 'monaco', monospace;
    color:#fdf0d5;
    border: 2px solid #c1121f;
    border-bottom:4px solid #780000;
    padding-right: 30%;
    padding-left: 30%;
    padding-top: 20px;
    padding-bottom: 20px;
    border-radius: 8px;
}
a:hover{
    cursor: pointer;
    color:#fdf0d5;
    background-color:#780000;
}
</style>
    </head>
    <body>
        <div class="noti">
            <ul>
                Question number and questions cannot be duplicated<br> Please enter a unique number or question <br><br>
                <a href="manageQuestion.php">Manage Questions</a>
            </ul>
        </div>

    </body>
</html>