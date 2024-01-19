<?php
//session_start();
//if (isset($_SESSION['username'])) {
//header('Location: movies.php');
//exit();
//}
if (isset($_COOKIE['username'])) {
    $rememberUsername = $_COOKIE['username'];
    $rememberPassword = $_COOKIE['password'];
}
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

            label {
                display: block;
                margin-top: 10px;
            }

            input[type="text"],
            input[type="password"]{
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
        <div class="container">
            <h2>Log In</h2>
            <form method="post" action="doLogin.php">
                <?php if (isset($_COOKIE['username'])) {?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" value="<?php echo $rememberUsername; ?>">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo $rememberPassword; ?>">
                <?php } else { ?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <?php } ?>
                
                
                <input type="checkbox" name="remember" style="margin-top: 20px;">  Remeber Me<br><br>
                       
                Do not have an account? <a href="register.php">Register</a> now! <br><br>


                <button type="submit">Login</button>

                <button type="reset">Reset</button>
            </form>
        </div>


    </body>
</html>
