<?php
session_start();
if(isset($_SESSION['username'])){
    session_destroy();
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
        </style>

        <title></title>
    </head>
    <body>
        <?php include "navbar.php"; ?>
        <br><br>

        <div class="container">
            <h2>Goodbye!</h2><br>
            <b>You have logged out</b> <br><br>

            <a href="login.php">Log In</a> again<br><br>
            
            <a href="movies.php" class="link-button">
                <button type="button">View movies</button>
            </a>
        </div>



    </body>
</html>

