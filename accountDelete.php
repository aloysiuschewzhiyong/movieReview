<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "c203_moviereviewdb";

$link = mysqli_connect($host, $user, $pass, $db);

$userID = $_SESSION['user_id'];


$queryCheck = "SELECT * FROM users 
               WHERE userId = '$userID'";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {
    $row = mysqli_fetch_array($resultCheck);
}

$username = $row['username'];
$name = $row['name'];
$dob = $row['dob'];
$email = $row['email'];




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
            
            button {
                width: 100%;
            }
        </style>

        <title></title>
    </head>

    <body>
        <?php include "navbar.php"; ?>
        <br><br>

        <div class="container">
            <?php if (mysqli_num_rows($resultCheck) == 1) { ?>

                <h2>Confirm Account Deletion</h2><br>

                <b>Username:</b> <?php echo $_SESSION['username']; ?> <br>
                <b>Name:</b> <?php echo $name; ?> <br>
                <b>Date of birth:</b> <?php echo $dob; ?> <br>
                <b>Email:</b> <?php echo $email; ?> <br><br>

                Go back to<a href="movies.php"> view movies</a>  <br><br>



                <a href="doAccountDelete.php?id=<?php echo $userID ?>" class="link-button">
                    <button type="button">Confirm Account Deletion</button>
                </a><br><br>


            <?php } else { ?>
                <h2>invalid details</h2><br>
                Go back to<a href="login.php"> Log In</a> now! <br><br>


            <?php }
            ?>

        </div>



    </body>
</html>
