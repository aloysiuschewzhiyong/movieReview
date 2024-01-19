<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$email = $_POST['email'];

$host = "localhost";
$user = "root";
$pass = "";
$db = "c203_moviereviewdb";

$link = mysqli_connect($host, $user, $pass, $db);

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

$queryCheck = "SELECT * FROM users 
               WHERE username = '$entered_username'";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 0) {

    $query = "INSERT INTO users(username, password, name, dob, email) 
          VALUES('$username' , SHA1('$password') , ' $name' , ' $dob' , ' $email')";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    if ($result) {
        $message = "Account registered successfully!";

        $queryCheck2 = "SELECT * FROM users 
               WHERE username = '$entered_username'
               AND password = SHA1('$entered_password')";
        $resultCheck2 = mysqli_query($link, $queryCheck2) or die(mysqli_error($link));

        if (mysqli_num_rows($resultCheck2) == 1) {
            $row = mysqli_fetch_array($resultCheck2);
            $_SESSION['user_id'] = $row['userId'];
            $_SESSION['username'] = $row['username'];
        }
    } else {
        $message = "Account register failed";
    }
} else {
    $message = "Account register failed";
    $message2 = "Username already taken";
}




mysqli_close($link);
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
        </style>

        <title></title>
    </head>
    <body>
        <?php include "navbar.php"; ?>
        <br><br>

        <div class="container">
            <?php if ($message != "Account register failed") { ?>
                <h2>Welcome!</h2><br>
                <b><?php echo $message; ?></b> <br><br>

                <b>Username:</b> <?php echo $username; ?> <br>
                <b>Name:</b> <?php echo $name; ?> <br>
                <b>Date of birth:</b> <?php echo $dob; ?> <br>
                <b>Email:</b> <?php echo $email; ?> <br><br>
                
                Go <a href="manageAccount.php">Back</a> to manage account page <br><br>



                <a href="movies.php" class="link-button">
                    <button type="button">View movies</button>
                </a>

            <?php } else { ?>
                <h2><?php echo $message; ?></h2><br>
                <b><?php echo $message2; ?></b> <br><br>


                Go back to<a href="register.php"> Register</a> now! <br><br>


            <?php } ?>




        </div>



    </body>
</html>
