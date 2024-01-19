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
        <div class="container">
            <h2>Register</h2>
            <form method="post" action="doRegister.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name">
                
                <label for="name">Date of Birth:</label>
                <input type="date" id="dob" name="dob" placeholder="Enter your date of birth">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <br><br>
                
                Have an account? <a href="login.php">Log In</a> now! <br><br>

                

                <button type="submit">Register</button>
                
                <button type="reset">Reset</button>
            </form>
        </div>


    </body>
</html>
