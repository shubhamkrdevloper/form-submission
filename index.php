<?php
$insert=false;
$not_insert=true;
if(isset($_POST['name'])){
    //set connection variable
$sever = "localhost";
$username = "root";
$password = "";
//crreate a database connection
$con = mysqli_connect($sever,$username,$password);

error_reporting(0);
//check for connection success
if(!$con){
    die("Connection to this database failed due to ".mysqli_connect_error());

}
// echo "Successfully connected with datadase";
//collect post variable
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$place = $_POST['place'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `shubh`.`shubh` ( `name`, `age`, `gender`, `email`, `phone`, `place`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$place', '$desc', current_timestamp());";
//echo $sql;
//execute the query
if($con->query($sql) == true){
    //echo "Successfully inserted";
    //flag for successful insertion
    $insert = true; 
}
else{
    echo "ERROR: $sql <br> $con->error";
    $not_insert=true;
}
if(empty($_POST["name"]))
echo "Name is required";
if(empty($_POST["email"]))
echo "email is required";
if(empty($_POST["age"]))
echo "Age is required";

if(empty($_POST["gender"]))
echo "Gender is required";
if(empty($_POST["phone"]))
echo "Mobile number is required";
function validation($phone){

    $valid_number = filter_var($phone,FILTER_SANITIZE_NUMBER_INT);
    // echo "Your valid phone number like this only:  ";
    echo $valid_number."<br>";
}
validation($phone);

//close the database connection
$con->close();
}
?>
<!-- html code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CriMA's</title>
    <link rel="shortcut icon" href="/vv.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bh" src="/tt.jpg" alt="INDIA TOUR" srcset="">
   <div class="container">
   <h2>Welcome To CriMA Tour and Travels</h2>
    <p>Enter your details for conformation your Trip</p>

    <?php
    if($insert == true){
    echo "<p class='submsg'>Thanks for your submitting your details </p> ";
    }
    ?>

    <form action="index.php" method="post">
        
        <input type="text" name="name" id="name" placeholder="Enter your name..">
        <input type="text" name="age" id="age" placeholder="Enter your age..">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender..">
        <input type="email" name="email" id="email" placeholder="Enter your email..">
        <input type="phone" name="phone" id="phone" placeholder="Enter your Phone number..">
        <input type="text" name="place" id="place" placeholder="Enter your favorite place..">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your other enquiry"></textarea>
        <p class="submsg">Thanks for submitting your details! We will meet soon </p>
        <button class="btn">Submit</button>
        <!-- <button class="btn">Reset</button> -->
    </form>
    
   </div>
   <script src="index.js"></script>
</body>
</html>