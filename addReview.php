<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$movieID = $_GET['id'];

$link = mysqli_connect($host, $username, $password, $db);

$query2 = "SELECT * FROM movies WHERE movieId=$movieID";

$result2 = mysqli_query($link, $query2) or die(mysqli_error($link));

$row2 = mysqli_fetch_array($result2);


if (!empty($row2)) {
    $username = $_SESSION['username'];
    $movieTitle = $row2['movieTitle'];
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

            input[type="text"]{
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            textarea{
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            select{
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
            <h2>Add Review For <?php echo $movieTitle ?></h2>
            <form action="doReviewAdd.php" method="post">
                <input type="hidden" name="id" value="<?php echo $movieID ?>"/>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value=" <?php echo $username ?>" readonly>
                <label for="comments">Comments:</label>
                <textarea id="review" name="review"></textarea>

                <label for="rating">Rating</label>
                <?php $ratings = array(1, 2, 3, 4, 5); ?>
                <select name="rating">
                    <?php
                    for ($i = 0; $i < count($ratings); $i++) {
                        $selected = ($rating == $ratings[$i]) ? "selected" : "";
                        echo "<option value='" . $ratings[$i] . "' $selected>" . $ratings[$i] . "</option>";
                    }
                    ?>
                </select><br><br>


                Go <a href="movieInfo.php?movieId=<?php echo $movieID; ?>">Back</a> to review page <br><br>


                <button type="submit">Confirm</button>

                <button type="reset">Reset</button>
            </form>
        </div>
    </body>
</html>
