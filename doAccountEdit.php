<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$userID = $_POST['id'];
$newPassword = SHA1($_POST['password']);
$newName = $_POST['name'];
$newDOB = $_POST['dob'];
$newEmail = $_POST['email'];


$link = mysqli_connect($host, $username, $password, $db);

$query = "UPDATE users SET password = '$newPassword', name='$newName', dob='$newDOB' , email='$newEmail'"
        . "WHERE userId = $userID";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

if ($result) {
    $msg = "Account Details Edited";
} else {
    $msg = "Account Details Not Edited";
}


$query2 = "SELECT * FROM users 
               WHERE userId = '$userID'";

$result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
$row = mysqli_fetch_array($result2);
if (!empty($row)) {
    $username = $row['username'];
    $name = $row['name'];
    $dob = $row['dob'];
    $email = $row['email'];
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <link rel="stylesheet" type="text/css" href="stylesheet.css"/> 

        <style>
            .container {
                max-width: 400px;
                padding: 20px;
                background-color: #151515;
                border-radius: 5px;
                border: 1px solid white;
                margin-top: 100px;
            }

            h2 {
                text-align: center;
            }
            button {
                width: 100%;
            }
        </style>
        <title></title>
    </head>
    <body> 
        <?php
        include "navbar.php";
        ?>
        <br><br>
        <?php if (!empty($userID)) { ?>

            <div class="container">
                <h2><?php echo $msg ?></h2><br>

                <b>Username:</b> <?php echo $username; ?> <br>
                <b>Name:</b> <?php echo $name; ?> <br>
                <b>Date of birth:</b> <?php echo $dob; ?> <br>
                <b>Email:</b> <?php echo $email; ?> <br><br>
                
                Go <a href="manageAccount.php">Back</a> to manage account page <br><br>


                <a href="movies.php" class="link-button">
                    <button type="button">View movies</button>
                </a>


               
        </div>
    <?php } ?>
</body>
</html>
