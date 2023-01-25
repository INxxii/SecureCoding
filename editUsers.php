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

require 'connection.php';
if(isset($_POST['edit'])){
    $edit= "UPDATE users SET username=:username, password=:password, privilege=:privilege where ID=:ID";
    $statement=$pdo->prepare($edit);

    $key = '123456789009876543212345678998765432';
    $iv = '1234567890098765';
        
    $ID = openssl_encrypt($_POST['ID'],'AES-256-CBC',$key,0,$iv);
    $username = openssl_encrypt($_POST['username'],'AES-256-CBC',$key,0,$iv);
    $password = openssl_encrypt($_POST['password'],'AES-256-CBC',$key,0,$iv);
    $privilege = openssl_encrypt($_POST['privilege'],'AES-256-CBC',$key,0,$iv);
    
    $statement->bindParam(":username",$username,PDO::PARAM_STR);
    $statement->bindParam(":password",$password,PDO::PARAM_STR);
    $statement->bindParam(":privilege",$privilege,PDO::PARAM_STR);
    $statement->bindParam(":ID",$_GET['ID'],PDO::PARAM_STR);
    $statement->execute();
    header("location:manageUsers.php");
    $pdo=null;
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

    .container{
        background-color: #669bbc;
        color: #003049;
        position: fixed;
        top: 25%;
        right: 25%;
        left: 25%;
        bottom: 25%;
        border-radius: 10px;
        
    }
    fieldset{
        border: 0cm;
    }
input{
    width: 100%;
    height: 30px;
}

button{
width: 100%;
height: 30px;
text-align: center;

}

a{
    text-decoration: underline;
    font-style:none;
    color:black;
}
</style>
    </head>
    <body>
        <form action="" method="post">
            <div class="container">
                <fieldset action="">
                    <br><br>
                    <label for="username">Username</label>
                    <input type="text" id="username"  name="username" required><br><br>
                    <label for="password">Password</label>
                    <input type="text" id="password" placeholder="password" name="password" required><br><br>
                    <label for="privilege">privilege</label><br>
                    <select id="privilege" name="privilege" required>
                        <option value="admin">admin</option>
                        <option value="teacher">teacher</option>
                        <option value="student">student</option>
                    </select><br><br>

                    <button type="submit" name="edit">edit</button><br><br>
                    
                
                        <a href="manageUsers.php">Users</a>
                </fieldset>
            </form>

        </div>

    </body>
</html>