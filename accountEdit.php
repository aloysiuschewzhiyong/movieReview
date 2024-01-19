<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$userID = $_GET['id'];

$link = mysqli_connect($host, $username, $password, $db);

$query = "SELECT * FROM users 
               WHERE userId = '$userID'";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
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

            label {
                display: block;
                margin-top: 10px;
            }

            input[type="text"],
            input[type="password"],
            input[type="date"],
            input[type="email"]{
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
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
                <h2>Edit Account Details</h2>
                <form action="doAccountEdit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $userID ?>"/>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value=" <?php echo $username ?>"readonly>

                    <label for="username">Password:</label>
                    <input type="password" id="password" name="password">

                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?>">

                    <label for="name">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $dob ?>">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email ?>">
                    <br><br>


                    Go <a href="manageAccount.php">Back</a> to manage account page <br><br>


                    <button type="submit">Confirm</button>

                    <button type="reset">Reset</button>
                </form>
            </div>
        <?php } ?>
    </body>
</html>
