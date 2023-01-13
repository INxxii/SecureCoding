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
if (isset($_POST['add'])) {
    $addQuestion = "INSERT INTO questions(question,option1,option2,option3,option4) VALUES(:question,:option1,:option2,:option3,:option4)";
    $statement = $pdo->prepare($addQuestion);
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];

    $statement->bindParam(":question", $question, PDO::PARAM_STR);
    $statement->bindParam(":option1", $option1, PDO::PARAM_STR);
    $statement->bindParam(":option2", $option2, PDO::PARAM_STR);
    $statement->bindParam(":option3", $option3, PDO::PARAM_STR);
    $statement->bindParam(":option4", $option4, PDO::PARAM_STR);

    try {
        $statement->execute();
        header("location:manageQuestion.php");
        $pdo = null;
    } catch (Exception) {
        header("location:invalidQuestion.html");
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
        <form action="addQuestion.php" method="post">
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
                    <input type="text" id="option3" placeholder="Option 3" name="option3" required><br><br>
                    <label for="option4">Option 4</label>
                    <input type="text" id="option4" placeholder="Option 4" name="option4" required><br><br>                                      
                    <button type="submit" name="add">Add</button><br><br>
                        <a href="manageQuestion.php" style="color: #fdf0d5;text-decoration:none";>Questions</a>
                </fieldset>
            </form>

        </div>

    </body>
</html>