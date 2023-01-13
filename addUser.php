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
if (isset($_POST['add'])) {
    $addUser = "INSERT INTO users(ID,username,password,privilege) VALUES(:ID,:username,:password,:privilege)";
    $statement = $pdo->prepare($addUser);
    $ID = $_POST['ID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $privilege = $_POST['privilege'];

    $statement->bindParam(":ID", $ID, PDO::PARAM_STR);
    $statement->bindParam(":username", $username, PDO::PARAM_STR);
    $statement->bindParam(":password", $password, PDO::PARAM_STR);
    $statement->bindParam(":privilege", $privilege, PDO::PARAM_STR);
    try {
        $statement->execute();
        header("location:manageUsers.php");
        $pdo = null;
    } catch (Exception) {
        header("location:invalidUser.html");
    }
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
        <form action="addUser.php" method="post">
            <div class="container">
                <fieldset action="">
                <br><br>
                    <label for="ID">ID</label>
                    <input type="text" id="ID"  name="ID" placeholder="8 characters only" minlength="8" maxlength="8" required><br><br>
                    <label for="username">Username</label>
                    <input type="text" id="username"  name="username" placeholder="username" required><br><br>
                    <label for="password">Password</label>
                    <input type="text" id="password" placeholder="password" name="password" required><br><br>                   
                    <label for="privilege">privilege</label><br>
                    <select id="privilege" name="privilege" required>
                        <option value="admin">admin</option>
                        <option value="teacher">teacher</option>
                        <option value="student">student</option>
                    </select><br><br>
                    <button type="submit" name="add">Add</button><br><br>
                        <a href="manageUsers.php">Users</a>
                </fieldset>
            </form>

        </div>

    </body>
</html>