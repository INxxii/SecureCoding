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
    $enc_key = '123456789009876543212345678998765432';
    $enc_iv = '1234567890098765';
    $addExam = "INSERT INTO exams(exam,question1,question2,question3,question4,question5) VALUES(:exam,:question1,:question2,:question3,:question4,:question5)";
    $statement = $pdo->prepare($addExam);
    
    $exam = openssl_encrypt($_POST['exam'],'AES-256-CBC',$enc_key,0,$enc_iv);
    $question1 = openssl_encrypt($_POST['question1'],'AES-256-CBC',$enc_key,0,$enc_iv);
    $question2 = openssl_encrypt($_POST['question2'],'AES-256-CBC',$enc_key,0,$enc_iv);
    $question3 = openssl_encrypt($_POST['question3'],'AES-256-CBC',$enc_key,0,$enc_iv);
    $question4 = openssl_encrypt($_POST['question4'],'AES-256-CBC',$enc_key,0,$enc_iv);
    $question5 = openssl_encrypt($_POST['question5'],'AES-256-CBC',$enc_key,0,$enc_iv);


    $statement->bindParam(":exam", $exam, PDO::PARAM_STR);
    $statement->bindParam(":question1", $question1, PDO::PARAM_STR);
    $statement->bindParam(":question2", $question2, PDO::PARAM_STR);
    $statement->bindParam(":question3", $question3, PDO::PARAM_STR);
    $statement->bindParam(":question4", $question4, PDO::PARAM_STR);
    $statement->bindParam(":question5", $question5, PDO::PARAM_STR);
        $statement->execute();
        header("location:manageExam.php");
        $pdo = null;
    
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
$dec_key = '123456789009876543212345678998765432';
$dec_iv = '1234567890098765';
$question = "SELECT * FROM questions";
$statement=$pdo->prepare($question);
$statement->execute();
$key = $statement->fetchAll();
echo        "<form action='addExam.php' method='post'>
<div class='container'>
<fieldset action=''>
<br><br>
<label for='exam'>Exam</label>
<input type='text' id='exam'  name='exam' placeholder='Exam name' required><br><br>
<label for='ques'>Question 1</label><br><br>

<select id='ques' name='question1'>";
foreach ($key as $data){
    $dec_ques = openssl_decrypt($data['question'],'AES-256-CBC',$dec_key,0,$dec_iv);
    echo "<option >".$dec_ques."</option>";
}
echo "</select><br><br>
<label for='ques'>Question 2</label><br><br>

<select id='ques' name='question2'>";
foreach ($key as $data){
    $dec_ques = openssl_decrypt($data['question'],'AES-256-CBC',$dec_key,0,$dec_iv);
    echo "<option >".$dec_ques."</option>";
}
echo "</select><br><br>

<label for='ques'>Question 3</label><br><br>
<select id='ques' name='question3'>";
foreach ($key as $data){
    $dec_ques = openssl_decrypt($data['question'],'AES-256-CBC',$dec_key,0,$dec_iv);
    echo "<option >".$dec_ques."</option>";
}
echo "</select><br><br>

<label for='ques'>Question 4</label><br><br>
<select id='ques' name='question4'>";
foreach ($key as $data){
    $dec_ques = openssl_decrypt($data['question'],'AES-256-CBC',$dec_key,0,$dec_iv);
    echo "<option >".$dec_ques."</option>";
}
echo "</select><br><br>

<label for='ques'>Question 5</label><br><br>
<select id='ques' name='question5'>";
foreach ($key as $data){
    $dec_ques = openssl_decrypt($data['question'],'AES-256-CBC',$dec_key,0,$dec_iv);
    echo "<option >".$dec_ques."</option>";
}
echo "</select><br><br>

<button type='submit' name='add'>Add</button><br><br>
<a href='manageExam.php' style='color: #fdf0d5;text-decoration:none';>Exams</a>
</fieldset>
</form>
</div>";
?>
    </body>
</html>