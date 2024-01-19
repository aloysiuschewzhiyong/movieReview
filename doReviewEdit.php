<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$reviewId = $_POST['id'];
$newComment = $_POST['review'];
$newRating = $_POST['rating'];


$link = mysqli_connect($host, $username, $password, $db);

$query = "UPDATE reviews SET review ='$newComment', rating='$newRating' WHERE reviewId = $reviewId";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

if ($result) {
    $msg = "Review Edited";
} else {
    $msg = "Review Not Edited";
}


$query2 = "SELECT R.movieId, M.movieTitle ,R.reviewId, R.review, R.rating, R.datePosted
                 FROM reviews AS R INNER JOIN movies AS M ON R.movieId = M.movieId WHERE reviewId=$reviewId";
$result2 = mysqli_query($link, $query2)or die(mysqli_error($link));
$row = mysqli_fetch_array($result2);
if (!empty($row)) {
    $movieID = $row['movieId'];
    $movieTitle = $row['movieTitle'];
    $rating = $row['rating'];
    $review = $row['review'];
    $datePosted = $row['datePosted'];
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
        <?php if (!empty($reviewId)) { ?>

            <div class="container">
                <h2><?php echo $msg ?></h2><br>

                <b>Movie Title:</b><br> <?php echo $movieTitle; ?> <br>
                <b>Comments</b><br> <?php echo $review; ?> <br>
                <b>Rating:</b><br> <?php echo $rating; ?> <br>
                <b>Date:</b><br> <?php echo $datePosted; ?> <br><br>

                <a href="movieInfo.php?movieId=<?php echo $movieID; ?>" class="link-button">
                    <button type="button">Back</button>
                </a>


               
        </div>
    <?php } ?>
</body>
</html>
