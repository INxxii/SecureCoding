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

require 'connection.php';
if(isset($_POST['edit'])){
    $edit= "UPDATE questions SET question=:question, option1=:option1, option2=:option2, option3=:option3, option4=:option4 WHERE number=:number";
    $statement=$pdo->prepare($edit);

    $key = '123456789009876543212345678998765432';
    $iv = '1234567890098765';

    $question = openssl_encrypt($_POST['question'],'AES-256-CBC',$key,0,$iv);
    $option1 = openssl_encrypt($_POST['option1'],'AES-256-CBC',$key,0,$iv);
    $option2 = openssl_encrypt($_POST['option2'],'AES-256-CBC',$key,0,$iv);
    $option3 = openssl_encrypt($_POST['option3'],'AES-256-CBC',$key,0,$iv);
    $option4 = openssl_encrypt($_POST['option4'],'AES-256-CBC',$key,0,$iv);
    
    $statement->bindParam(":question",$question,PDO::PARAM_STR);
    $statement->bindParam(":option1", $option1, PDO::PARAM_STR);
    $statement->bindParam(":option2", $option2, PDO::PARAM_STR);
    $statement->bindParam(":option3", $option3, PDO::PARAM_STR);
    $statement->bindParam(":option4", $option4, PDO::PARAM_STR);
    $statement->bindParam(":number",$_GET['number'],PDO::PARAM_INT);
    $statement->execute();
    header("location:manageQuestion.php");
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
        background-color: #780000;
        color: #fdf0d5;
        position: fixed;
        top: 15%;
        right: 25%;
        left: 25%;
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
                    <label for="question">Question</label>
                    <input type="text" id="question"  name="question" placeholder="Question" required><br><br>
                    <label for="option1">Option 1</label>
                    <input type="text" id="option1" placeholder="Option 1" name="option1" required><br><br>                   
                    <label for="option2">Option 2</label>
                    <input type="text" id="option2" placeholder="Option 2" name="option2" required><br><br>                   
                    <label for="option3">Option 3</label>
                    <input type="text" id="option3" placeholder="Option 3" name="option3" ><br><br>
                    <label for="option4">Option 4</label>
                    <input type="text" id="option4" placeholder="Option 4" name="option4" ><br><br>                                      
                    <button type="submit" name="edit">Edit</button><br><br>
                        <a href="manageQuestion.php" style="color: #fdf0d5;text-decoration:none";>Questions</a>
                </fieldset>
            </form>

        </div>

    </body>
</html>