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
    $edit= "UPDATE exams SET exam=:exam, question1=:question1, question2=:question2, question3=:question3, question4=:question4, question5=:question5 WHERE number=:number";
    $statement=$pdo->prepare($edit);

    $exam = $_POST['exam'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $question5 = $_POST['question5'];

    $statement->bindParam(":exam", $exam, PDO::PARAM_STR);
    $statement->bindParam(":question1", $question1, PDO::PARAM_STR);
    $statement->bindParam(":question2", $question2, PDO::PARAM_STR);
    $statement->bindParam(":question3", $question3, PDO::PARAM_STR);
    $statement->bindParam(":question4", $question4, PDO::PARAM_STR);
    $statement->bindParam(":question5", $question5, PDO::PARAM_STR);
    $statement->bindParam(":number",$_GET['number'],PDO::PARAM_INT);
    $statement->execute();
    header("location:manageExam.php");
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
    <?php
require 'connection.php';
$question = "SELECT * FROM questions";
$statement=$pdo->prepare($question);
$statement->execute();
$key = $statement->fetchAll();
echo    "<form action='' method='post'>
    <div class='container'>
    <fieldset action=''>
    <br><br>
    <label for='exam'>Exam</label>
    <input type='text' id='exam'  name='exam' placeholder='Exam name' required><br><br>
    <label for='ques'>Question 1</label><br><br>
    <select id='ques' name='question1'>";
foreach ($key as $data){
    echo "<option >".$data['question']."</option>";
}
echo "</select><br><br>
<label for='ques'>Question 2</label><br><br>
<select id='ques' name='question2'>";
foreach ($key as $data){
    echo "<option >".$data['question']."</option>";
}
echo "</select><br><br>
<label for='ques'>Question 3</label><br><br>
<select id='ques' name='question3'>";
foreach ($key as $data){
    echo "<option >".$data['question']."</option>";
}
echo "</select><br><br>
<label for='ques'>Question 4</label><br><br>
<select id='ques' name='question4'>";
foreach ($key as $data){
    echo "<option >".$data['question']."</option>";
}
echo "</select><br><br>
<label for='ques'>Question 5</label><br><br>
<select id='ques' name='question5'>";
foreach ($key as $data){
    echo "<option >".$data['question']."</option>";
}
echo "</select><br><br>
<button type='submit' name='edit'>Edit</button><br><br>
<a href='manageExam.php' style='color: #fdf0d5;text-decoration:none';>Exams</a>
</fieldset>
</form>
</div>";
?>
    </body>
</html>