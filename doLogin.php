<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "c203_moviereviewdb";

$link = mysqli_connect($host, $user, $pass, $db);

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

$msg = "";

$queryCheck = "SELECT * FROM users 
               WHERE username = '$entered_username'
               AND password = SHA1('$entered_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['user_id'] = $row['userId'];
    $_SESSION['username'] = $row['username'];
    
    if(isset($_POST['remember'])){
        setcookie("username", $entered_username, time()+60*60*24*365*10);
        setcookie("password", $entered_password, time()+60*60*24*365*10);

    }
    
    
    $name = $row['name'];
    $dob = $row['dob'];
    $email = $row['email'];
}


mysqli_close($link);
?>

<!DOCTYPE html>
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
            <?php if (mysqli_num_rows($resultCheck) == 1) { ?>

                <h2>Welcome back!</h2><br>

                <b>Username:</b> <?php echo $_SESSION['username']; ?> <br>
                <b>Name:</b> <?php echo $name; ?> <br>
                <b>Date of birth:</b> <?php echo $dob; ?> <br>
                <b>Email:</b> <?php echo $email; ?> <br><br>


                <a href="movies.php" class="link-button">
                    <button type="button">View movies</button>
                </a>


            <?php } else { ?>
                <h2>invalid details</h2><br>
                Go back to<a href="login.php"> Log In</a> now! <br><br>


            <?php }
            ?>

        </div>



    </body>
</html>
